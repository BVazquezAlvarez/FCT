$( "#gestal" ).click(function() {
  ajaxLoad("tableal");
});
$( "#gestprof" ).click(function() {
  ajaxLoad("tableprof");
});
$( "#gestFCT" ).click(function() {
  ajaxLoad("tablefct");
});
$( "#calendarioal" ).click(function() {
  ajaxLoad("calendaral");
});
$("#gestadmin").click(function() {
  ajaxLoad("tableadmin");
});
$( "#perfil" ).click(function() {
  ajaxLoad("perfil");
});
$("#importCSV").click(function() {
  ajaxLoad("gestCSV");
});
$("#deslog").click(function() {
  document.location = 'data/pages/deslog.php';
});

function ajaxLoad(urlgo){
$.ajax({
    type: "POST",
    dataType: "html",
    url: "data/pages/"+urlgo+".php",
})
 .done(function( data, textStatus, jqXHR ) {
     if ( console && console.log ) {
         console.log( "La solicitud se ha completado correctamente. "+textStatus );
         $("#contenido").html(data);
     }
 })
 .fail(function( jqXHR, textStatus, errorThrown ) {
     if ( console && console.log ) {
         console.log( "La solicitud a fallado: " +  errorThrown);
     }
});

}   