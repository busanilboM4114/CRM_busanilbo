<?php
ini_set('display_errors', 1);
include_once $_SERVER["DOCUMENT_ROOT"]."/html/web-cs/config_init.php";

if(!$_SESSION['_ADMIN_ID'])
{
	script_alert_replace('관리자 로그인이 필요합니다.', $Admin_Login_Path);
	exit;
}

include_once $_SERVER['DOCUMENT_ROOT'].$Admin_Master_Path.'/share/ui/header.php';

$menu	= $_REQUEST['menu'] ? $_REQUEST['menu'] : '000000_amain';
$tn		= $_REQUEST['tn'] ? $_REQUEST['tn'] : 'board';
include $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/'.$menu.'/a.php';

//echo getBrowser();

//echo search_text('https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=0&ie=utf8&query=%EB%B0%94%EC%9A%B4%EC%8A%A4+2023');
//echo search_text('https://search.daum.net/search?w=site&nil_search=btn&DA=PGD&enc=utf8&lpp=10&q=%EB%B0%94%EC%9A%B4%EC%8A%A4+%ED%99%88%ED%8E%98%EC%9D%B4%EC%A7%80&p=2');
//echo urlencode('부산일보');
//echo urlencode('부산 도시가스 요금');

include_once $_SERVER['DOCUMENT_ROOT'].$Admin_Master_Path.'/share/ui/footer.php';
?>