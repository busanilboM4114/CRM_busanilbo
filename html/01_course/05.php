<? $d1n=0; $d2n=0; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="container">
	<div class="title">
		<h2 class="score2 margin-t-10">예약하기</h2>
	</div>
</div>

<div class="container">
	<ul class="board-type-img-one reservation">
		<li>
			<div class="head">
				<div class="img">
					<img src="/img/01_course/img-gallery-box01.jpg" alt="">
				</div>
			</div>
			<div class="body">
				<div class="status">
					<span class="font-18 mountain">산&</span>
					<strong class="light-green weight-700 font-18">금정산</strong>
				</div>

				<h3 class="flex align-center">금정산, 계속 되는 등반 <span class=""></span></h3>
				<div class="info margin-t-10">
					<ul>
						<li class="black"><i class="fa-regular fa-calendar"></i> 2023. 09. 17(일) 오전 06:00</li>
						<li class="black"><i class="fa-regular fa-user"></i> 산악대장 홍길동</li>
					</ul>
				</div>
				<div class="price font-24 black">
					<strong class="weight-700">30,000</strong>원
				</div>
			</div>
			<div class="reserve-info bg-white-gray">
				<div class="people">
					<span class="font-18 margin-r-20">예약 인원</span>
					<button><i class="fa-solid fa-minus"></i></button>
					<span class="people-num"><input type="text" readonly value="1" /></span>
					<button><i class="fa-solid fa-plus"></i></button>
				</div>
				<div class="price-cal margin-t-30 font-18">
					<input type="text" readonly value="30,000" />원
				</div>
			</div>
		</li>

		<div class="reserve-content">
			<div class="inner-title">
				<h4>예약 상세정보</h4>
				<h3 class="score2 margin-t-10">별보러 가지 않을래</h3>
			</div>
			<div class="img-big margin-t-50">
				<img src="/img/01_course/img-reserve.png" alt="금정산 사진" />
			</div>
			<div class="info-txt margin-t-70 margin-b-40 font-18">
				<div class="info-txt-course">
					<h4>등반코스</h4>
					<div class="margin-t-20 grid course-txt">
						<div>
							간략한 등반 코스와 목표에 대한 내용들이 보여지는 공간입니다.
							<p class="margin-t-50 button">
								<a href="#none" class=""><i class="fa-solid fa-map-location-dot margin-r-10 light-gray"></i> 지도 보기</a>
							</p>
						</div>
						<ul class="grid-2">
							<li class="dot font-18"><strong>소요시간</strong> 3시간 30분</li>
							<li class="dot font-18"><strong>출발지</strong> 버스 정류장</li>
							<li class="dot font-18"><strong>등반거리</strong> 20km</li>
							<li class="dot font-18"><strong>목적지</strong> 정상</li>
							<li class="dot font-18"><strong>등반난이도</strong> 상</li>
						</ul>
					</div>
				</div>
				<div class="margin-t-70">
					<h4>등반정보</h4>
					<div class="margin-t-20 flex">
						기타 등반에 대한 정보와 안내사항들이 보여지는 공간입니다.
					</div>
				</div>
			</div>
		</div>
	</ul>

	<div class="margin-t-50 center button-more-center button-wide">
		<a href="06.php" class="bg-light-green font-18 weight-700 justify-center">예약하기</a>
	</div>

	<div class="gray-box margin-t-70">
		<div class="head">
			<h4 class="score7">예약안내</h4>
			<div class="bar-left bg-green"></div>
		</div>
		<div class="body">
			<ul>
				<li class="dot">운영정책에 대한 내용이 필요합니다.</li>
				<li class="dot">예약 절차에 대한 내용이 필요합니다.</li>
				<li class="dot">환불규정에 대한 내용이 필요합니다.</li>
				<li class="dot">기타 추가로 안내해야 할 사항이 있으면 추가 안내 진행합니다.</li>
			</ul>
		</div>
	</div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>