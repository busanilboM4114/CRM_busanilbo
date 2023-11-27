<?php
ini_set('display_errors', 1);
include_once $_SERVER["DOCUMENT_ROOT"]."/html/web-cs/config_init.php";

if(!$_SESSION['_ADMIN_ID'])
{
	script_alert_replace('관리자 로그인이 필요합니다.', $Admin_Login_Path);
	exit;
}

include_once $_SERVER['DOCUMENT_ROOT'].$Admin_Master_Path.'/share/ui/header_fix_style.php';
?>

<div id="body">
	<div id="contents">
		<!-- 컨텐츠 -->
		<div class="contents_ifm_wrap" id="iMain">
			<div id="contents_wrap" style="width:90%;max-width: 1400px;">
			<!-- 컨텐츠 -->

			<?php
				$menu	= $_REQUEST['menu'] ? $_REQUEST['menu'] : '000000_amain';
				$tn		= $_REQUEST['tn'] ? $_REQUEST['tn'] : 'board';
				@include $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/'.$menu.'/a.php';
			?>

			</div>

<?php
	include_once $_SERVER['DOCUMENT_ROOT'].$Admin_Master_Path.'/share/ui/footer_fix_style.php';
?>