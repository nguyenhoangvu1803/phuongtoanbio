jQuery(document).ready(function($) {
	"use strict";
	/* Count Down */
	var get_date_count_down = $(".ori-count-down > span").text();
	if(get_date_count_down.trim() && get_date_count_down.trim() != ""){
		$(".ori-count-down").countdown(get_date_count_down, function(event) {
			$('.ori-count-down-days .ori-count-down-number').text(event.strftime('%D'));
			$('.ori-count-down-hours .ori-count-down-number').text(event.strftime('%H'));
			$('.ori-count-down-minutes .ori-count-down-number').text(event.strftime('%M'));
			$('.ori-count-down-seconds .ori-count-down-number').text(event.strftime('%S'));
		});
	}
});