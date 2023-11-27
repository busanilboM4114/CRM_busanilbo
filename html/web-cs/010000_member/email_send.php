<?php
$pagenum		= intval($_REQUEST['pagenum']);
//$search_select	= $_REQUEST['search_select'];//검색범위. a.php / c.php 에 있음
$keyword		= $_REQUEST['keyword'];//검색어
$idx			= intval($_REQUEST['idx']);//기본키
$modes			= $_REQUEST['modes'];//동작 구분

$mode='email_send';
$modes='email_send';

//스마티 변수 할당
$etc['Admin_Login_Path']	= $Admin_Login_Path;
$etc['Admin_Master_Path']	= $Admin_Master_Path;
$etc['Admin_First_Path']	= $Admin_First_Path;

$etc['Web_URLS']		= $Web_URLS;
$etc['board_title']		= $board_title;
$etc['menu']			= $menu;
$etc['tn']				= $tn;
$etc['mode']			= $mode;
$etc['modes']			= $modes;

$etc['search_select']	= $search_select;
$etc['keyword']			= @htmlspecialchars($keyword);
$etc['pagenum']			= $pagenum;
$etc['pageclick']		= $pageclick;

##스마티에 변수 담기#################
$smarty = new Smarty;
$smarty->compile_check	= true;
$smarty->compile_dir	= Compile_PATH;
$smarty->template_dir	= Template_PATH.$FILE_FOLDER;
$smarty->debugging		= 0;

$smarty->assign("L", $fix_rows);
$smarty->assign("etc", $etc);//기타

##템플릿 페이지 연결#################
$main_contents = $FILE_SKIN."email_send.tpl.htm";
$smarty->clearCompiledTemplate();
$smarty->display($main_contents, '', $FILE_FOLDER);
?>