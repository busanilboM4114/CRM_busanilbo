<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko" style="height:100%;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0,user-scalable=no">
<meta name="title" content="<?php echo $KOR_Title_Name?>">
<title><?php echo $KOR_Title_Name?></title>
<script type="text/javascript" src="/share/js/program_jyb.js"></script>
<script type="text/javascript" src="/share/js/jquery-1.9.1.min.js"></script>
<link href="/share/css/program_jyb.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/share/css/admin.php" media="all" />
<style>
	@font-face {
		font-family: 'Pretendard-Thin';
		src: url('https://cdn.jsdelivr.net/gh/Project-Noonnu/noonfonts_2107@1.1/Pretendard-Thin.woff') format('woff');
		font-weight: 100;
		font-style: normal;
	}
	@font-face {
		font-family: 'Pretendard-Regular';
		src: url('https://cdn.jsdelivr.net/gh/Project-Noonnu/noonfonts_2107@1.1/Pretendard-Regular.woff') format('woff');
		font-weight: 400;
		font-style: normal;
	}
	@font-face {
		font-family: 'Pretendard-ExtraBold';
		src: url('https://cdn.jsdelivr.net/gh/Project-Noonnu/noonfonts_2107@1.1/Pretendard-ExtraBold.woff') format('woff');
		font-weight: 800;
		font-style: normal;
	}

	* {font-family:'Pretendard', sans-serif;}

	@media (max-width: 767px) {
		div {box-sizing: border-box;}
		#login {
			max-width: 300px;
		}
		#login .login_text h2 {
			font-size: 30px;
		}
		#login .login_text .text p {
			font-size: 18px;
		}
		#login .login {
			display: block;
		}
		#login .login_form {
			padding: 50px 20px;
			width: 100%;
		}
		#login .login_text {
			padding: 75px 0px 50px 90px;
			min-width: 0;
			width: 100%;
			display: block;
		}
		#login .login_text .login_icon {
			top: 140px;
			left: -72px;
		}
		#login .login_text .login_icon img {
			height: 150px;
		}
		#login input[type=text], #login input[type=password] {
			width: 240px;
		}
		#login input[type=submit] {
			width: 240px;
			margin-top: 30px;
		}
		#login fieldset {
			width: 240px;
		}		
		.large_logo {
			top: 50px;
			left: -161%;
		}
		#login .logo {
			position: absolute;
			left: 25px;
			top: 25px;
		}
	}
	@media (min-width: 768px) {
		#login .login {
			display: block;
		}
		#login .login_form {
			padding: 100px;
		}
		#login .login_text {
			padding-top: 100px;
			padding-bottom: 100px;
		}
		#login .login_text .login_icon {
			top: 210px;
			left: -180px;
		}
		#login .login_text .login_icon img {
			height: 350px;
		}
	}
	@media (min-width: 1200px) {
		#login .login_form {
			padding-top: 200px;
			padding-bottom: 200px;
		}
		#login input[type=text], #login input[type=password] {
			width: 300px;
		}
		#login input[type=submit] {
			width: 300px;
		}
		#login .login {
			display: grid;
			grid-template-columns: 1.5fr 1fr;
		}
	}
	@media (min-width: 1440px) {
		#login input[type=text], #login input[type=password] {
			width: 400px;
		}
		#login input[type=submit] {
			width: 400px;
		}
	}
</style>

<script type="text/javascript">
function login_frm_chk(obj)
{
	flag=frm_chk(obj);
	if(flag)
	{
		if($("#saveid").is(':checked'))
		{
			saveLogin($("#userid").val());
		}
		else
		{
			saveLogin("");
		}
		return true;
	}
	else
	{
		return false;
	}
}

function saveLogin(id)
{
	if(id != "")
	{
	// userid 쿠키에 id 값을 7일간 저장
		setsave("userid", id, 7);
	}else{
	// userid 쿠키 삭제
		setsave("userid", id, -1);
	}
}

function setsave(name, value, expiredays)
{
	var today = new Date();
	today.setDate( today.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + today.toGMTString() + ";"
}

function getLogin()
{
	document.frm.userid.focus();
	// userid 쿠키에서 id 값을 가져온다.
	var key = "userid";
	var cook = document.cookie + ";";
	var idx = cook.indexOf(key, 0);
	var val = "";

	if(idx != -1)
	{
		cook = cook.substring(idx, cook.length);
		begin = cook.indexOf("=", 0) + 1;
		end = cook.indexOf(";", begin);
		val = unescape( cook.substring(begin, end) );
	}

	// 가져온 쿠키값이 있으면
	if(val!= "")
	{
		document.frm.userid.value = val;
		document.frm.saveid.checked = true;
	}
}
</script>
</head>

<body onLoad="getLogin();" style="height: 100%;">
	<div class="large_logo">
		<img src="/img/admin/b_logo.png" alt="" />
	</div>
	<div class="blur"></div>
	<div class="login_body" style="height: 100%; background-image:url(/img/admin/bg_login2.jpg); background-repeat: no-repeat; background-size:cover; background-position: center center;">
		<form id="frm" name="frm" method="post" action="/login/login_process.php" onSubmit="return login_frm_chk(this);">
			<input type="hidden" id="mode" name="mode" value="alogin" />

			<div id="login" class="tac" style="z-index: 999;">
				<div class="login">
					<div class="login_text">
						<div class="login_icon">
							<img src="/img/admin/power-button.png" alt="" />
						</div>
						<h1 class="logo">
							<a href="https://busan.com" target="_blank">
								<img src="/img/admin/headlogo.png" alt="<?php echo $KOR_Title_Name?> 관리자모드 LOGIN" style="display: block;" />
							</a>
						</h1>
						<h2>CRM <span>LOGIN</span></h2>
						<div class="text">
							<p><strong>C</strong>USTOMER</p>
							<p><strong>R</strong>ELATIONSHIP</p>
							<p><strong>M</strong>ANAGEMENT</p>
						</div>
					</div>
					
					<div class="login_form">
						<fieldset>
							<legend>로그인</legend>
							<p>
								<label for="userid"><img src="/img/admin/id_icon.png" alt="아이디" /></label>
								<input type="text" id="userid" name="userid" title="아이디" class="required" placeholder="아이디" />
							</p>
							<p>
								<label for="userpwd"><img src="/img/admin/pass_icon.png" alt="비밀번호" /></label> <input type="password" id="userpwd" name="userpwd" title="비밀번호" class="required" placeholder="비밀번호" />
							</p>
							<input type="submit" value="로그인" />
						</fieldset>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>

</html>