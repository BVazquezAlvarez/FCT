<?php 
require_once('data/conexiondb.php');
header('Content-Type: application/json; charset=utf-8');
   $tipo=$mysqli->real_escape_string($_POST["tipo"]);
   $id=$mysqli->real_escape_string($_POST["id"]);
   $usuario=$mysqli->real_escape_string($_POST['usuario']);
   $cambiacontra=", `passwd` = '";
   $baja=null;
   $nombre=$mysqli->real_escape_string($_POST['nombre']);
   $apellidos=$mysqli->real_escape_string($_POST['apellidos']);
   $tipousuario=$mysqli->real_escape_string($_POST['tipousuario']);
   $dni=$mysqli->real_escape_string($_POST['dni']);
   $direccion=$mysqli->real_escape_string($_POST["direccion"]);
   $poblacion=$mysqli->real_escape_string($_POST['poblacion']);
   $alta=$mysqli->real_escape_string($_POST['alta']);
   $codpostal=$mysqli->real_escape_string($_POST['codpostal']);
   $provincia=$mysqli->real_escape_string($_POST['provincia']);
   $fechanac=$mysqli->real_escape_string($_POST['fechanac']);
   $activo=$mysqli->real_escape_string($_POST['activo']);


   if (isset($_POST['passwd'])) {
      $cambiacontra.=password_hash($mysqli->real_escape_string($_POST['passwd']),  PASSWORD_DEFAULT)."'";
      $insertcontra=$mysqli->real_escape_string($_POST['passwd']);
   }
   if (isset($_POST['baja'])) {
      $baja=$mysqli->real_escape_string($_POST['baja']);
   }

    if($tipo=="engadir"){
    		$sql="INSERT INTO usuarios (`id`, `usuario`, `passwd`, `tipousuario`, `alta`, `baja`, `activo`) VALUES (null, '".$usuario."', '".$insertcontra."', '".$tipousuario."', '".$alta."', '".$baja."', '".$activo."')";
        $mysqli->query($sql);
        $sql="INSERT INTO `alumnos`(`id`, `apellidos`, `nombre`, `dni`, `direccion`, `poblacion`, `codpostal`, `provincia`, `fechanac`) VALUES ($mysqli->insert_id,'".$apellidos."', '".$nombre."', '".$dni."', '".$direccion."', '".$poblacion."', '".$codpostal."', '".$provincia."', '".$fechanac."')";
         $mysqli->query($sql);
        echo $mysqli->insert_id;
    ;
	}elseif ($tipo=="editar") {
		$sql="UPDATE `usuarios` SET `usuario` = '".$usuario."'".$cambiacontra.", `tipousuario` = '".$tipousuario."', `alta` = '".$alta."', `baja` = '".$baja."', `activo` = '".$activo."' WHERE `usuarios`.`id` = ".$id;
    $mysqli->query($sql);
    $sql="UPDATE `alumnos` SET `apellidos` = '".$apellidos."', `nombre` = '".$nombre."', `dni` = '".$dni."', `direccion` = '".$direccion."', `poblacion` = '".$poblacion."', `codpostal` = '".$codpostal."', `provincia` = '".$provincia."', `fechanac` = '".$fechanac."' WHERE `usuarios`.`id` = ".$id;


	}










 ?>