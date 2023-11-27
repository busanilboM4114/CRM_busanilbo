$(window).load(function(){
	$('.has_scroll_x').mCustomScrollbar({
		theme:'dark',
		autoHideScrollbar:false,
		axis:'x'
	});
	$('.has_scroll').mCustomScrollbar({
		theme:'dark',
		axis:'y',
		autoHideScrollbar:false
	});
	$('.has_scroll_xy').mCustomScrollbar({
		theme:'dark',
		autoHideScrollbar:false,
		axis:'xy',
		scrollTo:0
	});
	setTimeout(function(){
		$('.has_scroll_xy').mCustomScrollbar('scrollTo', 'top', {scrollInertia:0});
	}, 10);
});

$(window).scroll(function(){
	if ($(window).scrollTop() > $('body').height() - $('footer').outerHeight() - $('.footer_link').outerHeight() - $('.footer_another').outerHeight() - window.innerHeight)
	{
		$('.top_button').removeClass('fixed');
	}
	else
	{
		$('.top_button').addClass('fixed');
	}
});
// GENERAL SETTING

$(document).ready(function(){
	if (window.innerWidth > 767)
	{
		setTimeout(function(){
			$('.h_script').css('height', $('.h_script_target').outerHeight());
		}, 500);
	}
	else
	{
		$('.h_script').css('height', 'auto');
	}
	setTimeout(function(){
		$('.h_script_thumb').css('height', $('.h_script_thumb_target').outerHeight());
		for (i=1; i<=30; i++)
		{
			$('.h_script_thumb'+i).css('height', $('.h_script_thumb_target'+i).outerHeight());
		}
	}, 0);
	setTimeout(function(){
		for (i=1; i<=30; i++)
		{
			if (window.innerWidth > 767)
			{
				$('.h_script'+i).css('height', $('.h_script_target'+i).outerHeight());
			}
			else
			{
				$('.h_script'+i).css('height', 'auto');
			}
		}
	}, 500);
});
$(window).resize(function(){
	$('.h_script_thumb').css('height', $('.h_script_thumb_target').outerHeight());
	for (i=1; i<=30; i++)
	{
		$('.h_script_thumb'+i).css('height', $('.h_script_thumb_target'+i).outerHeight());
	}
	if (window.innerWidth > 767)
	{
		$('.h_script').css('height', $('.h_script_target').outerHeight());
	}
	else
	{
		$('.h_script').css('height', 'auto');

	}
	for (i=1; i<=30; i++)
	{
		if (window.innerWidth > 767)
		{
			$('.h_script'+i).css('height', $('.h_script_target'+i).outerHeight());
		}
		else
		{
			$('.h_script'+i).css('height', 'auto');
		}
		
	}
});
$(window).on('load', function (){
	window.sr = ScrollReveal({
		reset: false,
		viewOffset: {bottom:50},
		interval:200,
		beforeReveal: function() {
			if (window.innerWidth > 767)
			{
				$('.h_script').css('height', $('.h_script_target').height());
			}
			else
			{
				$('.h_script').css('height', 'auto');
			}
		}
	});



	// 오버뷰 영역 animation지정
	var noanimate_top={
		origin:'top',
		duration:1000,
		mobile:true,
		distance:"50px",
		scale:1.0,
		easing:'ease-in-out'
	};


	// 밑에서 올라옴
	var noanimate={
		origin:'bottom',
		duration:1000,
		mobile:true,
		distance:"50px",
		scale:1.0,
		easing:'ease-in-out'
	};

	// 왼쪽 -> 오른쪽
	var noanimate_left={
		origin:'left',
		duration:1000,
		mobile:true,
		distance:"50px",
		scale:1.0,
		easing:'ease-in-out'
	};

	// 오른쪽 -> 왼쪽
	var noanimate_right={
		origin:'right',
		duration:1000,
		mobile:true,
		distance:"50px",
		scale:1.0,
		easing:'ease-in-out'
	};

	var noanimate_location={
		origin:'left',
		duration:1000,
		mobile:true,
		distance:"50px",
		scale:1.0,
		easing:'ease-in-out'
	};

	var noanimate_list_1={
	origin:'bottom',
	duration:1000,
	mobile:true,
	distance:"100px",
	scale:1.0,
	easing:'ease-in-out'

	};

	var noanimate_list_2={
	origin:'bottom',
	duration:1300,
	mobile:true,
	distance:"100px",
	scale:1.0,
	easing:'ease-in-out'

	};

	var noanimate_list_3={
	origin:'bottom',
	duration:1600,
	mobile:true,
	distance:"100px",
	scale:1.0,
	easing:'ease-in-out'

	};

		if (window.innerWidth > 767)
		{

		// 스크립트 삽입.
		// sr.reveal('클래스명', 방향, 애니메이션 딜레이)
		/*나머지 서브*/
		sr.reveal('.scrollon_location_0', noanimate_location, 300);
		sr.reveal('.scrollon_location_1', noanimate_location, 300);
		sr.reveal('.scrollon_location_2', noanimate_location, 300);

		sr.reveal('.scrollon_top_0', noanimate_top, 100);
		sr.reveal('.scrollon_top_1', noanimate_top, 100);
		sr.reveal('.scrollon_top_2', noanimate_top, 100);
		sr.reveal('.scrollon_top_3', noanimate_top, 100);
		sr.reveal('.scrollon_top_4', noanimate_top, 100);
		sr.reveal('.scrollon_top_5', noanimate_top, 100);
		sr.reveal('.scrollon_top_6', noanimate_top, 100);

		sr.reveal('.scrollon_bottom_0', noanimate, 300);
		sr.reveal('.scrollon_bottom_1', noanimate, 100);
		sr.reveal('.scrollon_bottom_2', noanimate, 100);
		sr.reveal('.scrollon_bottom_3', noanimate, 100);
		sr.reveal('.scrollon_bottom_4', noanimate, 100);
		sr.reveal('.scrollon_bottom_5', noanimate, 100);
		sr.reveal('.scrollon_bottom_6', noanimate, 100);
		sr.reveal('.scrollon_bottom_7', noanimate, 100);
		sr.reveal('.scrollon_bottom_8', noanimate, 100);
		sr.reveal('.scrollon_bottom_9', noanimate, 100);
		sr.reveal('.scrollon_bottom_10', noanimate, 100);
		sr.reveal('.scrollon_bottom_11', noanimate, 100);
		sr.reveal('.scrollon_bottom_12', noanimate, 100);
		sr.reveal('.scrollon_bottom_13', noanimate, 100);
		sr.reveal('.scrollon_bottom_14', noanimate, 100);

		sr.reveal('.scrollon_left_0', noanimate_left, 100);
		sr.reveal('.scrollon_left_1', noanimate_left, 100);
		sr.reveal('.scrollon_left_2', noanimate_left, 100);
		sr.reveal('.scrollon_left_3', noanimate_left, 100);
		sr.reveal('.scrollon_left_4', noanimate_left, 100);
		sr.reveal('.scrollon_left_5', noanimate_left, 100);
		sr.reveal('.scrollon_left_6', noanimate_left, 100);

		sr.reveal('.scrollon_right_0', noanimate_right, 100);
		sr.reveal('.scrollon_right_1', noanimate_right, 100);
		sr.reveal('.scrollon_right_2', noanimate_right, 100);
		sr.reveal('.scrollon_right_3', noanimate_right, 100);
		sr.reveal('.scrollon_right_4', noanimate_right, 100);

		sr.reveal('.scrollon_list_0', noanimate_list_1, 100);
		sr.reveal('.scrollon_list_1', noanimate_list_2, 100);
		sr.reveal('.scrollon_list_2', noanimate_list_3, 100);
		sr.reveal('.scrollon_list_3', noanimate_list_1, 100);
		sr.reveal('.scrollon_list_4', noanimate_list_2, 100);
		sr.reveal('.scrollon_list_5', noanimate_list_3, 100);
		sr.reveal('.scrollon_list_6', noanimate_list_1, 100);
		sr.reveal('.scrollon_list_7', noanimate_list_2, 100);
		sr.reveal('.scrollon_list_8', noanimate_list_3, 100);
		}
	});
	$('.bx_wrap').bxSlider({
		mode:'horizontal',
		speed:500,
		auto:true,
		stopAutoOnClick:true,
		touchEnabled:false
	});