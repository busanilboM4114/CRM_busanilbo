<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<script type="text/javascript" src="/share/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/share/js/program_jyb.js"></script>
	<script type="text/javascript" src="<?=$Admin_Master_Path?>/share/js/script.js"></script>

	<title><?=$KOR_Title_Name?></title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="/share/css/program_jyb.css"/>
	<link href="<?=$Admin_Master_Path?>/share/adminkitPro/css/light.css" rel="stylesheet">
	<link href="<?=$Admin_Master_Path?>/share/css/color.css" rel="stylesheet">
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
		<?php
			include_once $_SERVER['DOCUMENT_ROOT'].$Admin_Master_Path.'/share/inc/menu.php';
		?>
		<div class="main">
			<?php
				include_once $_SERVER['DOCUMENT_ROOT'].$Admin_Master_Path.'/share/inc/main_top.php';
			?>
