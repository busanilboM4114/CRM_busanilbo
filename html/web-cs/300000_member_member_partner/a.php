<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php';

	$mode = $_REQUEST['mode'] ? $_REQUEST['mode'] : 'list';

	$tn				= 'newsletter_mapping';
	$DB_TABLE		= $tn;
	$FILE_FOLDER	= $menu;
	$FILE_SKIN		= '_a';
	$FILE_NAME		= '';
	$board_title	= '파트너관리';

	$search_select	= $_REQUEST['search_select'];//검색범위, xss 공격 대응. 정해진 값 외엔 기본값 지정

	switch($search_select)
	{
		case '':
		case 'mb_id':
		case 'mb_name':
		case 'all':
			break;
		default :
			$search_select= $_REQUEST['keyword']=='' ? '' : 'mb_id';
			break;
	}

	switch($mode)
	{
		case '':
		case 'list':
			include CLASS_PATH.$FILE_FOLDER.'/'.$FILE_NAME.'list.php';
			break;
		case 'read':
			include CLASS_PATH.$FILE_FOLDER.'/'.$FILE_NAME.'read.php';
			break;
		case 'write':
		case 'modify':
			include CLASS_PATH.$FILE_FOLDER.'/'.$FILE_NAME.'write.php';
			break;
		case 'process':
			include CLASS_PATH.$FILE_FOLDER.'/'.$FILE_NAME.'process.php';
			break;
		default:
			include CLASS_PATH.'Error_404.html';
			break;
	}
?>