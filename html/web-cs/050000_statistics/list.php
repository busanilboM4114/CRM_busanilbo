<?php
$year=date('Y');
$month=date('m');
$day=date('d');

//월별 접속
for($i=1, $j=0;$i<=12;$i++, $j++)
{
	$ii=$i<10 ? '0'.$i : $i;

	$sql=" select ";
	$sql=$sql." count(`idx`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `year`='".$year."' and `month`='".$ii."' ";

	$rs_log=$conn->Execute($sql);

	$month_log[$j]['cnt']=$rs_log->fields['cnt'];
}

//일별 접속
for($i=7, $j=0;$i>=1;$i--, $j++)
{
	$week_day[$j]['day']=date("Y-m-d", strtotime('-'.$i.' Day'));
	$target_date=explode('-', $week_day[$j]['day']);

	$sql=" select ";
	$sql=$sql." count(`idx`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `year`='".$target_date[0]."' and `month`='".$target_date[1]."' and `day`='".$target_date[2]."' ";

	$rs_log=$conn->Execute($sql);

	$day_log[$j]['cnt']=$rs_log->fields['cnt'];

	$week_day[$j]['day']=str_replace('-', '.', $week_day[$j]['day']);
}

//시간대별 접속
$time[0]['time']="'00:00:00' and '02:59:59'";
$time[1]['time']="'03:00:00' and '05:59:59'";
$time[2]['time']="'06:00:00' and '08:59:59'";
$time[3]['time']="'09:00:00' and '11:59:59'";
$time[4]['time']="'12:00:00' and '14:59:59'";
$time[5]['time']="'15:00:00' and '17:59:59'";
$time[6]['time']="'18:00:00' and '20:59:59'";
$time[7]['time']="'21:00:00' and '23:59:59'";
$time[0]['name']="0시~3시";
$time[1]['name']="3시~6시";
$time[2]['name']="6시~9시";
$time[3]['name']="9시~12시";
$time[4]['name']="12시~15시";
$time[5]['name']="15시~18시";
$time[6]['name']="18시~21시";
$time[7]['name']="21시~24시";

for($i=0;$i<count($time);$i++)
{
	$sql=" select ";
	$sql=$sql." count(`idx`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `time` between ".$time[$i]['time']." ";

	$rs_log=$conn->Execute($sql);

	$time_log[$i]['cnt']=$rs_log->fields['cnt'];
}

//요일별 접속
$dow[0]['idx']="0";
$dow[1]['idx']="1";
$dow[2]['idx']="2";
$dow[3]['idx']="3";
$dow[4]['idx']="4";
$dow[5]['idx']="5";
$dow[6]['idx']="6";
$dow[0]['name']="일";
$dow[1]['name']="월";
$dow[2]['name']="화";
$dow[3]['name']="수";
$dow[4]['name']="목";
$dow[5]['name']="금";
$dow[6]['name']="토";

for($i=0;$i<count($dow);$i++)
{
	$sql=" select ";
	$sql=$sql." count(`idx`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `dow`='".$dow[$i]['idx']."' ";

	//debug_fix($sql, 0);

	$rs_log=$conn->Execute($sql);

	$dow_log[$i]['cnt']=$rs_log->fields['cnt'];
}

//브라우저별 접속
$browser[0]['type']="Edg";
$browser[1]['type']="Whale";
$browser[2]['type']="Chrome";
$browser[3]['type']="Firefox";
$browser[4]['type']="none";
$browser[0]['name']="Edge";
$browser[1]['name']="Whale";
$browser[2]['name']="Chrome";
$browser[3]['name']="Firefox";
$browser[4]['name']="기타";
$browser[0]['class']="primary";
$browser[1]['class']="warning";
$browser[2]['class']="success";
$browser[3]['class']="danger";
$browser[4]['class']="info";

for($i=0;$i<count($browser);$i++)
{
	$sql=" select ";
	$sql=$sql." count(`idx`) as cnt ";
	$sql=$sql." from ";
	$sql=$sql." `".$DB_TABLE."` a";
	$sql=$sql." where ";
	$sql=$sql." `browser`='".$browser[$i]['type']."' ";

	//debug_fix($sql, 0);

	$rs_log=$conn->Execute($sql);

	$browser_log[$i]['cnt']=$rs_log->fields['cnt'];
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
$etc['category_idx']		= $category_idx;
$etc['total_count']			= $total_count;
##스마티에 변수 담기#################
$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->compile_dir = Compile_PATH;
$smarty->template_dir = Template_PATH.$FILE_FOLDER;
$smarty->debugging = 0;

$smarty->assign("month_log", $month_log);//
$smarty->assign("day_log", $day_log);//

$smarty->assign("time_log", $time_log);//
$smarty->assign("dow_log", $dow_log);//

$smarty->assign("browser_log", $browser_log);//

$smarty->assign("week_day", $week_day);//
$smarty->assign("time", $time);//
$smarty->assign("dow", $dow);//
$smarty->assign("browser", $browser);//

$smarty->assign("etc", $etc);//기타, 페이징 변수
$smarty->assign("category", $category);

##템플릿 페이지 연결#################
$main_contents = $FILE_SKIN."list.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents, '', $FILE_FOLDER);
?>