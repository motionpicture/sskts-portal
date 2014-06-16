
// メインコンテンツ 
function toggle1() {
 	if ($('#close_content01').css('display') == 'none') {
		$("#close_content01").animate({
			 height: 'toggle'

		  }, "fast").animate({
				opacity: 1
		  }, "fast");

	} else {

		$("#close_content01").animate({
			opacity: 0
		  }, "fast").animate({
			  height: 'toggle'
		  }, "fast") ;
	}
}
function toggle2() {
 	if ($('#close_content02').css('display') == 'none') {
		$("#close_content02").animate({
			 height: 'toggle'

		  }, "fast").animate({
				opacity: 1
		  }, "fast");

	} else {

		$("#close_content02").animate({
			opacity: 0
		  }, "fast").animate({
			  height: 'toggle'
		  }, "fast") ;
	}
}

