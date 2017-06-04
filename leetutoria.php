<?php 
require_once('data/conexiondb.php');
$permisos->isadmin();
       $sql="SELECT usuarios.id, usuario, nombre, apellidos FROM usuarios RIGHT JOIN alumnos ON(usuarios.id=alumnos.id) WHERE usuarios.id IN(SELECT fct.alumno FROM fct WHERE fct.docente='".$_POST["idprofe"]."')";
       $result = $mysqli->query($sql);
        if ($mysqli->errno) {echo('Esto va mal' . $mysqli->error);}
        $resulta['data'] = array();
			while($registro = $result->fetch_assoc()) {
			    $resulta['data'][] = $registro;
		}
		header('Content-Type: application/json; charset=utf-8');

		$result->close();


		echo json_encode($resulta);	
			

    ?>