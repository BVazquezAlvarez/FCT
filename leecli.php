<?php
require_once('data/conexiondb.php');


$funcion=""; 
$funcion    = $mysqli->real_escape_string($_POST["funcion"]);

    if($funcion == "alumnospropios"){
        $sql="SELECT usuarios.id, nombre, apellidos, usuario FROM usuarios RIGHT JOIN alumnos ON(usuarios.id=alumnos.id) WHERE NOT EXISTS (SELECT fct.alumno FROM fct WHERE fct.alumno=usuarios.id)";
       $result = $mysqli->query($sql);
        $dropdown= '<option value="0">Seleccionar</option>';
        if ($mysqli->errno) {echo('Esto va mal  ' . $mysqli->error);}

        while($registro = $result->fetch_assoc()) {
             $dropdown.= '<option value="'.$registro["id"].'">'.$registro["usuario"].': '.$registro["nombre"].' '.$registro["apellidos"].'</option>';

    
    }
        echo $dropdown;

    }else{
    
    if($_SESSION["tipousuario"]==2 || $_SESSION["tipousuario"]==1){
     $sql="SELECT usuarios.id, usuario, correo ,nombre, apellidos, tipousuario, dni, direccion, poblacion, alta, baja, codpostal, provincia, fechanac, activo FROM usuarios RIGHT JOIN alumnos ON(usuarios.id=alumnos.id) WHERE usuarios.id IN( SELECT alumnos FROM fct WHERE docente='".$_SESSION["id"]."')";
    }
    
    elseif ($_SESSION["tipousuario"]==0){
    $sql="SELECT usuarios.id, usuario, correo ,nombre, apellidos, tipousuario, dni, direccion, poblacion, alta, baja, codpostal, provincia, fechanac, activo FROM usuarios RIGHT JOIN alumnos ON(usuarios.id=alumnos.id)";
    }
    $result = $mysqli->query($sql);

    //if ($mysqli->errno) {echo('Esto va mal' . $mysqli->error);}

    $resulta['data'] = array();
    while($registro = $result->fetch_assoc()) {
        $resulta['data'][] = $registro;

    }
    header('Content-Type: application/json; charset=utf-8');

    $result->close();

    
    echo json_encode($resulta);
    }
?>


