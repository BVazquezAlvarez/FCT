<?php 
define("DB_HOST","localhost" );  
define("DB_USER", "root");  
define("DB_PASS", "root");  
define("DB_DATABASE", "proyecto" );  
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);   
if($mysqli->connect_errno > 0){   
  echo("Error conectando a la BD: " . $mysqli->connect_error);   
}
 ?>