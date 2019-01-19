
$(document).ready(function(){
	
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
/*	
	$(".toggleWrapper ul li").each(function(){
		
		$(this).click(function(){
			$(this).find("span").slideToggle();
			$(this).siblings().children("span").slideUp();
			
			$(this).find("i").toggleClass("active");
			$(this).siblings().children("i").removeClass("active");
			$(this).siblings().children("i").addClass("plussymbol");
		});
	});
*/	
	$(".toggleWrapper ul li").each(function(){
		
		$(this).click(function(){
			$(this).find("span").slideToggle();
			//$(this).siblings().children("span").slideUp();
			
			$(this).find("i").toggleClass("active");
//			$(this).siblings().children("i").removeClass("active");
			$(this).siblings().children("i").addClass("plussymbol");
		});
	});
	
		/*
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
*/	
	$('.moreBtn').click(function(){
		$('.subDiv').slideToggle();
	});
	
	
	$('.rightCorner .triangle').click(function(){
			$('.cornerLine1').toggleClass('cornerLine1Active');
			$('.cornerLine2').toggleClass('cornerLine2Active');
			$('.cornerHidden').slideToggle();
			
			$('.cornerWr span').toggleClass('spanActive');
			
		});
		$('.navToggle').click(function(){
			
			$('.line01').toggleClass("line01Active");
			$('.line02').toggleClass("line02Active");
			$('nav ul').slideToggle();
					
		});
		
		
});


