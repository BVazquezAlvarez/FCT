$(document).ready(function () {
	$('.boton').click(function () {
		var boton =$(this).data('panelid'),
			indice = boton.slice(-1);
			//alert(indice);
			
		$('#'+boton+' .panel-body').html($(this).html());	
			switch (indice) {
				case '1':
					$('#'+boton).toggle();
					break;
				case '2':
					$('#'+boton).toggle();
					break;
				case '3':
					$('#'+boton).toggle();
					break;
				case '4':
					$('#'+boton).toggle();
					break;
			}
	
	});

$("#animar").click(function() {
	var horizontal=$('.caixa').width() - $('.bolita').width(),
		vertical=$('.caixa').height() - $('.bolita').height();
		$(".bolita")
			.animate({top:vertical, opacity:'0.5'})
			.delay(500)
			.animate({left:horizontal, opacity:'1'})
			.delay(500)
			.animate({top:'0px', opacity:'0.4'})
			.delay(500)
			.animate({left:'0px', opacity:'1'})


	});	

$("#parar").click(function() {
	$(".bolita").finish();
	$(".bolita")
			.animate({top:'0px', left:'0px', opacity:'1'})
	});	

});