<?php 
class Permisos{
private $tipousuario;
   function __construct() {
       session_start();
       $this->tipousuario=$_SESSION["tipousuario"];
    }  
    
function isadmin(){

$this->tipousuario!=0 ? header('Location: data/404.php') :  true;

}

function isprofe(){

$this->tipousuario>=3 || is_null($this->tipousuario) ?  header('Location: data/404.php') :  true;

}

function isuser(){

is_null($this->tipousuario) ?  header('Location: data/404.php') :  true;

}




}





 ?>