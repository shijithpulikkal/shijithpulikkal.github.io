
$(document).ready(function(){
	
	$('.btn1').click(function(){
		$('.glass').slideDown();
	});
	
	
	$('.navToggle').click(function(){
		$('.line01').toggleClass("line01Active");
		$('.line02').toggleClass("line02Active");
		$('.navigation ul').slideToggle();
					
	});
	
	$win = $(window).width();
	if($win<=768){
		$('.navigation ul li a').each(function(){
			$(this).click(function(){			
				$(".navigation ul").fadeOut();
				$('.line01').toggleClass("line01Active");
				$('.line02').toggleClass("line02Active");
			});
		});
	}	
	
	$(".toggleWrapper ul li").each(function(){
		
		$(this).click(function(){
			$(this).find("span").slideToggle();
			$(this).siblings().children("span").slideUp();
			
			$(this).find("i").toggleClass("active");
			$(this).siblings().children("i").removeClass("active");
			$(this).siblings().children("i").addClass("plussymbol");
		});
	});
	
		
	$(".tab2").click(function(){
		$('html, body').animate({
			scrollTop: $(document).height()*0.06
		}, 500);		
	});
	$(".tab3").click(function(){
		$('html, body').animate({
			scrollTop: $(document).height()*0.14
		}, 500);		
	});
	$(".tab4").click(function(){
		$('html, body').animate({
			scrollTop: $(document).height()*0.35
		}, 500);		
	});
	$(".tab5").click(function(){
		$('html, body').animate({
			scrollTop: $(document).height()*0.35
		}, 500);		
	});
	$(".tab6").click(function(){
		$('html, body').animate({
			scrollTop: $(document).height()*0.4
		}, 500);		
	});
	
	$('.moreBtn').click(function(){
		$('.subDiv').slideToggle();
	});
	
});


