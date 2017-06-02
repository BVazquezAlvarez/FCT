<?php
require_once('data/conexiondb.php');
require_once('../permisos.php');
//!isprofe()? header("HTTP/1.0 404 Not Found");

    $sql="SELECT * FROM empresas";
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


