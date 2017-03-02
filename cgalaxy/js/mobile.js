jQuery(document).ready(function($) {
	var nowpage = 0;
	$(document).swipe({
		swipe: function(event, direction) {
			switch (direction) {
				case 'left':
					nowpage += 1;
					break;
				case "right":
					nowpage -= 1;
					break;
			}
			nextPage();
		}
	});
	$('.page-next>img').click(function(event) {
		nowpage += 1;
		nextPage();
	});
	function nextPage (){
		if (nowpage > 7) {
			nowpage = 7
		}
		if (nowpage < 0) {
			nowpage = 0
		}
		$('.wrap').animate({
			'top': nowpage * -100 + '%'
		}, 400);
	}
});