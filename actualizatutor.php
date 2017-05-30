<?php 

require_once('data/conexiondb.php');
header('Content-Type: application/json; charset=utf-8');

$idalumno    = $mysqli->real_escape_string($_POST['idalumno']);
$idprofe  = $mysqli->real_escape_string($_POST['idprofe']);
$tipo  = $mysqli->real_escape_string($_POST['tipo']);

if ($tipo == "engadir") {
        
        $sql = "INSERT INTO `fct`(`id`, `alumno`, `docente`, `inicio`, `fin`, `horas`, `empresa`, `posto`) VALUES (null,'".$idalumno."','".$idprofe."',null,null, null,null,null)";
        $mysqli->query($sql);
        $newid = $mysqli->insert_id;        
        echo $newid;
        
    } elseif ($tipo == "borrar") {
        $sql = "DELETE FROM `fct` WHERE alumno='".$idalumno."'";
        $mysqli->query($sql);
                 
    }







 ?>