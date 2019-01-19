
 $(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('.topBtn').fadeIn();
			} else {
				$('.topBtn').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('.topBtn').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	
	
	$('.btn1').click(function(){
		$('.glass').slideDown();
	});
	