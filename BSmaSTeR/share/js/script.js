$( document ).ready(function() {
	$("li a", $("#LeftMenu")).click(function () { 
		//event.preventDefault();
		if ($(this).attr("href") != "#") {
			
		} else {
			if ($(this).parent().attr('level') == 1) {				
				if ($(this).parent().attr("class") == "on") {	
					$("li", $("#LeftMenu")).removeClass("on");
				}else {
					$("li", $("#LeftMenu")).removeClass("on");
					$(this).parent().addClass("on");
				}
				
			}
			
		}
	});

//Top notice start
    $.fn.rolling_up = function (opt) {
        opt = $.extend({
            b_width: 224,
            b_height: 18,
            display_count: 3,
            roll_speed: 5000,
            roll_pause: false
        }, opt || {});

        return this.each(function () {
            var th = $(this);
            var th_ul = th.find('ul');
            var th_li_length = th.find('ul li').length;

            th.css({ 'height': opt.b_height * opt.display_count });
            //            th.find('ul').css({ 'position': 'absolute', 'top': '0', 'left': '0', 'width': opt.b_width });
            //            th.find('ul li').css({ 'position': 'relative', 'width': opt.b_width, 'height': opt.b_height, 'text-align': 'left' });
            th.find('ul li').css({ 'position': 'relative', 'width': opt.b_width, 'height': opt.b_height });
            //            th.find('ul li a').css({ float: 'left' });

            th.mouseover(function () { opt.roll_pause = true; });
            th.mouseleave(function () { opt.roll_pause = false; });
            $('#TopNoticePrv').mouseover(function () { opt.roll_pause = true; });
            $('#TopNoticePrv').mouseleave(function () { opt.roll_pause = false; });
            $('#TopNoticePrv').click(function () { topnotice_prev(); });

            $('#TopNoticeNxt').mouseover(function () { opt.roll_pause = true; });
            $('#TopNoticeNxt').mouseleave(function () { opt.roll_pause = false; });
            $('#TopNoticeNxt').click(function () { topnotice_next(); });

            function topnotice_next() {
                th.find('ul li:first').clone().appendTo(th_ul);
                th.find('ul li:first').remove();
            }

            function topnotice_prev() {
                for (var i = 0; i < th_li_length - 1; i++) {
                    th.find('ul li:first').clone().appendTo(th_ul);
                    th.find('ul li:first').remove();
                }
            }

            var act = function () {
                if (!opt.roll_pause) {
                    th.find('ul').animate({ top: -opt.b_height }, { complete: function () {
                        th.find('ul li:first').clone().appendTo(th_ul);
                        th.find('ul li:first').remove();
                        th.find('ul').css('top', '0');
                    }
                    });
                }
            }

            if (opt.display_count < th_li_length) {
                setInterval(act, opt.roll_speed);
            }
        });
    }
    //Top notice end
    
	$('#TopNotice').rolling_up({
		b_width: 224,
		b_height: 20,
		display_count: 1,
		roll_speed: 3000
	});
	
// Tooltip start
    $(".styleuitooltip").mouseover(function (e) {
        var tooltipID = $(this).attr("tooltipid");
        if (tooltipID == null || $.trim(tooltipID) == "") return;

        var layer = $("#" + tooltipID);

        $("body").append(layer[0]);

        layer.show();

        layer.position({
            of: $(this)
				, my: "center top"
				, at: "center bottom"
				, offset: "0 -5"
        });

        if (tooltipID == "talk_caution") {
            var top_length = parseInt(layer.css("top"));
            var max_length = parseInt($('#talk_caution_text').offset().top);
            if (top_length < max_length);
            layer.css("top", max_length + 18);

        }
        $(this).mouseleave(function () { layer.hide(); })
        layer.mouseover(function () { layer.show(); });
        layer.mouseleave(function () { layer.hide(); })
        layer.mouseenter(function () { layer.show(); })

        //        $(this).bind("mouseleave", function () {
        //            layer.hide();
        //        });
        //        layer.bind("mouseenter", function () {
        //            layer.show();
        //        });
        //        layer.bind("mouseleave", function () {
        //            layer.hide();
        //        });
    });
    // Tooltip end
    
    
    $("#helpmenu_opener").click(function () {
        if ($('#j_help_guide').hasClass('j_help_guide_off')) {
            $('#j_help_guide').removeClass('j_help_guide_off');
            $('#j_help_guide').addClass('j_help_guide_on');
        } else {
            $('#j_help_guide').addClass('j_help_guide_off');
            $('#j_help_guide').removeClass('j_help_guide_on');
        }
    });

    $("#help_menu_close").click(function () {
        $('#j_help_guide').addClass('j_help_guide_off');
        $('#j_help_guide').removeClass('j_help_guide_on');
    });




});

function getHomeHelpMenu(str) {
	if (str != null && str.indexOf('TDM') >= 0) {
		var SAParam = "?type=" + str;
	}
	urlfile = "helptxt/help"+str+".php"
	$.ajax({
		//url: '/Home/HomeHelpMenu' + SAParam,
		url: urlfile,
		type: 'GET',
		dataType: 'text',
		async: false,
		success: function (data) {
			$("#help_menu").html(data);
			$("#help_menu").show();
			if ($(".summary")[0].scrollHeight > $(".summary").height()) {
				$(".move_top").show();
			}
			else {
				$(".move_top").hide();
			}
		}
	});

}

// HelpMenu HistoryBack
function gobackHomeHelpMenu() {
	$("#help_menu").hide();
	$(".move_top").hide();
}

// HelpMenu Go TopMenu
function topHomeHelpMenu() {
	$('#help_menu .summary').scrollTop(0);
}

// HelpMenu Go HelpMneu
function goHelp(str) {

	if (str != null && str.indexOf('TDM') >= 0 && str.indexOf('_') > 0 && str.length == 10) {
		var menuSplit = str.split("_");

		openHomeHelpMenu();
		getHomeHelpMenu(menuSplit[0]);

		setTimeout(function () {
			$('#help_menu .summary').scrollTop(($('#' + menuSplit[1]).offset().top - $('#001').offset().top));
			$('#' + menuSplit[1]).addClass('prodreg_help_lst_on');

		}, 100);

	}
}
//### HelpMenu End //