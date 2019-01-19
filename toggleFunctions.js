
$(document).ready(function(){
	
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
			//$(this).siblings().children("span").slideUp();
			
			$(this).find("i").toggleClass("active");
//			$(this).siblings().children("i").removeClass("active");
			$(this).siblings().children("i").addClass("plussymbol");
		});
	});
	
	
		$('.navToggle').click(function(){
			
			$('.line01').toggleClass("line01Active");
			$('.line02').toggleClass("line02Active");
			$('nav ul').slideToggle();
					
		});
		
		
});


