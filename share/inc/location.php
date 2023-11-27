<div id="location_pc">
	<div class="location">
		<div class="position_wrap">
			<h1 class="fc_white tac fs70 fwl ls_7"><?=$mTitle[$d1n][$d2n][0][0]?></h1>
			<? if($page_message) { ?><p class="fc_white fs24 tac"><?=$page_message?></p><? } ?>
			<div class="loc_menu container tac">
				<div class="loc_title">
					<div class="fs16"><span class=""><a href="<?=$mLink[0][0][0][0]?>">HOME</a></span> <span class="space fc_white">·</span> <span class=""><?=$mMenu[$d1n][0][0][0]?></span>
						<?if($d2n){?>  <span class="space fc_white">·</span> <span class="loc_cont"><?=$mMenu[$d1n][$d2n][0][0]?></span> <? } ?>
						<?if($d3n){?>  <span class="space fc_white">·</span> <span class="loc_cont"><?=$mMenu[$d1n][$d2n][$d3n][0]?></span> <? } ?>
						<?if($d4n){?>  <span class="space fc_white">·</span> <span class="loc_cont"><?=$mMenu[$d1n][$d2n][$d3n][$d4n]?></span> <? } ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="ab" style="bottom:20px; left:50%; transform:translateX(-50%);">
			<a href="#none" onclick="scroll_down(); return false;"><img src="/img/layout/arrow_down.png" alt="" /></a>
		</div>
	</div>
</div>
<style>
	#location_pc .location {background:#666 url(/img/00_main/sub<?=$d1n?>_visual.jpg) center center no-repeat; background-size:cover; background-attachment:fixed;}
	@media(max-width:991px)
	{
		#location_pc .location {background:#666 url(/img/00_main/sub<?=$d1n?>_visual_m.jpg) center center no-repeat; background-size:cover; background-attachment:scroll;}
	}
</style>
<script>
	$(document).ready(function(){
		$('.location').css('height', window.innerHeight);
	});
	$(window).resize(function(){
		$('.location').css('height', window.innerHeight);
	})
	function scroll_down()
	{
		$('html, body').stop().animate({'scrollTop': $('.content').offset().top}, {queue:false, duration:700});
	}
</script>