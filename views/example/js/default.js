$(document).ready(function(){
	$('.photo').click(function(e){
		e.preventDefault();
			$('.overlay').fadeIn(200);
			$('#shadowbox').show(400,function(){
				$('.overlay').click(function(){
					$(this).fadeOut(400);
					$('#shadowbox').fadeOut(200);
				});
			});
	});
	$('body').keyup(function(e){
		var k = e.keyCode;
		if(k == 27){
			$('.overlay').fadeOut(400)
			$('#shadowbox').fadeOut(200);	
		}
	});
});