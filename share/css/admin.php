<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php';

header('Content-Type:text/css; charset=utf-8');
?>
* { font-style: normal/* em, dfn, var, cite, address */; font-family: 돋움, dotum, AppleGothic, sans-serif; }

body,h1,h2,h3,p,ul,li,div,fieldset,legend {
	padding:0;
	margin: 0;
	font-size:9pt;
}
body {
	position: relative;
	overflow: hidden;
}
caption,legend {
	font-size: 0;
	line-height: 0;
	height:0;
	text-indent: -99999px;
}
li {list-style:none;}
table {
	border-collapse: collapse;
}
img {border: 0;}
fieldset {
	border: 0 none;
	padding: 0;
	margin: auto;
}
#login fieldset{
	width:300px;
}
.btnGray {
	border: 0 none;
	background: #666;
	height: 30px;
	line-height: 30px;
	color:#fff;
	padding:0 10px;
}


::selection{
  background: #37c0f4;
  color: #fff;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
}


#wrap {
	background:url('<?=$Admin_Master_Path?>img/bg_head.png') repeat-x left top;
	width: 100%;
}
#header, #container {
	width: 1098px;
	margin: 0 auto;
}
#header {
	height: 98px;
	position: relative;
}
#header h1 {
	float:left;
	padding: 48px 0 0 0;
}
#userInfo {
	position: absolute;
	right: 0;
	top: 4px;
	color:#999;
	font-size: 11px;
	z-index:10001;
}

#userInfo a,#userInfo button {
	background: #33c4c5;
	color:#fff;
	font-size: 11px;
	border: 1px solid #1a999a;
	display: inline-block;
	height: 16px;
	text-decoration: none;
	padding: 5px 10px;

	vertical-align: middle;
	cursor: pointer;
}
#userInfo a {
	line-height: 18px;
}
#userInfo button {
	background: #353535;
	margin: 0 -7px 0 8px;
	line-height: 11px;
	height: 28px;
	vertical-align: top;
	border: 1px solid #383838;
}


#gnb {
	position:relative;
	padding: 65px  0 0 100px;
	height: 70px;
	text-align: right;
	z-index:10000;
}
#gnb li:first-child,#gnb li .sub li:first-child {background: none;}
#gnb li {
	background: url('<?=$Admin_Master_Path?>img/pipe_gnb.png') no-repeat left 50%;
	height: 22px;
	line-height: 22px;
	font-weight: bold;
	padding: 0 6px 0 12px;
	color:#787878;
	vertical-align: bottom;
	display: inline-block;
	position: relative;
}
#gnb li a {
	font-size: 12px;
	font-weight: bold;
	text-decoration: none;
	color:#666;
}
#gnb li .sub {
	border: 1px solid #404042;
	background:#5c6169;
	/*max-width: 120px;
	min-width: 80px;*/
	position: absolute;
	top:26px;
}
#gnb li .sub li {
	display: block;
	background: none;
	line-height: 13px;
	width: auto;
	height: auto;
	text-align: left;
	font-weight: normal;
	color: #fff;
	font-size: 11px;
	vertical-align: bottom;
	padding: 4px 12px;
}

#gnb li .sub li a {
	font-weight: normal;
	color:#fff;
	font-size: 11px;
}

#container {padding: 46px 0 0 0;min-height:500px;}
#sideBar {
	float:left;
	width: 206px;
}
#sideBar h2 {
	background:#4a4a4a;
	height: 65px;
	padding: 0 0 0 32px;
	margin: 0 0 8px 0;
	line-height: 65px;
	font-size: 15px;
	color:#f5f5f5;
}

#sideBar ul li {
	/*height: 28px;*/
	line-height: 45px;
	border-bottom:1px dashed#cecece;
}
#sideBar ul li a:link {
	background:url('<?=$Admin_Master_Path?>img/bul_menu_off.png') no-repeat 10px 50%;
	font-size: 12px;
	padding: 0 0 0 21px;
	color:#656565;
	text-decoration: none;
}
#sideBar ul li a:visited{
	background:url('<?=$Admin_Master_Path?>img/bul_menu_on.png') no-repeat 10px 50%;
	color:#333;
}
#sideBar ul li a:hover{
	background:url('<?=$Admin_Master_Path?>img/bul_menu_on.png') no-repeat 10px 50%;
	font-size: 12px;
	font-weight: bold;
	color:#f2842b;
	text-decoration: none;
}
#sideBar ul li a:active{
	color:#f2842b;
}
#sideBar ul li ul{
	padding-left:15px;
}


#contents {
	width: 840px;
	margin: 0 0 0 258px;
}

#contents h3 {
	padding: 0 0 0 11px;
	font-size: 24px;
	height: 16px;
	line-height: 16px;
	color:#292929;
	margin: 5px 0 20px 0;
	font-weight:bold;
	font-family:sans-serif;
}
#contents .funcNav {
	float:right;
	font-size: 12px;
	margin: -30px 0 0 0;
}
#contents .funcNav a {
	margin: 0  5px;
	color:#555;
	text-decoration: none;
}
#contents .funcNav a.orange {color:#ff973c;}
#contents .funcNav a.blue {color:#3ccfff;}

#contents .dataTable {
	width: 100%;
}
#contents .dataTable thead th input,#contents .dataTable tbody td input {vertical-align: middle;}
#contents .dataTable thead th {
	background:#ececec;
	color:#333;
	height: 50px;
	font-weight: normal;
	font-size: 12px;
}
#contents .dataTable tbody td {
	border-bottom: 1px solid #e7e7e7;
	color:#555;
	height: 45px;
	font-weight: normal;
	font-size: 12px;
}
#contents .dataTable tbody td.apply {color:#ff973c;}
#contents .dataTable tbody td.date {color:#a3a5a7;}
#contents .fncBtn {
	padding: 10px 0 32px 0;
	text-align: center;
}
#contents .dataTable a{text-decoration:none;color:#555}
#contents .dataTable a.order_date{color:#333}
#contents .fncBtn .left {float:left;}
#contents .fncBtn .right {float:right;}
#contents .pageNav {
	margin: 0 0 20px 0;
	text-align: center;
}
#contents .pageNav button {
	background: none;
	border: 1px solid #cfcfcf;
	height: 18px;
	width: 18px;
	padding: 0;
	margin: 0;
	cursor: pointer;
	vertical-align: middle;
}
#contents .pageNav strong {
	font-size: 12px;
	color:#267dc1;
	text-decoration: underline;
	margin: 0 5px;
	vertical-align: middle;
}
#contents .pageNav a {
	font-size: 12px;
	color:#555;
	text-decoration: none;
	margin: 0 5px;
	vertical-align: middle;
}
#contents .search {text-align: center;}

#contents .writeForm {
	border-top: 1px solid #e7e7e7;
	width: 100%;
	margin:0 0 0 0;
}
#contents .writeForm th,#contents .writeForm td {
	border-bottom: 1px solid #e7e7e7;
}
#contents .writeForm th {
	background: #f5f3f1;
	text-align: center;
	font-size: 12px;
	font-weight: bold;
	color:#333;
}
#contents .writeForm td {
	font-size:12px;
}
#contents .writeForm td textarea {
	width: 80%;
	height: 49px;
	border: 1px solid #abadb3;
}
#contents .viewForm .title {
	background:#f5f3f1;
	padding: 10px 0;
	text-align: center;
	vertical-align: middle;
	line-height: 22px;
}
#contents .viewForm .title h4 {
	display: inline;
	color:#333;
	font-size: 15px;
}
#contents .viewForm .viewTable {
	padding: 0;
	margin: 0;
	width: 100%;
	border-collapse: collapse;
}
#contents .viewForm .viewTable a{
	text-decoration:none;
	color: #555;
}
#contents .viewForm .viewTable th,#contents .viewForm .viewTable td {
	border-bottom: 1px solid #e7e7e7;
	margin: 0;
	padding: 10px;
	font-size: 12px;
	color:#555;
}
#contents .viewForm .viewTable th {
	background:#f5f3f1;
	text-align: center;
	font-weight: bold;
}
#contents .viewForm .viewTable td {
	/*padding: 0 0 0 3%;*/
	width: auto;
}

/*게시판 뷰페이지 사용자와 같은 스타일*/
.boardCont{
	border-bottom: 1px solid #e7e7e7 !important;
}

.boardRead{
	width:800px;
	margin: 0 auto;
	padding: 30px 0;
}
.boardRead .boardReadCont {
	color: #676767;
	line-height: 180%;
	word-break:break-all;
	/*white-space:nowrap;*/
	word-wrap:break-word;
}
.boardRead .boardReadCont p{padding:0;margin:12px 0;}
.boardRead .boardReadCont a{text-decoration:none;}
/*게시판 뷰페이지 사용자와 같은 스타일 끝*/

#contents .pageMove {
	border-top: 1px solid #e7e7e7;
}
#contents .pageMove ul li {
	border-bottom: 1px solid #e7e7e7;
	height: 39px;

}
#contents .pageMove ul li span {
	float:left;
	padding: 0 0 0 37px;
	font-size: 11px;
	color:#8e8e8e;
	font-weight: bold;
	line-height: 40px;
}
#contents .pageMove ul li a {
	font-size: 11px;
	color:#8e8e8e;
	text-decoration: none;
	margin-left: 60px;
	line-height: 39px;
}
#contents .pageMove ul li img {vertical-align:middle;}
#contents .pageMove ul li.next span {background:url('<?=$Admin_Master_Path?>img/bul_next.png') no-repeat 22px 50%;}
#contents .pageMove ul li.prev span {background:url('<?=$Admin_Master_Path?>img/bul_prev.png') no-repeat 22px 50%;}



/*메인*/
#main_contents {
	width: 100%;
}

#main_contents h3 {
	background:url('<?=$Admin_Master_Path?>img/pipe_title.png') no-repeat left top;
	padding: 0 0 0 11px;
	font-size: 15px;
	height: 16px;
	line-height: 16px;
	color:#787878;
	margin: 0 0 15px 0;
}
#main_contents .funcNav {
	float:right;
	font-size: 12px;
	margin: -30px 0 0 0;
}
#main_contents .funcNav a {
	margin: 0  5px;
	color:#555;
	text-decoration: none;
}
#main_contents .funcNav a.orange {color:#ff973c;}
#main_contents .funcNav a.blue {color:#3ccfff;}

#main_contents .dataTable {
	width: 100%;
}
#main_contents .dataTable thead th input,#main_contents .dataTable tbody td input {vertical-align: middle;}
#main_contents .dataTable thead th {
	background:#f5f3f1;
	color:#333;
	height: 32px;
	font-weight: normal;
	font-size: 12px;
}
#main_contents .dataTable tbody td {
	border-bottom: 1px solid #e7e7e7;
	color:#555;
	height: 32px;
	font-weight: normal;
	font-size: 12px;
}
#main_contents .dataTable tbody td.apply {color:#ff973c;}
#main_contents .dataTable tbody td.date {color:#a3a5a7;}
#main_contents .fncBtn {
	padding: 10px 0 32px 0;
	text-align: center;
}
#main_contents .fncBtn .left {float:left;}
#main_contents .fncBtn .right {float:right;}

/*메인끝*/


#login {
	position: absolute;
	top: 50%;
	left: 50%;
	/*padding: 200px 100px;*/
	transform: translate(-50%, -50%);
	border-radius: 30px;
	/*background: #fff;*/
	box-shadow: 0 0 30px rgba(0,0,0,0.15);
	overflow: hidden;
}
#login .login {
	display: grid;
	/*gap: 100px;*/
	grid-template-columns: 1.25fr 1fr;
	align-items: center;
}
.blur {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 98;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
    transition: height 0.3s ease-in-out, opacity 0.2s ease-in-out;
}
.large_logo {
	position: absolute;
	opacity: 0.1;
	top: 100px;
	left: -100px;
	z-index: 99;
}
#login .logo {
	position: absolute;
	left: 50px;
	top: 50px;
}
#login .logo img {
	display: block;
	height: 20px;
}
#login .login_text {
	display: flex;
	align-content: center;
	height: 100%;
	flex-wrap: wrap;
	background: rgba(255,255,255,1);
	text-align: left;
	padding-left: 220px;
	padding-right: 100px;
	min-width: 321px;
}
#login .login_text h2 {
	font-size: 60px;
	color: #222;
	font-weight: 800;
}
#login .login_text h2 span {
	font-weight: 100;
}
#login .login_text .text {
	margin: 20px 0 0 0;
}
#login .login_text .text p {
	font-size: 36px;
	font-weight: 800;
	color: #ccc;
}
#login .login_text .text p strong {
	color: #222;
	font-weight: 800;
}
#login .login_text .login_icon {
	position: absolute;
	left: -200px;
	top: 50%;
	opacity: 0.15;
	transform: translateY(-50%);
	z-index: 0;
}
#login .login_text .login_icon img {
	display: block;
	width: 100%;
	height: 400px;
}
#login .login_form {
	padding: 200px 100px;
	background: rgba(0,0,0,0.5);
}

/*
#login .loginForm {
	border: 1px solid #ddd;
	padding: 55px 0 44px 0;
	background:#fcfcf7;
}
#login .loginForm h1 {
	float: left;
	padding: 0 0 0 42px;
}
#login .loginForm p {padding: 0 0 7px 42px;font-size:9pt;}
#login .loginForm p input[type=text], #login .loginForm p input[type=password] {
	border: 1px solid #dedede;
	width: 162px;
	margin: 0 0 0 4px;
}
#login .loginForm input[type=submit] {
	float: right;
	margin: -80px 45px 0 0;
	width: 70px;
	height: 47px;
	background-color: #41d0cc;
	border: 1px solid #22b5b1;
	color: #fff;
	cursor: pointer;
}
#login .link {
	position: absolute;
	top: -35px;
	right: 3px;
}
#login .link a {margin: 0 0 0 10px;}
#login .copy {
	padding: 12px 0 0 0;
	text-align: center;
}

*/
#footer {
	margin-top: 80px;
	text-align: center;
	background: #4a4a4a;
	color:#cccccc;
	font-size: 12px;
	height: 80px;
	line-height: 80px;
}

.btn_print {
	float:right;
	margin: -35px 0 0 0;
}

.color_red{
	color: red;
}
.color_blue{
	color: #2db2de;
}
.color_status_9{
	color: #555;
}
.color_status_10{
	color: #2db2de;
}
.color_status_11{
	color: #9b6a6c;
}

#login p {position:relative;}
#login input[type=text], #login input[type=password] {padding:0 0 0 45px; width:400px; border:none; box-sizing: border-box; height:50px; color:#b8b8b8; margin-bottom:10px; background: #333; border-radius: 10px; font-size: 18px;}
#login input[type=text]:hover, #login input[type=password]:hover {border:none; background: #fff;}
#login input[type=text]:focus, #login input[type=password]:focus {border:none; background: #fff;}
#login label {position:absolute; top:10px; vertical-align:middle; padding-left: 15px;}
#login input[type=submit] {border:none; width:400px; height:60px; border-radius:30px; color:#fff; font-weight: 400; font-size:18px; background:#00539e; margin-top:40px; cursor: pointer; box-shadow: 5px 5px 10px rgba(0,0,0,0.2)}
#login .link_wrap {margin-top:10px;}
#login a {text-decoration:none; color:#b8b8b8; font-size:15px; letter-spacing:-1px;}
#login a img {vertical-align:middle; margin-right:5px;}
#login span.line {display:inline-block; height:15px; border-right:1px solid #b8b8b8; vertical-align:middle; margin:0 10px 3px 10px;}