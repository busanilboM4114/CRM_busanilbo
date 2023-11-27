<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/config_init.php';

//session_destroy();
//print_r($_SESSION);

if ( isset($_SESSION["_USER_ID"]) && $_SESSION['_USER_ID']!= "" )
{
	header("Location:/");
	exit;
}

$ref=$_REQUEST['ref'];

$_SESSION['tmp_social_login_type']='login';//로그인. 소셜로그인 처리에서 join인지 login인지 구분
$_SESSION['_USER_LOGIN_REF']=$ref;

//네이버
function generate_state()
{
	$mt = microtime();
	$rand = mt_rand();
	return md5($mt . $rand);
}
// state token으로 사용할 랜덤 문자열을 생성
$state = generate_state();
// 세션 또는 별도의 스토리지에 state token을 저장
$_SESSION['NAVER_TOKEN']=$state;

//https://nid.naver.com/oauth2.0/authorize?client_id=EZDFyrbk3hHyI20cCS0w&response_type=code&redirect_uri=http%3A%2F%2Fhsd.fixtest.co.kr%2Fhtml%2F13%2Fnaver_login.php&state=$state

$redirect_url=urlencode('http://'.$_SERVER['HTTP_HOST'].'/login/naver_login.php');
$redirect_url_mobile=urlencode('http://'.$_SERVER['HTTP_HOST'].'/login/naver_login_mobile.php');

if(MobileCheck()=='Computer' && iPadCheck()=='Computer')
{
	$naver_login_btn='<a href="#none" onclick="naverlogin();return false;" class="mgr_10" title="네이버 로그인(새창)"><img src="/img/layout/button_naver.png" alt="네이버 아이디로 로그인" style="width:50px;"></a>';
}
else
{
	$naver_login_btn='<a href="https://nid.naver.com/oauth2.0/authorize?client_id='.$naver_login_client_id.'&response_type=code&redirect_uri='.$redirect_url_mobile.'&state='.$state.'"  class="mgr_10" title="네이버 아이디로 로그인"><img src="/img/layout/button_naver.png" alt="네이버로그인" style="width:50px;"></a>';
}
//네이버 끝

//kakao
$kakao_redirect_url=urlencode('http://'.$_SERVER['HTTP_HOST'].'/login/kakao_login.php');

//$kakao_redirect_url_mobile=urlencode('http://'.$_SERVER['HTTP_HOST'].'/login/kakao_login_mobile.php'); //카카오는 redirect url 하나만 지정 가능

if(MobileCheck()=='Computer' && iPadCheck()=='Computer')
{
	$kakao_login_btn='<a href="#none" onclick="kakaologin();return false;" class="mgr_10" title="카카오톡 로그인(새창)"><img src="/img/layout/button_kakao.png" alt="카카오로그인" style="width:50px;"></a>';
}
else
{
	$kakao_login_btn='<a href="https://kauth.kakao.com/oauth/authorize?client_id='.$kakao_login_client_id.'&amp;redirect_uri='.$kakao_redirect_url.'&amp;response_type=code" class="mgr_10" title="카카오로그인"><img src="/img/layout/button_kakao.png" alt="카카오로그인" style="width:50px;" /></a>';
}
//kakao 끝

//google
//코드 요청 새창만 띄움
//google 끝

//facebook
include_once $_SERVER['DOCUMENT_ROOT'].'/html/web-cs/libs/facebook_sdk/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
	'appId'  => $facebook_login_client_id,
	'secret' => $facebook_login_client_secret,
));

// Get User ID
$user = $facebook->getUser();

//print_r($user);

if ($user) {
	try {
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');

		if(0)//$_SERVER['REMOTE_ADDR']=='115.94.180.37' || $_SERVER['REMOTE_ADDR']=='115.94.180.38')
		{
			print_r($user_profile);
			exit;
		}

		$_SESSION['_USER_LOGIN_WHERE']='facebook';
		$_SESSION['_USER_NAME']=$user_profile['name'];
		$_SESSION['_USER_NICKNAME']=$user_profile['name'];
		$_SESSION['_USER_ID']=$user_profile['id'];
		$_SESSION['_USER_UNIQ_ID']=$user_profile['id'];

		unset($_SESSION['NAVER_TOKEN']);
		unset($_SESSION['NAVER_ACCESS_TOKEN']);
		unset($_SESSION['KAKAO_ACCESS_TOKEN']);

		if($_SESSION['_USER_LOGIN_REF'])
		{
			$ref=$_SESSION['_USER_LOGIN_REF'];
			unset($_SESSION['_USER_LOGIN_REF']);
		}
		else
		{
			$ref='/';
		}
		script_mov($ref);
		exit;

	} catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}
}
else
{
	$loginUrl = $facebook->getLoginUrl();
}

$facebook_login_btn='<a href="'.$loginUrl.'"  class="mgb_10" title="페이스북 아이디로 로그인"><img src="/img/layout/button_facebook.png" alt="페이스북로그인" style="width:50px;"></a>';
//facebook 끝
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0,user-scalable=no">
<title><?=$KOR_Title_Name?></title>
<script type="text/javascript" src="/share/js/program_jyb.js"></script>
<script type="text/javascript" src="/share/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" language="JavaScript" src="/share/js/login.js"></script>
<script type="text/javascript" src="/share/js/scrollreveal-master/dist/scrollreveal.min.js"></script>
<script type="text/javascript" src="/share/js/jquery-ui.min.js"></script>
<link href="/share/css/fix.css" rel="stylesheet" type="text/css" />
<link href="/share/css/fix_program.css" rel="stylesheet" type="text/css" />
<link href="/share/css/fix_animate.css" rel="stylesheet" type="text/css" />
<link href="/share/css/program_jyb.css" rel="stylesheet" type="text/css" />
<link href="/share/css/ra.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/share/css/login.css" media="all" />

<script type="text/javascript">
$(document).ready(function(){
	getLogin();
	$('#login_form').addClass('animation_on');
});

</script>

<script type="text/javascript">
//로그인 팝업띄우기
function naverlogin()
{
	url = "https://nid.naver.com/oauth2.0/authorize?client_id=<?=$naver_login_client_id?>&response_type=code&redirect_uri=<?=$redirect_url?>&state=<?=$state?>";
	win_open(url, "naver_login", 500, 530, 0, 0, 0, 1);
}

function kakaologin()
{
	url = "https://kauth.kakao.com/oauth/authorize?client_id=<?=$kakao_login_client_id?>&redirect_uri=<?=$kakao_redirect_url?>&response_type=code";
	win_open(url, "kakao_login", 500, 500, 0, 0, 1, 1);
}
</script>

<style>
.close_wrap a img {margin-top:7px;}
</style>
</head>

<body style="" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">

<div id="login_body">
	<div style="height:100%; width:100%; max-width:1100px; margin:auto;">
		<div class="dpt h_100p mdpb mpd_20">
			<div class="dptc vam pdr_100 mdpb mpdr_0">
				<h1 class="fs60">
					바로 지금, <br class="mdpn" />
					당신에게 <br class="mdpn" />
					창호 전문가가 <Br class="mdpn" />
					필요할 때
				</h1>
				<p class="fs18">
					이누스에는 많은 창호 전문가들이 활동합니다.<br />
					지금바로 회원이 되어 전문가의 도움을 받아보세요
				</p>
			</div>
			<div class="dptc vam pdl_100 mdpb mpdl_0">
				<form id="login_form" name="login_form" method="post" action="login_process.php" onSubmit="return logingo(this);">

					<a href="/html/00_main/" class="fix_logo"><img src="/img/layout/header_logo.png" alt="" style="width:109px;" /></a>
					<input type="hidden" name="type" value="login" />
					<input type="hidden" name="mode" value="login" />
					<input type="hidden" name="ref" value="<?=$ref?>" />
					<div id="login" class="">
						<!-- <h2>FCS 로그인</h2> -->
						<fieldset>
							<legend>Login</legend>
							<div class="input_wrap2 mgt_20">
								<input type="text" id="user_id" name="user_id" title="아이디" value="" class="no_button required" placeholder="이누스 계정" />
							</div>
							<div class="input_wrap2 mgt_20 mgb_10">
								<input type="password" id="user_pwd" name="user_pwd" title="비밀번호" class="no_button required" placeholder="비밀번호" />
							</div>
							<input type="checkbox" id="saveid" name="saveid" title="아이디 저장" /><label for="saveid">아이디 저장</label>

							<div class="button_wrap" style="margin-top:20px;">
								<button type="submit" class="button_color2" style="width:100%;">로그인</button>
							</div>
						</fieldset>
					</div>
					<div class="border_b mgt_50 mgb_30 re">
						<div class="pdlr_20 ab bg_white fc_bbb" style="margin:auto; left:50%; transform:translate(-50%, -50%);">SNS 로그인</div>
					</div>
					<div class="tac mgb_50">
						<?=$naver_login_btn?>
						<?=$kakao_login_btn?>
						<a href="#none" onclick="win_open('/login/google_login_get_code.php', 'google_login', '500', '500', '', '', '', '1');return false;" class="mgr_10"><img src="/img/layout/button_google.png" alt="" style="width:50px;" /></a>
						<?=$facebook_login_btn?>
					</div>
					<div class="fc_bbb">
						<a href="/html/07/01.php" class="fc_bbb">회원가입</a> | <a href="#none" class="fc_bbb">아이디/비밀번호 찾기</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="layer-wrap1" style="display: none;" onclick="close_patient();">
	<input type="hidden" id="focus_obj_id" value="" />
	<div class="pop-layer1">
		<h3 class="mgb_10">이누스 회원가입이 완료되었습니다.</h3>
		<p class="fs18 fc_999">메인 화면으로 이동합니다.</p>
	</div>
</div>

<script type="text/javascript" src="/share/js/animate.js"></script>
<div class="login_footer">
	<p class="footer_text tac mgb_10">
		<a class="mgr_10" href="/html/08/02.php">이용약관</a>
		<a class="mgr_10 fwb" href="/html/08/03.php">개인정보처리방침</a>
		<a class="" href="/html/08/04.php">이메일무단수집거부</a>
	</p>
	<p class="footer_copy tac">
		&copy; 2020 INUS. ALL RIGHT RESERVED. DESIGNED BY <a href="https://www.fixinc.co.kr/" target="_blank" title="Opens in new window">FIX</a>
	</p>

</div>
</body>

</html>