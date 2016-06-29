jQuery.noConflict();

jQuery(function($){
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip().hover(function(){
			$(this).css('display','initial');
		});
		
		$('.alert.alert-danger a').click(function(e){
			e.preventDefault();
			$(this).parent().hide(200);
		});
		
		$('.small-thumb').click(function(e){
			$('.small-thumb.active').removeClass('active');
			
			$(this).addClass('active');
			
			$('#big-thumbnail').attr('src',this.src);
			
			var scrollTo=$('#big-thumbnail').offset().top;
			
			if($(document).scrollTop() > scrollTo){
				$('html, body').animate({scrollTop:scrollTo - 50},250);
			}
		});
		
		$('a.like-booth').click(function(e){
			e.preventDefault();
			
			window.booth_like_link=this;
			
			$.ajax({
				url:this.href,
				method:'POST',
				data:{ajax:true}
			}).done(function(response){
				var $l=$(window.booth_like_link);
				
				if(response.success){
					var $lang=$l.parent().find('.like-count');
					$lang.html(response.count);
					if($l.is('[data-show-like-text]'))
						$lang.append(response.lang);
					$l.find('.fa')
						.removeClass('fa-star')
						.removeClass('fa-star-o')
						.addClass(response.icon)
					;
				}
			});
		});
	});
});

window.booth_like_link=null;