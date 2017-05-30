<?php 
require_once('data/conexiondb.php');
header('Content-Type: application/json; charset=utf-8');

$id       = $mysqli->real_escape_string($_POST['id']);
$idalumno = $mysqli->real_escape_string($_POST['idalumno']);
$fecha    = $mysqli->real_escape_string($_POST['fecha']);
$horas    = $mysqli->real_escape_string($_POST['horas']);
$tareas   = $mysqli->real_escape_string($_POST["tareas"]);
$tipo     = $mysqli->real_escape_string($_POST["tipo"]);


if ($tipo == "engadir") {
        
        $sql = "INSERT INTO `calendario`(`id`, `idalumno`, `fecha`, `horas`, `tareas`) VALUES  (null, '" . $idalumno . "', '" . $fecha . "', '" . $horas . "', '" . $tareas . "')";
        $mysqli->query($sql);
        $newid = $mysqli->insert_id;        
        echo $newid;
        
    } elseif ($tipo == "editar") {
        $sql = "UPDATE `calendario` SET `id` = '" . $id . "', `idalumno` = '" . $idalumno . "', `fecha` = '" . $fecha . "', `horas` = '" . $horas . "', `tareas` = '" . $tareas . "' WHERE `calendario`.`id` = " . $id;
        $mysqli->query($sql);
                 
    }


 ?>