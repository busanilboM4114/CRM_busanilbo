<div class="m_gnb_wrap" style="display:none; z-index:9999;">
	<div class="m_gnb_header">
		<div class="m_logo"><a href="<?=$mLink[0][0][0][0]?>"><img src="/img/layout/header_logo_m.png" alt="" class="img-responsive mdpBlock" /></a></div>
		<div class="close_btn"><a href="#none" onclick="m_gnb_close(); return false;"><img src="/img/layout/m_gnb_btn.png" alt="close" style="width:25px;"/></a></div>
	</div>
	<div class="menu_wrap re w_100p dpt" style="overflow:auto;">
		<div class="dptc vam">
			<ul>
				<?php
				for($i=1; $i<5; $i++)
				{
				?>
				<li>
					<?php
					if(count($mMenu[$i]) >= 2)
					{
					?>
					<a href="<?=$mLink[$i][0][0][0]?>" class="m_gnb_1depth montserrat m_gnb1_<?=$i?> <? if($d1n == $i){ echo 'active'; } ?>"><?=$mTitle[$i][0][0][0]?></a>
					<ul id="m_gnb_2_<?=$i?>" class="m_gnb_2">
						<?php
						for($j=1; $j<=count($mMenu[$i]) - 1; $j++)
						{
							?>
							<li <? if($d1n == $i && $d2n == $j){ echo 'class="active"'; } ?>><a href="<?=$mLink[$i][$j][0][0]?>" <? if($mClick[$i][$j][0][0]){ echo $mClick[$i][$j][0][0]; } ?>><?=$mTitle[$i][$j][0][0]?></a></li>
							<?php
							if($j < count($mMenu[$i]) - 1)
							{
							?>
							<li class="mglr_10">|</li>
							<?php
							}
						}
						?>
					</ul>
					<?php
					}
					else
					{
						?>
						<a <? if($d1n == $i){ echo 'class="active"'; } ?> href="<?=$mLink[$i][0][0][0]?>"><?=$mTitle[$i][0][0][0]?></a>
						<?php
					}
					?>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>

<script>
function m_gnb_open()
{
	$('.m_gnb_wrap').css('display', 'block');
	$('html, body').css('overflow', 'hidden');
}
function m_gnb_close()
{
	$('.m_gnb_wrap').css('display', 'none');
	$('html, body').css('overflow', 'auto');
}
var open_gnb;
function m_gnb_view(idx)
{
	$('.m_gnb_2').css('display', 'none');
	$('.m_gnb_arrow').attr('src', '/img/layout/m_menu_down.png');
	if (open_gnb == idx)
	{
		$('.m_gnb1_'+idx).removeClass('active');
		open_gnb = '';
	}
	else
	{
		$('.m_gnb_1depth').removeClass('active');
		$('#m_gnb_2_'+idx).css('display', 'block');
		$('#m_gnb'+idx+'_arrow').attr('src', '/img/layout/m_menu_up.png');
		$('.m_gnb1_'+idx).addClass('active');
		open_gnb = idx;
	}
}

$(document).ready(function(){
//	$('.menu_wrap').css('height', window.innerHeight - 350);
	$('.menu_wrap').css('height', $(window).innerHeight() - 44);
});
$(window).resize(function(){
//	$('.menu_wrap').css('height', window.innerHeight - 350);
	$('.menu_wrap').css('height', $(window).innerHeight() - 44);
});
</script>