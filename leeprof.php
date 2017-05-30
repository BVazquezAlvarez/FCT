<?php
require_once('data/conexiondb.php');


    $sql="SELECT usuarios.id, usuario, correo ,nombre, apellidos, tipousuario, dni, alta, baja, activo FROM usuarios RIGHT JOIN docentes ON(usuarios.id=docentes.id)";
    $result = $mysqli->query($sql);

    if ($mysqli->errno) {echo('Esto va mal' . $bd->error);}

    $resulta['data'] = array();
    while($registro = $result->fetch_assoc()) {
        $resulta['data'][] = $registro;

    }
    header('Content-Type: application/json; charset=utf-8');

    $result->close();

    
    echo json_encode($resulta);

?>


