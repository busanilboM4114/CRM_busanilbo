<? $d1n=5; $d2n=3; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="container">
	<div class="title">
		<div class="tab center">
			<ul class="flex">
				<li class="active"><a class="score7 font-18" href="/html/05_mypage/03.php">기본정보 / 구독관리</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/04.php">스템프 정보</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/05.php">해피존 이력</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/06.php">포인트 정보</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/07.php">예약정보</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/08.php">개인이력</a></li>
			</ul>
		</div>
	</div>

	<div class="subscribe join">
		<div class="title center">
			<h4>기본정보 / 구독관리</h4>
			<h3 class="score2 margin-t-10">나의 정보 확인하기</h3>
		</div>
		<div class="join-form">
			<!-- 회원정보 -->
			<h4>회원정보</h4>
			<div id="customer" class="margin-t-30 agree">
				<div class="join-info">
					<div class="grid join-row">
						<div class="h_script4">
							<div class="">
								<h5>이름 <span>*</span></h5>
							</div>
						</div>
						<div class="join-input-box">
							<div class="input-box read-only">
								부산일보
							</div>
						</div>
					</div>

					<div class="grid join-row">
						<div class="h_script1">
							<div class="">
								<h5>아이디 <span>*</span></h5>
							</div>
						</div>
						<div class="join-input-box">
							<div class="input-box read-only">
								busanilbo
							</div>
						</div>
					</div>

					<div class="grid join-row">
						<div class="h_script2">
							<div class="">
								<h5>비밀번호 <span>*</span></h5>
							</div>
						</div>
						<div class="join-input-box">
							<div class="input-box h_script_target2">
								<input type="password" id="password" name="password" value="" title="비밀번호" placeholder="8~20자의 영문 대소문자, 숫자, 특수문자를 조합." class="input no_button required" />
							</div>
						</div>
					</div>

					<div class="grid join-row">
						<div class="h_script3">
							<h5>비밀번호 확인 <span>*</span></h5>
						</div>
						<div class="join-input-box">
							<div class="input-box h_script_target3">
								<input type="password" id="password2" name="password2" value="" title="비밀번호확인" placeholder="8~20자의 영문 대소문자, 숫자, 특수문자를 조합." class="input no_button required" />
							</div>
						</div>
					</div>

					<div class="grid join-row">
						<div class="h_script4">
							<h5>이메일 <span>*</span></h5>
						</div>
						<div class="join-input-box grid">
							<div class="input-box">
								<div class="email-wrap flex align-center">
									<input type="text" id="email1" name="email1" class="email input required" />
									<div class="inline-flex">@</div>
									<input type="text" id="email2" name="email2" class="email input required" />
								</div>
							</div>
							<div class="input-box">
								<button type="button" class="this_button2 hand">발송</button>
							</div>
						</div>
					</div>

					<div class="grid join-row">
						<div class="h_script4">
							<div class="">
								<h5>이메일 인증번호<span>*</span></h5>
							</div>
						</div>
						<div class="join-input-box grid">
							<div class="input-box">
								<div class="email-wrap flex align-center">
									<input type="text" id="email1" name="email1" class="email input required" />
								</div>
							</div>
							<div class="input-box">
								<button type="button" class="this_button2 hand">이메일 인증</button>
							</div>
							</div>
						</div>
					</div>

					<div class="grid join-row">
						<div class="h_script4">
							<div class="">
								<h5>휴대폰 <span>*</span></h5>
							</div>
						</div>
						<div class="join-input-box grid">
							<div class="input-box">
								<input type="text" id="mobile" name="mobile" value="" title="휴대폰" placeholder="" class="input no_button" />
							</div>
							<div class="">
								<button type="button" class="this_button2 hand">발송하기</button>
							</div>
						</div>
					</div>

					<div class="grid join-row">
						<div class="h_script4">
							<div class="">
								<h5>휴대폰 인증번호 <span>*</span></h5>
							</div>
						</div>
						<div class="join-input-box grid">
							<div class="input-box">
								<input type="text" id="mobile" name="mobile" value="" title="휴대폰" placeholder="" class="input no_button" readonly="readonly" />
							</div>
							<div class="">
								<button type="button" class="this_button2 hand">실명인증</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 뉴스레터 -->
			<h4 class="margin-t-100">뉴스레터</h4>
			<div id="newsletter" class="newsletter margin-t-30">
				<ul class="grid-4">
					<li>
						<div>
							<div><input type="checkbox" id="news1" class="mem2" /><label for="news1"></label></div>
							<div class="bread margin-t-15">
								<h5 class="weight-700">브레드 <span>구독</span></h5>
							</div>
						</div>
						<div class="txt margin-t-10">
							부산일보 뉴스레터 ‘B-read’<br />
							매일 아침 찾아갑니다. 
						</div>
					</li>
					<li>
						<div>
							<div><input type="checkbox" id="news2" class="mem2" /><label for="news2"></label></div>
							<div class="weekend margin-t-15">
								<h5 class="weight-700">경건한 주말 <span>구독</span></h5>
							</div>
						</div>
						<div class="txt margin-t-10">
							부산일보 주말판 뉴스레터<br />
							콘텐츠를 풍부하게 만듭니다.
						</div>
					</li>
					<li>
						<div>
							<div><input type="checkbox" id="news3" class="mem2" /><label for="news3"></label></div>
							<div class="weeknjoy margin-t-15">
								<h5 class="weight-700">Week & Joy <span>구독</span></h5>
							</div>
						</div>
						<div class="txt margin-t-10">
							부산일보가 정성들여 만든 주말 특화 콘텐츠입니다.
						</div>
					</li>
					<li>
						<div>
							<div><input type="checkbox" id="news4" class="mem2" /><label for="news4"></label></div>
							<div class="newscook margin-t-15">
								<h5 class="weight-700">논설위원회 뉴스요리 <span>구독</span></h5>
							</div>
						</div>
						<div class="txt margin-t-10">
							논설위원들이 주간 뉴스의 큰 흐름만 골라서 요리합니다.
						</div>
					</li>
				</ul>
			</div>

			<!-- 프로모션 -->
			<h4 class="margin-t-100">프로모션</h4>
			<div id="promotion" class="newsletter margin-t-30">
				<ul class="grid-2">
					<li>
						<div class="flex justify-between align-center">
							<div><input type="checkbox" id="email" class="mem2" /><label for="email"></label></div>
							<div class="width-100">
								<h5 class="weight-700 justify-center">이메일</h5>
							</div>
						</div>
					</li>
					<li>
						<div class="flex justify-between align-center">
							<div><input type="checkbox" id="sms" class="mem2" /><label for="sms"></label></div>
							<div class="width-100">
								<h5 class="weight-700 justify-center">SMS</h5>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<!-- 약관 동의 -->
			<h4 class="margin-t-100">약관 동의</h4>
			<div class="agree margin-t-30">
				<ul>
					<li>
						<div class="acc row">
							<div class="Question"><input type="checkbox" id="agree1" class="mem2" /><label for="agree1"></label></div>
							<div class="Qtxt col-sm-11 col-xs-10">
								<h5>전체 약관 동의</h5>
							</div>
						</div>
						<div class="acc_cont row">
							<div class="Atxt col-sm-11 col-xs-10">
								전체동의는 필수 및 선택정보에 대한 동의도 포함되어 있으며, 개별적으로도 동의를 선택하실 수 있습니다. 선택항목에 대한 동의를 거부하는 경우에도 회원가입 서비스는 이용 가능합니다..
							</div>
						</div>
					</li>
					<li>
						<div class="acc row">
							<div class="Question"><input type="checkbox" id="agree2" class="mem2" /><label for="agree2"></label></div>
							<div class="Qtxt col-sm-11 col-xs-10">
								<h5><strong class="red">[필수]</strong> 회원가입 약관/개인정보처리 방침 안내</h5>
							</div>
						</div>
						<div class="acc_cont row">
							<div class="Atxt col-sm-11 col-xs-10">
								[필수] 회원가입 약관/개인정보처리 방침 안내
							</div>
						</div>
					</li>
					<li>
						<div class="acc row">
							<div class="Question"><input type="checkbox" id="agree3" class="mem2" /><label for="agree3"></label></div>
							<div class="Qtxt col-sm-11 col-xs-10">
								<h5><strong class="red">[필수]</strong> 맞춤형 기사 추천을 위한 정보수집 및 이용</h5>
							</div>
						</div>
						<div class="acc_cont row">
							<div class="Atxt col-sm-11 col-xs-10">
								[필수] 맞춤형 기사 추천을 위한 정보수집 및 이용
							</div>
						</div>
					</li>
					<li>
						<div class="acc row">
							<div class="Question"><input type="checkbox" id="agree4" class="mem2" /><label for="agree4"></label></div>
							<div class="Qtxt col-sm-11 col-xs-10">
								<h5>[선택] 뉴스레터 수신 동의</h5>
							</div>
						</div>
						<div class="acc_cont row">
							<div class="Atxt col-sm-11 col-xs-10">
								[선택] 뉴스레터 수신 동의
							</div>
						</div>
					</li>
					<li>
						<div class="acc row">
							<div class="Question"><input type="checkbox" id="agree5" class="mem2" /><label for="agree5"></label></div>
							<div class="Qtxt col-sm-11 col-xs-10">
								<h5>[선택] 프로모션 정보 수신 동의</h5>
							</div>
						</div>
						<div class="acc_cont row">
							<div class="Atxt col-sm-11 col-xs-10">
								[선택] 프로모션 정보 수신 동의
							</div>
						</div>
						
					</li>
				</ul>
			</div>

			<!-- 버튼 -->
			<div class="margin-t-50 button-border-wrap">
				<ul class="flex align-center justify-center">
					<li><a href="#none" class="gray bg-white-gray">뒤로</a></li>
					<li><input class="bg-black white" type="submit" value="완료" onclick="window.location.href = '09_3.php'" /></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>
