<?php
if(MobileCheck() != 'Computer')
{
?>
<style>
 .gnb_sub {overflow:hidden;}
</style>

<script>
var opened_id;
function open_gnb(id){
	$('#gnb2m'+id).stop().animate({height:'0'},{duration:400, easing: 'easeInSine'});
	if (opened_id != id)
	{
		if (window.innerWidth < 992)
		{
			var li_height = 40*this_next.children('li').length;
		}
		else
		{
			var li_height = 45*this_next.children('li').length;
		}
		$('#gnb2m'+id).stop().animate({height:li_height},{duration:400, easing: 'easeInSine'});
		opened_id = id;
	}
}
</script>
<?php
}
else
{
?>

<script>
$('.open_gnb').on('mouseover', function(){
	var this_next = $(this).find('ul');
	if (window.innerWidth < 992)
	{
		var li_height = 40*this_next.children('li').length;
	}
	else
	{
		var li_height = 45*this_next.children('li').length;
	}
	this_next.stop().animate({height:li_height},{duration:400, easing: 'easeInSine'});
	$('#head').addClass('hovered_header');
});
$('.open_gnb').on('mouseleave', function(){
	var this_next = $(this).find('ul');
	this_next.stop().animate({height:0},{duration:400, easing: 'easeInSine'});
	$('#head').removeClass('hovered_header');
});
</script>
<?php
}
?>
<!-- Header -->
<script type="text/javascript">initTopMenu(<?=$d1n?>,<?=$d2n?>,<?=$d3n?>);</script><noscript><p>JavaScript</p></noscript>