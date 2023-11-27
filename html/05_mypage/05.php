<? $d1n=5; $d2n=5; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="container">
	<div class="title">
		<div class="tab center">
			<ul class="flex">
				<li><a class="score7 font-18" href="/html/05_mypage/03.php">기본정보 / 구독관리</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/04.php">스템프 정보</a></li>
				<li class="active"><a class="score7 font-18" href="/html/05_mypage/05.php">해피존 이력</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/06.php">포인트 정보</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/07.php">예약정보</a></li>
				<li><a class="score7 font-18" href="/html/05_mypage/08.php">개인이력</a></li>
			</ul>
		</div>
	</div>

	<div class="title center">
		<h3 class="score2">나의 최근 당첨내역을 확인하세요</h3>
		<p class="margin-t-20">나의 최근 당첨내역은 5개까지 조회할 수 있습니다.</p>
	</div>

	<div class="my-happy-title">
		<div class="grid align-center">
			<div class="head">
				<div class="img">
					<img src="/img/05_mypage/happy-img.png" alt="" />
				</div>
			</div>
			<div class="body">
				<div class="left">
					<h4 class="flex align-center"><span class="status weight-400 white font-14 margin-r-20">최근 당첨 내역</span> 우리의 청춘 <div class="font-18 black margin-l-20"><i class="fa-regular fa-calendar"></i> 2023. 09. 17(일) 오전 06:00</div></h4>
				</div>
				<div class="board-table margin-t-30">
					<table>
						<tbody>
							<tr>
								<td class="title2">
									<p class="tac font-14">이벤트명</p>
								</td>
								<td class="date">
									<p class="font-14 gray">응모일자</p>
								</td>
								<td class="date">
									<p class="font-14 gray">당첨자발표</p>
								</td>
								<td class="name">
									<p class="font-14 gray">쿠폰번호</p>
								</td>
								<td class="name">
									<p class="font-14 gray">응모결과</p>
								</td>
							</tr>
							<tr>
								<td class="title2">
									<a href="view.php">
										<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
									</a>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="name">
									<p class="font-14 gray">GRDE123</p>
								</td>
								<td class="name">
									<p class="font-14 gray"><img src="/img/05_mypage/happy-o.png" alt="" /></p>
								</td>
							</tr>
							<tr>
								<td class="title2">
									<a href="view.php">
										<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
									</a>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="name">
									<p class="font-14 gray">GRDE123</p>
								</td>
								<td class="name">
									<p class="font-14 gray"><img src="/img/05_mypage/happy-o.png" alt="" /></p>
								</td>
							</tr>
							<tr>
								<td class="title2">
									<a href="view.php">
										<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
									</a>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="name">
									<p class="font-14 gray">GRDE123</p>
								</td>
								<td class="name">
									<p class="font-14 gray"><img src="/img/05_mypage/happy-o.png" alt="" /></p>
								</td>
							</tr>
							<tr>
								<td class="title2">
									<a href="view.php">
										<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
									</a>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="name">
									<p class="font-14 gray">GRDE123</p>
								</td>
								<td class="name">
									<p class="font-14 gray"><img src="/img/05_mypage/happy-o.png" alt="" /></p>
								</td>
							</tr>
							<tr>
								<td class="title2">
									<a href="view.php">
										<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
									</a>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="date">
									<p class="font-14 gray">2023.10.23</p>
								</td>
								<td class="name">
									<p class="font-14 gray">GRDE123</p>
								</td>
								<td class="name">
									<p class="font-14 gray"><img src="/img/05_mypage/happy-o.png" alt="" /></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="margin-t-50 center">
		<h3 class="score2">내가 응모한 이벤트를 확인 하세요.</h3>
		<div class="search-area margin-t-30 justify-center flex">
			<form name="form-search">
				<div class="search-box">
					<input type="search" />
					<button type="submit" id="btn-search" class="score5"><i class="fa-solid fa-magnifying-glass"></i><span class="none">검색</span></button>
				</div>
			</form>
		</div>
	</div>

	<div class="board-table margin-t-30">
		<table>
			<tbody>
				<tr>
					<td class="title2">
						<p class="tac font-14">이벤트명</p>
					</td>
					<td class="date">
						<p class="font-14 gray">응모일자</p>
					</td>
					<td class="date">
						<p class="font-14 gray">당첨자발표</p>
					</td>
					<td class="name">
						<p class="font-14 gray">쿠폰번호</p>
					</td>
					<td class="name">
						<p class="font-14 gray">응모결과</p>
					</td>
				</tr>
				<tr>
					<td class="title2">
						<a href="view.php">
							<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
						</a>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="name">
						<p class="font-14 gray">GRDE123</p>
					</td>
					<td class="name">
						<p class="font-14 gray"><img src="/img/05_mypage/happy-o.png" alt="" /></p>
					</td>
				</tr>
				<tr>
					<td class="title2">
						<a href="view.php">
							<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
						</a>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="name">
						<p class="font-14 gray">GRDE123</p>
					</td>
					<td class="name">
						<p class="font-14 gray"><img src="/img/05_mypage/happy-o.png" alt="" /></p>
					</td>
				</tr>
				<tr>
					<td class="title2">
						<a href="view.php">
							<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
						</a>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="name">
						<p class="font-14 gray">GRDE123</p>
					</td>
					<td class="name">
						<p class="font-14 gray"><img src="/img/05_mypage/happy-x.png" alt="" /></p>
					</td>
				</tr>
				<tr>
					<td class="title2">
						<a href="view.php">
							<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
						</a>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="name">
						<p class="font-14 gray">GRDE123</p>
					</td>
					<td class="name">
						<p class="font-14 gray"><img src="/img/05_mypage/happy-o.png" alt="" /></p>
					</td>
				</tr>
				<tr>
					<td class="title2">
						<a href="view.php">
							<p class="tal font-14">FUN BUSAN 스템프 인증합니다.</p>
						</a>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="date">
						<p class="font-14 gray">2023.10.23</p>
					</td>
					<td class="name">
						<p class="font-14 gray">GRDE123</p>
					</td>
					<td class="name">
						<p class="font-14 gray"><img src="/img/05_mypage/happy-x.png" alt="" /></p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="margin-t-50">
		<div class="pagination">
			<ul class="pagenum">
				<li class="button2"><a href="#none" onclick="return false;" class="board_button"><i class="fa-solid fa-chevron-left"></i></a></li><li><a href="#none" onclick="return false;" class="page-numbers current">1</a></li><li><a href="#none" title="2페이지로 이동합니다." class="page-numbers">2</a></li><li><a href="#none" title="3페이지로 이동합니다." class="page-numbers">3</a></li><li class="button3"><a href="#none" class="board_button"><i class="fa-solid fa-chevron-right"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>
