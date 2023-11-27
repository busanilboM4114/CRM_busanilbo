<? $d1n=0; $d2n=0; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="container">
	<div class="title">
		<div class="tab center">
			<ul class="inline-block">
				<li class="active"><a class="score7 font-24" href="/html/02_funtalk/01.php">코스후기</a></li>
				<li><a class="score7 font-24" href="/html/02_funtalk/02.php">스템프 인증</a></li>
				<li><a class="score7 font-24" href="/html/02_funtalk/03.php">갤러리</a></li>
			</ul>
		</div>
	</div>

	<div class="board board-img">
		<div class="board-top-area relative">
			<div class="sns-area">
				<ul>
					<li><a href="#none" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
					<li><a href="#none" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
					<li><a href="#none" target="_blank"><img src="/img/layout/icon-blog.svg" alt="Naver Blog" width="24" /></li>
					<li><a href="#none" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
				</ul>
			</div>
			<div id="board-search" class="search-area">
				<form name="form-search">
					<div class="search-box">
						<input type="search" />
						<button type="submit" id="btn-search" class="score5"><i class="fa-solid fa-magnifying-glass"></i><span class="none">검색</span></button>
					</div>
				</form>
			</div>
		</div>

		<ul class="board-type-img-one">
            <li>
				<div class="head">
					<div class="img">
						<img src="/img/02_funtalk/img-epilogue01.jpg" alt="">
					</div>
				</div>
				<div class="body">
					<h4 class="flex align-center"><span class="category bg-green white font-14 center weight-400 margin-r-10">금정산</span>금정산 일출 코스 등반을 다녀와서</h4>
					<div class="info margin-t-10">
						<ul>
							<li class="black"><i class="fa-regular fa-calendar"></i> 2023. 09. 17</li>
							<li class="black"><i class="fa-regular fa-user"></i> 작성자명</li>
						</ul>
					</div>
					<p class="margin-t-30"><a class="weight-700 black font-24" href="#">후기보기 <i class="fa-solid fa-arrow-right"></i></a></p>
				</div>
            </li>
            
            <li>
				<div class="head">
					<div class="img">
						<img src="/img/02_funtalk/img-epilogue02.jpg" alt="">
					</div>
				</div>
				<div class="body">
					<h4 class="flex align-center"><span class="category bg-green white font-14 center weight-400 margin-r-10">금정산</span>금정산 일출 코스 등반을 다녀와서</h4>
					<div class="info margin-t-10">
						<ul>
							<li class="black"><i class="fa-regular fa-calendar"></i> 2023. 09. 17</li>
							<li class="black"><i class="fa-regular fa-user"></i> 작성자명</li>
						</ul>
					</div>
					<p class="margin-t-30"><a class="weight-700 black font-24" href="#">후기보기 <i class="fa-solid fa-arrow-right"></i></a></p>
				</div>
            </li>

            <li>
				<div class="head">
					<div class="img">
						<img src="/img/02_funtalk/img-epilogue03.jpg" alt="">
					</div>
				</div>
				<div class="body">
					<h4 class="flex align-center"><span class="category bg-green white font-14 center weight-400 margin-r-10">금정산</span>금정산 일출 코스 등반을 다녀와서</h4>
					<div class="info margin-t-10">
						<ul>
							<li class="black"><i class="fa-regular fa-calendar"></i> 2023. 09. 17</li>
							<li class="black"><i class="fa-regular fa-user"></i> 작성자명</li>
						</ul>
					</div>
					<p class="margin-t-30"><a class="weight-700 black font-24" href="#">후기보기 <i class="fa-solid fa-arrow-right"></i></a></p>
				</div>
            </li>
        </ul>

		<div class="margin-t-50 center button-more">
			<a href="#none">더보기 <i class="fa-solid fa-plus"></i></a>
		</div>
	</div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>
