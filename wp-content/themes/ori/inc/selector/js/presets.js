jQuery(document).ready(function ($) {
	"use strict";
	/* Body layout */
	var body_layout = $.cookie("body_layout");
	if (body_layout == '1') {
		$('body').addClass('zo-boxed').removeClass('zo-wide');
	}
	$('.layout').change(function (e) {
		var layout = $(this).val();
		if (layout == '1') {
			$('body').addClass('zo-boxed').removeClass('zo-wide');
		} else {
			$('body').addClass('zo-wide').removeClass('zo-boxed');
		}
		$.cookie('body_layout', layout, {
			expires: 1,
			path: '/'
		});
        $(window).trigger('resize');
	});
	/* Body layout */

	/* Pattern */
	var before_class = '';
	$('.pattern a').click(function (e) {
		if(before_class != '') {
			$('body.zo-boxed').removeClass(before_class);
		}
		var pattern = $(this).attr('data-id');
		$(this).addClass('active').siblings().removeClass('active');
		$('body.zo-boxed').addClass('pattern' + pattern);
		before_class = 'pattern' + pattern;
	});

	$('.style-toggle').click(function () {
		if ($('#style_selector').hasClass('active')) {
			$('#style_selector').removeClass('active');
		} else {
			$('#style_selector').addClass('active');
		}
	});

    var id_tag_link = null;

    $('.predefined a').click(function(e) {

        if(id_tag_link != null){
            $('#'+id_tag_link).remove();
        }
        var preset = $(this).attr('id');
        var color = $(this).attr('data-color');
        var link = null;
		$('.style-toggle').css('background',color);
		
		/* Change Css */
        if(preset=='0'){
            link =  ZOPreset.theme_url + '/assets/css/static.css?ver=1.0.0';
        }else{
            link =  ZOPreset.theme_url + '/assets/css/presets-'+preset+'.css?ver=1.0.0';
            id_tag_link = 'presets-' + preset;
        }
        var $head = $("head");
        var $headlinklast = $head.find("link[rel='stylesheet']:last");
        var linkElement = "<link id='" +id_tag_link+ "' rel='stylesheet' href='" +link+ "' type='text/css' media='all'>";	
        if ($headlinklast.length){
            $headlinklast.after(linkElement);
        } else {
            $head.append(linkElement);
            $('link[title=mystyle]')[0].disabled=true;
        }
		
		/* Set Image logo */
		$('#zo-header-logo img').attr('src', ZOPreset.theme_url + '/inc/selector/images/logo/logo-' +preset+ '.png');
		/* Set Menu */
		$('.nav-menu > li:hover, .nav-menu > li.active, .nav-menu > li.active > a, .nav-menu > li.active:hover, .nav-menu > li:hover > a, .nav-menu > li:hover > a:active, .widget_cart_search_wrap a:hover, .nav-menu > li.current_page_item, .nav-menu > li.current_page_ancestor, .nav-menu > li.current-menu-item, .nav-menu > li.current-menu-ancestor, .nav-menu > li.current_page_item > a, .nav-menu > li.current_page_ancestor > a, .nav-menu > li.current-menu-item > a, .nav-menu > li.current-menu-ancestor > a').css('color', color);
		$('.nav-menu > li:hover, .nav-menu > li.active, .nav-menu > li.current_page_item, .nav-menu > li.current_page_ancestor, .nav-menu > li.current-menu-item, .nav-menu > li.current-menu-ancestor').css('border-color', color);
		$('.top-bar-infomation i').css('color', color);
		
        $(this).addClass('active').siblings().removeClass('active');
    });

});
