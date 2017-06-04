 <?php
 $permisos->isuser();
require_once('data/conexiondb.php');
header('Content-Type: application/json; charset=utf-8');
$usuariobase  = $_POST["usuariobase"];
$tipo         = $mysqli->real_escape_string($_POST["tipo"]);
$id           = $_SESSION["id"];
$usuario      = $mysqli->real_escape_string($_POST['usuario']);
$nombre       = $mysqli->real_escape_string($_POST['nombre']);
$apellidos    = $mysqli->real_escape_string($_POST['apellidos']);
$dni          = $mysqli->real_escape_string($_POST['dni']);
$correo       = $mysqli->real_escape_string($_POST['correo']);
$direccion    = $mysqli->real_escape_string($_POST["direccion"]);
$poblacion    = $mysqli->real_escape_string($_POST['poblacion']);
$codpostal    = $mysqli->real_escape_string($_POST['codpostal']);
$provincia    = $mysqli->real_escape_string($_POST['provincia']);
$fechanac     = $mysqli->real_escape_string($_POST['fechanac']);


if ($usuariobase == "alumno") {
        $sql = "UPDATE `usuarios` SET `usuario` = '" . $usuario . "' , `correo` = '" . $correo . "' WHERE `usuarios`.`id` = " . $id;
        $mysqli->query($sql);
        $sql = "UPDATE `alumnos` SET `apellidos` = '" . $apellidos . "', `nombre` = '" . $nombre . "', `dni` = '" . $dni . "', `direccion` = '" . $direccion . "', `poblacion` = '" . $poblacion . "', `codpostal` = '" . $codpostal . "', `provincia` = '" . $provincia . "', `fechanac` = '" . $fechanac . "' WHERE `alumnos`.`id` = " . $id;
        
        
    
    
} elseif ($usuariobase == "profesor") {
    
    if ($tipo == "engadir") {
        $sql = "UPDATE `usuarios` SET `usuario` = '" . $usuario . "' , `correo` = '" . $correo." WHERE `usuarios`.`id` = " . $id;
        $mysqli->query($sql);
        $sql = "UPDATE `docentes` SET  `apellidos` = '" . $apellidos . "', `nombre` = '" . $nombre . "', `dni` = '" . $dni . "' WHERE `docentes`.`id` = " . $id;
        
        
    }
}
    

?> 