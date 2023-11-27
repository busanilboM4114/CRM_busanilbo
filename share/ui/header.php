<?php
include_once '../../share/inc/menu_all.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>

<meta name="title" content="FUN BUSAN" />
<meta name="author" content="FUN BUSAN" />
<meta name="keywords" content="FUN BUSAN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="FUN BUSAN" />
<meta property="og:url" content="" />
<meta name="description" content="FUN BUSAN" />
<meta property="og:description" content="FUN BUSAN" />


<meta property="og:image" content="/img/favicon/funbusan_300x150.png" />
<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
<link rel="shortcut icon" sizes="196x196" href="/img/favicon/android_196x196.png" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/img/favicon/ios_57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/favicon/ios_72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/favicon/ios_114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/img/favicon/ios_120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/favicon/ios_144x144.png" />
<link rel="apple-touch-icon-precomposed" href="/img/favicon/android_196X196.png" />

<title><?=$titleTag?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/share/css/base.css" type="text/css" />
<link rel="stylesheet" href="/share/css/program_jyb.css" type="text/css" />
<link rel="stylesheet" href="/share/css/layout.css" type="text/css" />
<link rel="stylesheet" href="/share/css/util.css" type="text/css" />
<link rel="stylesheet" href="/share/css/board.css" type="text/css" />
<link rel="stylesheet" href="/share/css/content.css" type="text/css" />
<link rel="stylesheet" href="/share/js/dist/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="../../share/js/jquery.bxslider.min.css" />

<? if ($main=="main") { ?>
<link rel="stylesheet" href="/share/css/main.css" type="text/css" />
<? } else if($d1n== "1") { ?>
<? } ?>
<script type="text/javascript" src="/share/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/share/js/program_jyb.js"></script>
<script src="/share/js/jquery-ui.js"></script>
<script type="text/javascript" src="../../share/js/jquery.easing.1.3.js"></script>
<script src="https://kit.fontawesome.com/b241c30ab2.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../share/js/TweenMax.js"></script>
<script type="text/javascript" src="../../share/js/ScrollToPlugin.min.js"></script>
<script type="text/javascript" src="../../share/js/Scrollify-master/jquery.scrollify.js"></script>
<script src="../../share/js/dist/owl.carousel.min.js"></script>
<script src="../../share/js/jquery.bxslider.min.js"></script>

<script type="text/javascript">
function menu_bg_animate(flag)
{
	w_height=$(document).height();

	if(flag)
	{
		$("#bg_wrap").css('height', w_height).stop().fadeTo('fast', 0.5);
	}
	else
	{
		$("#bg_wrap").stop().fadeOut();
	}
}
function scroll_top(){
	$('html, body').animate({scrollTop: 0}, 500);
}
</script>

<!--container min-height-->
<script>
$(window).scroll(function(){
	if ($(window).scrollTop() > $('body').height() - $('footer').outerHeight() - window.innerHeight)
	{
		$('.top_button').removeClass('fixed');
	}
	else
	{
		$('.top_button').addClass('fixed');
	}
	if ($(window).scrollTop() < window.innerHeight)
	{
		$('.top_button').fadeOut();
	}
	else
	{
		$('.top_button').fadeIn();
	}
});
function setCookie(name, value, expiredays)
{
	var today = new Date();
	today.setDate( today.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + today.toGMTString() + ";"
}
</script>

</head>
<body style="width:100%; overflow-x:hidden; position:relative;">
<div id="bg_wrap" style="background:rgba(0,0,0,0.7); width:100%; position:fixed; top:0; opacity:0; z-index:19;"></div>

<!-- 헤더 시작 -->
<header>
	<section class="header-nav">
		<h1 id="logo"><a href="/"><strong>FUN</strong> BUSAN</a></h1>
		<div class="mobile-gnb" id="mobile-gnb">
			<span class="line"></span>
			<span class="line"></span>
			<span class="line"></span>
		</div>
		<nav>
			<ul>
				<?php
				for($i=1; $i<6; $i++)
				{
				?>
				<li>
					<?php
					if(count($mMenu[$i]) >= 2)
					{
					?>
					<a href="<?=$mLink[$i][0][0][0]?>" class="m_gnb_1depth m_gnb1_<?=$i?> <? if($d1n == $i){ echo 'active'; } ?>"><?=$mTitle[$i][0][0][0]?></a>
					<ul id="m_gnb_2_<?=$i?>" class="m_gnb_2">
						<?php
						for($j=1; $j<=count($mMenu[$i]) - 1; $j++)
						{
						?>
							<li <? if($d1n == $i && $d2n == $j){ echo 'class="active"'; } ?>><a href="<?=$mLink[$i][$j][0][0]?>" <? if($mClick[$i][$j][0][0]){ echo $mClick[$i][$j][0][0]; } ?>><?=$mTitle[$i][$j][0][0]?></a></li>
							<?php
							if($j < count($mMenu[$i]) - 1)
							{
							?>
							<?php
							}
						}
						?>
					</ul>
					<?php
					}
					else
					{
						?>
						<a <? if($d1n == $i){ echo 'class="active"'; } ?> href="<?=$mLink[$i][0][0][0]?>" <? if($mClick[$i][0][0][0]){ echo $mClick[$i][0][0][0]; } ?>><?=$mTitle[$i][0][0][0]?></a>
						<?php
					}
					?>
				</li>
				<?php
				}
				?>
			</ul>
		</nav>

		<div class="member">
			<ul>
				<li class="member-search">
					<!-- <div id="header-search" class="search-area">
						<form name="form-search">
							<div class="search-box">
								<input type="search" title="검색어를 입력해 주세요." placeholder="검색어를 입력해 주세요." />
							</div>
							<button type="submit" id="btn-search" class="score5"><i class="fa-solid fa-magnifying-glass"></i></button>
						</form>
					</div> -->
					<a href="#none" class="score5"><i class="fa-solid fa-magnifying-glass"></i>검색</a>
				</li>
				<li class="member-stamp"><a href="/html/01_course/02.php" class="score5"><i class="fa-solid fa-stamp"></i>스탬프현황</a></li>
				<li class="member-mypage"><a href="/html/05_mypage/01.php" class="score5"><i class="fa-regular fa-user"></i>마이페이지</a></li>
			</ul>
		</div>
	</section>
</header>

<script>
// mobile gnb
$(document).ready(function(){
    $('#mobile-gnb').click(function(){
        $(this).toggleClass('is-active');
        $('nav').toggleClass('is-active');
    });
});
</script>
<!-- // 헤더 끝 -->

<? if ($main=="main") { ?>
<section id="container">
	<div id="content" class="main">
<? } else { ?>
<!-- body_wrap -->
<section id="container">
	<div id="content" class="sub">
<? } ?>