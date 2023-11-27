'use strict';
var KS = KS || {};
(function(win, $){
	KS.smoothscroll = {
		passive : function(){
			var supportsPassive = false;
			try {
			  document.addEventListener("test", null, { get passive() { supportsPassive = true }});
			} catch(e) {}

			return supportsPassive;
		},
		init : function(){

			if($('html').hasClass('mobile') || $('html').hasClass('mac')) return;

			var $window = $(window);
			var scrollTime = 1;
			var distance_offset = 3.5;
			var scrollDistance = $window.height() / distance_offset;

			if(this.passive()){
				window.addEventListener("wheel",this.scrolling,{passive: false});
			}else{
				$window.on("mousewheel DOMMouseScroll", this.scrolling);
			}

		},
		destroy : function(){

			if(this.passive()){
				window.removeEventListener("wheel",this.scrolling);
			}else{
			   $(window).off("mousewheel DOMMouseScroll", this.scrolling);
			}
			TweenMax.killChildTweensOf($(window),{scrollTo:true});

		},
		scrolling : function(event){

			event.preventDefault();

			var $window = $(window);
			var scrollTime = 1;
			var distance_offset = 3.5;
			var scrollDistance = $window.height() / distance_offset;
			var delta = 0;

			if(KS.smoothscroll.passive()){
				delta = event.wheelDelta/120 || -event.deltaY/3;
			}else{
				if(typeof event.originalEvent.deltaY != "undefined"){
					delta = -event.originalEvent.deltaY/120;
				}else{
					delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
				}
			}

			var scrollTop = $window.scrollTop();
			var finalScroll = scrollTop - parseInt(delta*scrollDistance);

			TweenMax.to($window, scrollTime, {
				scrollTo : { y: finalScroll, autoKill:true },
				ease: Power3.easeOut,
				overwrite: 5
			});


		}

	};

})(window, jQuery);

KS.smoothscroll.init();

$('html, body').bind('mousewheel keypress keyup', function(event){
	if (event.ctrlKey)
	{
		KS.smoothscroll.destroy();
	}
	else
	{
		KS.smoothscroll.init();
	}
});