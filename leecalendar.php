<?php
require_once('data/conexiondb.php');

	if($_SESSION['tipousuario']==3){
    $sql="SELECT * FROM calendario WHERE calendario.idalumno=".$_SESSION['id'];
	}else{
	$sql="SELECT * FROM calendario WHERE calendario.idalumno=".$_GET['id'];	
	}
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

