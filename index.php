<?php 
require_once('data/templates.php');
require_once('data/conexiondb.php');

$javas='<script type="text/javascript" charset="utf-8">

$( "#gestal" ).click(function() {
  ajaxLoad("table","al");
});
$( "#gestFCT" ).click(function() {
  ajaxLoad("table","fct");
});

function ajaxLoad(urlgo,parameter){
$.ajax({
    data: parameter,
    type: "POST",
    dataType: "html",
    url: "table.php",
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
</script>';


if(isset($_SESSION["usuario"]) && isset($_SESSION["tipousuario"]) && isset($_SESSION["activo"])){
    if ($_SESSION["tipousuario"]==0) {
        echo $header.$navbaradmin.$javas.$footer;
    }else{
        echo $header.$navbaruser.$footer;
    }

}else{
     header('Location: login.php');
}

 ?>

