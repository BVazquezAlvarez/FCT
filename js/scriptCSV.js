$(document).ready(function () {

$('#submit').click(function() {
$("#resultados").html("<div><img style='width:100%' src='data/assets/cargando.gif'/></div>");
var formData = new FormData();
formData.append('archivocsv', $('input[type=file]')[0].files[0]); 
formData.append('tipouser', $('#selecttipo option:selected').val()); 


$.ajax({
                type: "POST",
                data: formData,                
                contentType: false,
                processData: false,
                url: "insertacsv.php",
               

            }).success(function(data, textStatus, jqXHR) {
	           $("#resultados").html(data);

            })
            .fail(function(jqXHR, textStatus, errorThrown) {
            });

});
});