<?php 
require_once('data/templates.php');



if(isset($_SESSION["usuario"]) && isset($_SESSION["tipousuario"]) && isset($_SESSION["activo"])){
    if ($_SESSION["tipousuario"]==0) {
        echo $header.$navbaradmin.$footer;
    }else{
        echo $header.$navbaruser.$footer;
    }

}else{
     header('Location: login.php');
}


 ?>

