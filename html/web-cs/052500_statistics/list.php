<?php
$start_date			= $_REQUEST['start_date'];//
$end_date			= $_REQUEST['end_date'];//

$year=date('Y');
$month=date('m');
$day=date('d');

//분류별/연령대별/성별/지역별 현황은 newsletter_mapping table
//신청/취소 현황은 bs_newsletter_log table

$DB_TABLE='newsletter_mapping';
//분류별 구독현황
$group[0]['group_idx']=" '1' ";
$group[1]['group_idx']=" '2' ";
$group[2]['group_idx']=" '3' ";
$group[3]['group_idx']=" '4' ";
$group[0]['name']="B-read";
$group[1]['name']="경건한 주말";
$group[2]['name']="Week&Joy";
$group[3]['name']="논설위원의 뉴스 요리";

$total_group_cnt=0;

for($i=0;$i<count($group);$i++)
{
	$sql=" select ";
	$sql=$sql." count(`idx`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `newsletter_group_idx`=".$group[$i]['group_idx']." ";

	$rs_log=$conn->Execute($sql);

	$group_cnt[$i]['cnt']=$rs_log->fields['cnt'];

	$total_group_cnt=$total_group_cnt+$rs_log->fields['cnt'];
}

for($i=0;$i<count($group_cnt);$i++)
{
	$group_cnt[$i]['percent']=round($group_cnt[$i]['cnt']/$total_group_cnt*100);
}


//연령대별 구독현황
$sql=" select case when age < 20 then '10대'";
$sql=$sql." when age between 20 and 29 then '20대' ";
$sql=$sql." when age between 30 and 39 then '30대' ";
$sql=$sql." when age between 40 and 49 then '40대' ";
$sql=$sql." when age between 50 and 59 then '50대' ";
$sql=$sql." when age >= 60 then '60대 이상' ";
$sql=$sql." end as age_group ";
$sql=$sql." , count(mb_no) total_cnt ";
$sql=$sql." from( ";
$sql=$sql." select mb_no, date_format(now(), '%Y') - date_format(mb_birth, '%Y') as age ";
$sql=$sql." from ";
$sql=$sql." ( select nm.mb_no, gmw.mb_birth from newsletter_mapping as nm join g5_member_new gmw on nm.mb_no=gmw.mb_no where gmw.mb_leave_date='' and gmw.mb_intercept_date='' and gmw.mb_birth REGEXP '([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})+$' group by nm.mb_no ) as nwGmw ";
$sql=$sql." ) as c ";
$sql=$sql." group by age_group ";
$sql=$sql." order by age_group ";

$rs_member=$conn->Execute($sql);

$i=0;

$total_member_cnt=0;

while(!$rs_member->EOF)
{
	//mb_birth에 없는 날짜(예 : 1994-02-29)의 경우 age_group=null. 걸러냄.
	if($rs_member->fields['age_group'])
	{
		$age_member_cnt[$i]['age_group']=$rs_member->fields['age_group']=='' ? '미설정' : $rs_member->fields['age_group'];
		$age_member_cnt[$i]['cnt']=$rs_member->fields['total_cnt'];

		$total_member_cnt=$total_member_cnt+$rs_member->fields['total_cnt'];
		$i++;
	}

	$rs_member->MoveNext();
}

for($i=0;$i<count($age_member_cnt);$i++)
{
	$age_member_cnt[$i]['percent']=round($age_member_cnt[$i]['cnt']/$total_member_cnt*100);
}


//성별 구독현황
$sql=" select ";
$sql=$sql." count(ab.`mb_no`) as cnt ";
$sql=$sql." from ";
$sql=$sql." (select a.`mb_no` from newsletter_mapping a join g5_member_new b on a.mb_no=b.mb_no where b.mb_leave_date='' and b.mb_intercept_date='' and b.`mb_sex`='1' group by a.`mb_no`) ab ";

$rs_member=$conn->Execute($sql);

$sex_member_cnt[0]['name']='남';
$sex_member_cnt[0]['cnt']=$rs_member->fields['cnt'];

$sql=" select ";
$sql=$sql." count(ab.`mb_no`) as cnt ";
$sql=$sql." from ";
$sql=$sql." (select a.`mb_no` from newsletter_mapping a join g5_member_new b on a.mb_no=b.mb_no where b.mb_leave_date='' and b.mb_intercept_date='' and b.`mb_sex`='2' group by a.`mb_no`) ab ";

$rs_member=$conn->Execute($sql);

$sex_member_cnt[1]['name']='여';
$sex_member_cnt[1]['cnt']=$rs_member->fields['cnt'];

$total_member_cnt=$sex_member_cnt[0]['cnt']+$sex_member_cnt[1]['cnt'];

$sex_member_cnt[0]['percent']=round($sex_member_cnt[0]['cnt']/$total_member_cnt*100);
$sex_member_cnt[1]['percent']=round($sex_member_cnt[1]['cnt']/$total_member_cnt*100);


//지역별 구독현황
$area[0]['area']='강서구';
$area[1]['area']='금정구';
$area[2]['area']='남구';
$area[3]['area']='동구';
$area[4]['area']='동래구';
$area[5]['area']='부산진구';
$area[6]['area']='북구';
$area[7]['area']='사상구';
$area[8]['area']='사하구';
$area[9]['area']='서구';
$area[10]['area']='수영구';
$area[11]['area']='연제구';
$area[12]['area']='영도구';
$area[13]['area']='중구';
$area[14]['area']='해운대구';
$area[15]['area']='기장군';
//$area[16]['area']='그외(기타 지역, 미설정)';

$total_busan_member_cnt=0;
for($i=0;$i<count($area);$i++)
{
	$sql=" select ";
	$sql=$sql." count(ab.`mb_no`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." (select a.`mb_no` from newsletter_mapping a join g5_member_new b on a.mb_no=b.mb_no where b.mb_leave_date='' and b.mb_intercept_date='' and b.`mb_addr1` like '부산 ".$area[$i]['area']."%' group by a.`mb_no`) ab ";

	$rs_join=$conn->Execute($sql);
	$area_member_cnt[$i]['cnt']=$rs_join->fields['cnt'];

	$total_busan_member_cnt=$total_busan_member_cnt+$rs_join->fields['cnt'];
}

for($i=0;$i<count($area_member_cnt);$i++)
{
	$area_member_cnt[$i]['percent']=round($area_member_cnt[$i]['cnt']/$total_busan_member_cnt*100);
}


//분류별 구독신청/취소 현황
$DB_TABLE='bs_newsletter_log';

$total_group_cnt=0;

for($i=0;$i<count($group);$i++)
{
	$sql=" select ";
	$sql=$sql." count(`idx`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `newsletter_group_idx`=".$group[$i]['group_idx']." ";
	$sql=$sql." and `onoff`='1' ";
	if($start_date)
	{
		$sql=$sql." and `full_date_time`>='".$start_date." 00:00:00' ";
	}
	if($end_date)
	{
		$sql=$sql." and `full_date_time`<='".$end_date." 23:59:59' ";
	}

	$rs_log=$conn->Execute($sql);

	$group_state_cnt[$i]['on_cnt']=$rs_log->fields['cnt'];

	$sql=" select ";
	$sql=$sql." count(`idx`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `newsletter_group_idx`=".$group[$i]['group_idx']." ";
	$sql=$sql." and `onoff`='0' ";
	if($start_date)
	{
		$sql=$sql." and `full_date_time`>='".$start_date." 00:00:00' ";
	}
	if($end_date)
	{
		$sql=$sql." and `full_date_time`<='".$end_date." 23:59:59' ";
	}

	$rs_log=$conn->Execute($sql);

	$group_state_cnt[$i]['off_cnt']=$rs_log->fields['cnt'];
}


//스마티 변수 할당
$etc['Admin_Login_Path']	= $Admin_Login_Path;
$etc['Admin_Master_Path']	= $Admin_Master_Path;
$etc['Admin_First_Path']	= $Admin_First_Path;

$etc['board_title']			= $board_title;
$etc['menu']				= $menu;
$etc['tn']					= $tn;

$etc['search_select']		= $search_select;
$etc['keyword']				= @htmlspecialchars($keyword);
$etc['pagenum']				= $pagenum;
$etc['pageclick']			= $pageclick;
$etc['start_date']			= $start_date;
$etc['end_date']			= $end_date;

##스마티에 변수 담기#################
$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->compile_dir = Compile_PATH;
$smarty->template_dir = Template_PATH.$FILE_FOLDER;
$smarty->debugging = 0;

$smarty->assign("group_cnt", $group_cnt);//
$smarty->assign("age_member_cnt", $age_member_cnt);//
$smarty->assign("sex_member_cnt", $sex_member_cnt);//
$smarty->assign("area_member_cnt", $area_member_cnt);//
$smarty->assign("group_state_cnt", $group_state_cnt);//

$smarty->assign("group", $group);//
$smarty->assign("area", $area);//

$smarty->assign("etc", $etc);//기타, 페이징 변수
$smarty->assign("category", $category);

##템플릿 페이지 연결#################
$main_contents = $FILE_SKIN."list.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents, '', $FILE_FOLDER);
?>