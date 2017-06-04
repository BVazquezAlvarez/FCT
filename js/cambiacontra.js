$(document).ready(function () {

$( "#botoncambiacontra" ).click(function() {
var formData= new FormData();
formData.append("oldpassword", $("#oldpassword").val());
formData.append("password1", $("#password1").val());
formData.append("password2", $("#password2").val());

$.ajax({
    type: "POST",
    contentType: false,
    processData: false,
    data:formData,
    url: "nuevacontra.php",
})
 .success(function( data, textStatus, jqXHR ) {
     if ( console && console.log ) {
         if(data=="ErrorNewPass"){
             $("#gestal").html("Las contraseñas nuevas no coinciden").addClass("btn-danger").removeClass("btn-success");
         }else if(data=="ErrorPass"){
             $("#gestal").html("La contraseña actual es incorrecta").addClass("btn-danger").removeClass("btn-success");
         }else{
              $("#gestal").html("Contraseña cambiada").addClass("btn-success").removeClass("btn-danger");
         }
     }
 })
 .fail(function( jqXHR, textStatus, errorThrown ) {
     if ( console && console.log ) {
         console.log( "La solicitud a fallado: " +  errorThrown);
     }
});

});

});