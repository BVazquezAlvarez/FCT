<?php
require_once('data/conexiondb.php');
$permisos->isuser();
$oldpass       = $mysqli->real_escape_string($_POST['oldpass']);
$password1    = $mysqli->real_escape_string($_POST['password1']);
$password2  = $mysqli->real_escape_string($_POST['password2']);

$sql="SELECT passwd FROM usuarios WHERE id='".$_SESSION["id"]."'";

    $resulta[] = array();
if ($mysqli->errno) {echo('Esto va mal  ' . $mysqli->error);}
 if($registro = $result->fetch_row()) {
        $resulta[] = $registro;
    }else{
      echo('Esto va mal  ' . $mysqli->error);  
    }
    
    
   if(password_verify($oldpass, $resulta["passwd"])){
       if ($password1==$password2) {
           
          $passcript= password_hash($password1, PASSWORD_DEFAULT);
           $sql = "UPDATE `usuarios` SET `passwd` = '" . $passcript . "' WHERE `usuarios`.`id` = " . $_SESSION["id"];
            $mysqli->query($sql);
            if ($mysqli->errno) {echo('Esto va mal  ' . $mysqli->error);}
            echo "Bien";
       }else{
           echo "ErrorNewPass";
       }
   
       
   }else{
       echo "ErrorPass";
   }
   
    


