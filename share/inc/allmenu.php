<div id="allmenuwrapper">
	<nav id="allmenuwrap">
		<div id="allmenu" class="container">
			<ul id="allmenuinner" class="allmenuinner">
				<li class="row"><a class="alltitle col-md-2 col-sm-12" href='<?=$mLink[1][0][0][0]?>'><?=$mTitle[1][0][0][0]?></a>
					<div class="col-md-10 col-sm-12">
						<ul class="row">
							<li class="col-md-2 col-sm-3"><?=$mMenu[1][1][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[1][2][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[1][3][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[1][4][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[1][5][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[1][6][0][0]?></li>
							<div class="clear"></div>
						</ul>
					</div>
				</li>

				<li class="row"><a class="alltitle col-md-2 col-sm-12" href='<?=$mLink[2][0][0][0]?>'><?=$mTitle[2][0][0][0]?></a>
					<div class="col-md-10 col-sm-12">
						<ul class="row">
							<li class="col-md-2 col-sm-3"><?=$mMenu[2][1][0][0]?></li>
							<div class="clear"></div>
						</ul>
					</div>
				</li>

				<li class="row"><a class="alltitle col-md-2 col-sm-12" href='<?=$mLink[3][0][0][0]?>'><?=$mTitle[3][0][0][0]?></a>
					<div class="col-md-10 col-sm-12">
						<ul class="row">
							<li class="col-md-2 col-sm-3"><?=$mMenu[3][1][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[3][2][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[3][3][0][0]?></li>
							<div class="clear"></div>
						</ul>
					</div>
				</li>

				<li class="row"><a class="alltitle col-md-2 col-sm-12" href='<?=$mLink[4][0][0][0]?>'><?=$mTitle[4][0][0][0]?></a>
					<div class="col-md-10 col-sm-12">
						<ul class="row">
							<li class="col-md-2 col-sm-3"><?=$mMenu[4][1][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[4][2][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[4][3][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[4][4][0][0]?></li>
							<div class="clear"></div>
						</ul>
					</div>
				</li>

				<li class="row"><a class="alltitle col-md-2 col-sm-12" href='<?=$mLink[5][0][0][0]?>'><?=$mTitle[5][0][0][0]?></a>
					<div class="col-md-10 col-sm-12">
						<ul class="row">
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][1][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][2][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][3][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][4][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][5][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][6][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][7][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][8][0][0]?></li>
							<li class="col-md-2 col-sm-3"><?=$mMenu[5][9][0][0]?></li>
							<div class="clear"></div>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>
<!-- Header -->

<script type="text/javascript">

$('#allmenu').click(function() {
	$("#allmenuwrap").animate({
		height:'toggle'
		},300);
	if($("#btn_allmenu").attr('src')=='../../img/00_main/btn_header_close.png')
	{
		$("#btn_allmenu").attr('src', '../../img/00_main/btn_header_all.png');
		menu_bg_animate(0);
	}
	else
	{
		$("#btn_allmenu").attr('src', '../../img/00_main/btn_header_close.png');
		$("#allmenuwrap").css('display','block');
		menu_bg_animate(1);

	}
});

</script>