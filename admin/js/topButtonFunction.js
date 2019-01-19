
$(window).scroll(function(){
	
	if($(window).scrollTop() + $(window).height() > $(document).height() * 0.4) {
		$('.topBtn').fadeIn();
   }else if($(window).scrollTop() + $(window).height() < $(document).height() * 0.3) {
	   $('.topBtn').fadeOut();
   }
   
   $(".topBtn").click (function(){	
		$("html, body").animate({ scrollTop: 0 }, 500);
	});
	
});



