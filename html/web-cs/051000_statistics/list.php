<?php
$pagenum			= intval($_REQUEST['pagenum']);
//$search_select	= $_REQUEST['search_select'];//검색범위. a.php / c.php 에 있음
$keyword			= $_REQUEST['keyword'];//검색어

$start_date			= $_REQUEST['start_date'];//
$end_date			= $_REQUEST['end_date'];//

$year=date('Y');
$month=date('m');
$day=date('d');

//월별가입/탈퇴
for($i=1, $j=0;$i<=12;$i++, $j++)
{
	$ii=$i<10 ? '0'.$i : $i;

	$sql=" select ";
	$sql=$sql." count(`mb_no`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `mb_datetime` like '".$year."-".$ii."%' ";

	$rs_join=$conn->Execute($sql);

	$month_join_member_cnt[$j]['cnt']=$rs_join->fields['cnt'];

	$sql=" select ";
	$sql=$sql." count(`mb_no`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `mb_leave_date` like '".$year.$ii."%' ";

	$rs_withdraw=$conn->Execute($sql);

	$month_withdraw_member_cnt[$j]['cnt']=$rs_withdraw->fields['cnt'];
}

//년도별 가입/탈퇴
for($i=5, $j=0;$i>=1;$i--, $j++)
{
	$previous_year[$j]['year']=$year-$i;

	$sql=" select ";
	$sql=$sql." count(`mb_no`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `mb_datetime` like '".$previous_year[$j]['year']."%' ";

	//echo $sql.PHP_EOL;

	$rs_join=$conn->Execute($sql);

	$year_join_member_cnt[$j]['cnt']=$rs_join->fields['cnt'];

	$sql=" select ";
	$sql=$sql." count(`mb_no`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `mb_leave_date`='".$previous_year[$j]['year']."%' ";

	$rs_withdraw=$conn->Execute($sql);

	$year_withdraw_member_cnt[$j]['cnt']=$rs_withdraw->fields['cnt'];
}

////일별 가입/탈퇴
//for($i=7, $j=0;$i>=1;$i--, $j++)
//{
//	$week_day[$j]['day']=date("Y-m-d", strtotime('-'.$i.' Day'));

//	$sql=" select ";
//	$sql=$sql." count(`mb_no`) as cnt ";
//	$sql=$sql." from ";
//	$sql=$sql." `".$DB_TABLE."` a";
//	$sql=$sql." where ";
//	$sql=$sql." `mb_datetime` like '".$week_day[$j]['day']."%' ";

//	$rs_join=$conn->Execute($sql);

//	$day_join_member_cnt[$j]['cnt']=$rs_join->fields['cnt'];

//	$sql=" select ";
//	$sql=$sql." count(`mb_no`) as cnt ";
//	$sql=$sql." from ";
//	$sql=$sql." `".$DB_TABLE."` a";
//	$sql=$sql." where ";
//	$sql=$sql." `mb_leave_date`='".str_replace('-', '', $week_day[$j]['day'])."' ";

//	$rs_withdraw=$conn->Execute($sql);

//	$day_withdraw_member_cnt[$j]['cnt']=$rs_withdraw->fields['cnt'];

//	$week_day[$j]['day']=str_replace('-', '.', $week_day[$j]['day']);
//}

//지역별 가입/탈퇴
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
	$sql=$sql." count(`mb_no`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `mb_leave_date`='' ";
	$sql=$sql." and `mb_intercept_date`='' ";
	$sql=$sql." and `mb_addr1` like '부산 ".$area[$i]['area']."%' ";
	if($start_date)
	{
		$sql=$sql." and `mb_datetime`>='".$start_date." 00:00:00' ";
	}
	if($end_date)
	{
		$sql=$sql." and `mb_datetime`<='".$end_date." 23:59:59' ";
	}

	$rs_join=$conn->Execute($sql);
	$area_member_cnt[$i]['cnt']=$rs_join->fields['cnt'];

	$total_busan_member_cnt=$total_busan_member_cnt+$rs_join->fields['cnt'];

	//if($i<count($area)-1)
	//{
	//	$sql=$sql." and `mb_addr1` like '부산 ".$area[$i]['area']."%' ";
	//	$rs_join=$conn->Execute($sql);
	//	$area_member_cnt[$i]['cnt']=$rs_join->fields['cnt'];

	//	$total_busan_member_cnt=$total_busan_member_cnt+$rs_join->fields['cnt'];
	//}
	//else
	//{
	//	$rs_member=$conn->Execute($sql);

	//	그외(기타 지역, 미설정)는 전체 회원수-부산 각 구 검색으로 구한 회원수
	//	$area_member_cnt[$i]['cnt']=$rs_member->fields['cnt']-$total_busan_member_cnt;
	//}
}

for($i=0;$i<count($area_member_cnt);$i++)
{
	$area_member_cnt[$i]['percent']=round($area_member_cnt[$i]['cnt']/$total_busan_member_cnt*100);
}

//연령
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
$sql=$sql." from g5_member_new ";
$sql=$sql." where mb_leave_date='' and mb_intercept_date='' and mb_birth REGEXP '([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})+$' ";
if($start_date)
{
	$sql=$sql." and `mb_datetime`>='".$start_date." 00:00:00' ";
}
if($end_date)
{
	$sql=$sql." and `mb_datetime`<='".$end_date." 23:59:59' ";
}
$sql=$sql." ) as c ";
$sql=$sql." group by age_group ";
$sql=$sql." order by age_group ";

$rs_member=$conn->Execute($sql);

$i=0;

$total_member_cnt=0;

while(!$rs_member->EOF)
{
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


//성별
//$sql=" select ";
//$sql=$sql." count(`mb_no`) as cnt ";
//$sql=$sql." from ";
//$sql=$sql." `".$DB_TABLE."` a";
//$sql=$sql." where mb_leave_date='' and mb_intercept_date='' ";
//$sql=$sql." and `mb_sex`='' ";

//$rs_member=$conn->Execute($sql);

//$sex_member_cnt[0]['name']='미설정';
//$sex_member_cnt[0]['cnt']=$rs_member->fields['cnt'];

$sql=" select ";
$sql=$sql." count(`mb_no`) as cnt ";
$sql=$sql." from ";
$sql=$sql." `".$DB_TABLE."` a";
$sql=$sql." where mb_leave_date='' and mb_intercept_date='' ";
$sql=$sql." and `mb_sex`='1' ";
if($start_date)
{
	$sql=$sql." and `mb_datetime`>='".$start_date." 00:00:00' ";
}
if($end_date)
{
	$sql=$sql." and `mb_datetime`<='".$end_date." 23:59:59' ";
}

$rs_member=$conn->Execute($sql);

$sex_member_cnt[0]['name']='남';
$sex_member_cnt[0]['cnt']=$rs_member->fields['cnt'];

$sql=" select ";
$sql=$sql." count(`mb_no`) as cnt ";
$sql=$sql." from ";
$sql=$sql." `".$DB_TABLE."` a";
$sql=$sql." where mb_leave_date='' and mb_intercept_date='' ";
$sql=$sql." and `mb_sex`='2' ";
if($start_date)
{
	$sql=$sql." and `mb_datetime`>='".$start_date." 00:00:00' ";
}
if($end_date)
{
	$sql=$sql." and `mb_datetime`<='".$end_date." 23:59:59' ";
}

$rs_member=$conn->Execute($sql);

$sex_member_cnt[1]['name']='여';
$sex_member_cnt[1]['cnt']=$rs_member->fields['cnt'];

$total_member_cnt=$sex_member_cnt[0]['cnt']+$sex_member_cnt[1]['cnt'];

$sex_member_cnt[0]['percent']=round($sex_member_cnt[0]['cnt']/$total_member_cnt*100);
$sex_member_cnt[1]['percent']=round($sex_member_cnt[1]['cnt']/$total_member_cnt*100);

$sql=" select ";
$sql=$sql." `mb_id`, `mb_name`, `mb_addr1` ";
$sql=$sql." from ";
$sql=$sql." `".$DB_TABLE."` a ";
$sql=$sql." order by `mb_no` desc ";
$sql=$sql." limit 0, 10 ";

$rs_member=$conn->Execute($sql);

while(!$rs_member->EOF)
{
	foreach($rs_member->fields as $key => $value)
	{
		$value=stripslashes($value);

		if($key=='mb_addr1' && $value)
		{
			$tmp_addr=explode(' ', $value);
			$value=$tmp_addr[0].' '.$tmp_addr[1];
		}

		$new_member[$rs_member->_currentRow][$key]=$value;
	}
	$rs_member->MoveNext();
}

$sql=" select ";
$sql=$sql." `mb_id`, `mb_name`, `mb_addr1` ";
$sql=$sql." from ";
$sql=$sql." `".$DB_TABLE."` a";
$sql=$sql." where `mb_leave_date`!='' ";
$sql=$sql." order by `mb_leave_date` desc ";
$sql=$sql." limit 0, 10 ";

$rs_member=$conn->Execute($sql);

while(!$rs_member->EOF)
{
	foreach($rs_member->fields as $key => $value)
	{
		$value=stripslashes($value);

		if($key=='mb_addr1' && $value)
		{
			$tmp_addr=explode(' ', $value);
			$value=$tmp_addr[0].' '.$tmp_addr[1];
		}

		$leave_member[$rs_member->_currentRow][$key]=$value;
	}
	$rs_member->MoveNext();
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

$smarty->assign("month_join_member_cnt", $month_join_member_cnt);//
$smarty->assign("month_withdraw_member_cnt", $month_withdraw_member_cnt);//

$smarty->assign("year_join_member_cnt", $year_join_member_cnt);//
$smarty->assign("year_withdraw_member_cnt", $year_withdraw_member_cnt);//

$smarty->assign("area_member_cnt", $area_member_cnt);//
$smarty->assign("age_member_cnt", $age_member_cnt);//
$smarty->assign("sex_member_cnt", $sex_member_cnt);//

$smarty->assign("previous_year", $previous_year);//
$smarty->assign("area", $area);//

$smarty->assign("new_member", $new_member);//
$smarty->assign("leave_member", $leave_member);//

$smarty->assign("etc", $etc);//기타, 페이징 변수
$smarty->assign("category", $category);

##템플릿 페이지 연결#################
$main_contents = $FILE_SKIN."list.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents, '', $FILE_FOLDER);
?>