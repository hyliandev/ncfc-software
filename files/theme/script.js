jQuery.noConflict();

jQuery(function($){
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip().hover(function(){
			$(this).css('display','initial');
		});
		
		$('.alert a').click(function(e){
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
	});
});