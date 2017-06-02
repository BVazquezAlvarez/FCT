$(document).ready(function() {
	$("#editProfile").click(function(event) {
		if (!$("#editProfile").hasClass('toggled')){
		$('.editor').each(function () {
        var html = $(this).html();
        var input = $('<input type="text" />');
        input.val(html);
        $(this).html(input);
            });
        $("#editProfile").addClass('toggled');
        $("#editProfile i").removeClass('glyphicon-edit').addClass('glyphicon-floppy-disk');

    }else{
    	 $("#editProfile").removeClass('toggled');
        $("#editProfile i").addClass('glyphicon-edit').removeClass('glyphicon-floppy-disk');

        var formData = new FormData();
        formData.append("tipo", "profesor");
 
        $('input').each(function () {
        var input = $(this);
        var values=$(this).val();
		var parent = input.parent();
		formData.append(parent.attr('id'), values);	
		input.remove();
		parent.html(values);
		});

        
    	$.ajax({
        data: formData,                
        contentType: false,
        processData: false,
        //Cambiar a type: POST si necesario
        type: "POST",
        // Formato de datos que se espera en la respuesta
        dataType: "text",
        // URL a la que se enviará la solicitud Ajax
        url: "fsasfasaf.php",
    	})
            .done(function (data, textStatus, jqXHR) {

             
            })
            .success(function (data, textStatus, jqXHR) {
               
            })
            .fail(function (jqXHR, textStatus, errorThrown) {

            });
 

}
    

  


	});
});