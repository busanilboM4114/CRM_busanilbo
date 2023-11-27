<? $d1n=5; $d2n=2; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="container find">
	<div class="title">
		<h4>아이디/비밀번호 찾기</h4>
	</div>
	<div class="font-24 score2 find-copy">
		회원가입 시 등록하신 이메일 주소를 입력해 주세요.<br />
		해당 이메일로 아이디 정보와 임시 발급 비밀번호를 전송해 드립니다.
	</div>
	<div class="margin-t-40">
		<div class="login-box center">
			<div class="margin-t-15 input-box">
				<input type="email" placeholder="이메일 주소를 입력해 주세요." />
			</div>
			<div class="margin-t-40">
				<input type="submit" value="메일 전송" />
			</div>
		</div>
	</div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>
