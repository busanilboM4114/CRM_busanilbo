<? $d1n=5; $d2n=1; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="login">
	<div class="container">
		<div class="login-box center">
			<h4>로그인</h4>
			<div class="margin-t-30 input-box">
				<label><i class="fa-regular fa-user light-gray"></i></label>
				<input type="id" />
			</div>
			<div class="margin-t-15 input-box">
				<label><i class="fa-solid fa-lock"></i></label>
				<input type="password" />
			</div>
			<div class="margin-t-15">
				<input type="submit" value="로그인" />
			</div>
			<div class="margin-t-10 flex justify-between align-baseline">
				<div>
					<input type="checkbox" id="login-save" />
					<label for="login-save">자동로그인</label>
				</div>
				<div>
					<a href="02.php" class="gray">아이디/비밀번호 찾기</a>
				</div>
			</div>
			<div class="margin-t-50 login-sns">
				<div class="relative">또는</div>
			</div>
			<div class="margin-t-15 login-sns-icon">
				<ul class="flex justify-center gap-20">
					<li><a href="#none"><img src="/img/05_mypage/icon-naver.png" alt="" /></a></li>
					<li><a href="#none"><img src="/img/05_mypage/icon-kakao.png" alt="" /></a></li>
				</ul>
				<div class="margin-t-30">
					아직 부산 닷컴 회원이 아니신가요?
					<a href="09.php" class="black"><u>회원가입</u></a>
				</div>
			</div>
		</div>
	</div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>
