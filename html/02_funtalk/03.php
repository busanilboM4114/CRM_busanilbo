<? $d1n=0; $d2n=0; $d3n=0; $d4n=0; ?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/header.php'; ?>

<div class="container">
	<div class="title">
		<div class="tab center">
			<ul class="inline-block">
				<li><a class="score7 font-24" href="/html/02_funtalk/01.php">코스후기</a></li>
				<li><a class="score7 font-24" href="/html/02_funtalk/02.php">스템프 인증</a></li>
				<li class="active"><a class="score7 font-24" href="/html/02_funtalk/03.php">갤러리</a></li>
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

		<ul class="board-type-gallery-three">
            <li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery01.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>금강산 나들이</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>
            </li>
            
            <li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery02.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>욜로 갈맷길</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>                
            </li>

            <li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery03.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>남파랑길</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>                
            </li>
            
            <li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery04.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>광안리 앞바다</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>                
            </li>

			<li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery01.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>부산 아쿠아리움</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>
            </li>
            
            <li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery02.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>부산 엑스더스카이</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>                
            </li>

            <li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery03.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>스카이 워크</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>                
            </li>
            
            <li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery04.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>흰여울문화마을</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>                
            </li>

			<li>
                <a href="#">
                    <div class="head">
                        <div class="img">
                            <img src="/img/02_funtalk/img-gallery01.png" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h4>블루라인파크</h4>
                        <p>2023. 09. 07</p>
                    </div>
                </a>
            </li>
        </ul>

		<div class="margin-t-100">
			<div class="pagination">
				<ul class="pagenum">
					<li class="button2"><a href="#none" onclick="return false;" class="board_button"><i class="fa-solid fa-chevron-left"></i></a></li><li><a href="#none" onclick="return false;" class="page-numbers current">1</a></li><li><a href="?pagenum=1&amp;search_select=&amp;keyword=" title="2페이지로 이동합니다." class="page-numbers">2</a></li><li><a href="?pagenum=2&amp;search_select=&amp;keyword=" title="3페이지로 이동합니다." class="page-numbers">3</a></li><li class="button3"><a href="?pagenum=1&amp;search_select=&amp;keyword=" class="board_button"><i class="fa-solid fa-chevron-right"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/share/ui/footer.php'; ?>
