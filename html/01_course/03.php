<? $d1n=0; $d2n=0; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="container">
	<div class="title">
		<h2 class="score2 margin-t-10">인증하기 <span class="margin-l-20 score7 light-green font-36">장산</span></h2>
		<div class="button-more-right">
			<a class="font-18 bg-green" href="#none">더보기<i class="fa-solid fa-arrow-right"></i></a>
		</div>
	</div>
</div>

<div class="stamp bg-light-gray">
	<div class="container">
		<ul>
			<li class="active">금정산</li>
			<li class="active">백양산</li>
			<li>장산</li>
			<li>황령 금련산</li>
			<li>승학산</li>
			<li>구덕산</li>
			<li>천마산</li>
			<li>달음산</li>
			<li>연대봉</li>
			<li class="medal active">부산명산</li>
		</ul>
	</div>
</div>

<div class="container">
	<div class="right">
		<p class="margin-t-20 margin-b-30 dot right relative font-18 black inline-flex">모든 코스의 스탬프를 인증하면 뱃지를 획득할 수 있습니다.</p>
	</div>

	<div class="button-more-center button-large">
		<a class="font-24 bg-light-red" href="#none">스템프 인증<i class="fa-solid fa-arrow-right"></i></a>
	</div>

	<div class="margin-t-50 relative">
		<h4 class="score7">인증 이미지</h4>
		<p class="font-18 margin-t-5 gray">예쁘게 찍은 사진을 자랑해 보세요!</p>
		<div class="button-more-right">
			<a class="font-18 bg-green" href="#none">더보기<i class="fa-solid fa-arrow-right"></i></a>
		</div>
	</div>
	<div class="gray-box margin-t-20">
		<input type="file" />
	</div>

	<div class="margin-t-50">
		<h4 class="score7">간략 후기</h4>
		<p class="font-18 margin-t-5 gray">여러분이 느꼈던 점을 공유해 주세요!</p>
		<div class="textarea margin-t-20">
			<textarea>내용을 입력하세요.</textarea>
		</div>
	</div>
	<div class="gray-box margin-t-50">
		<div class="head">
			<h4 class="score7">안내</h4>
			<div class="bar-left bg-green"></div>
		</div>
		<div class="body">
			<ul>
				<li class="dot"><strong>인증 등록</strong>을 하시면 관리자 확인 후 정상 인증 처리 됩니다.</li>
				<li class="dot">비정상적인 방법을 통한 <strong>인증 등록</strong> 이 확인될 경우 인증이 취소 될 수 있습니다.</li>
			</ul>
		</div>
	</div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>