<?php 

session_start();

function isadmin(){

$_SESSION["tipousuario"]!=0 ? false :  true;

}

function isprofe(){

$_SESSION["tipousuario"]==3  ? false :  true;

}

function isuser(){

!$_SESSION["tipousuario"] ? :  true;

}










 ?>