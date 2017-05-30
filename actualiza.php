 <?php
require_once('data/conexiondb.php');
header('Content-Type: application/json; charset=utf-8');
$usuariobase  = $_POST["usuariobase"];
$tipo         = $mysqli->real_escape_string($_POST["tipo"]);
$id           = $mysqli->real_escape_string($_POST["id"]);
$usuario      = $mysqli->real_escape_string($_POST['usuario']);
$cambiacontra = ", `passwd` = '";
$baja         = null;
$nombre       = $mysqli->real_escape_string($_POST['nombre']);
$apellidos    = $mysqli->real_escape_string($_POST['apellidos']);
$tipousuario  = $mysqli->real_escape_string($_POST['tipousuario']);
$dni          = $mysqli->real_escape_string($_POST['dni']);
$correo       = $mysqli->real_escape_string($_POST['correo']);
$direccion    = $mysqli->real_escape_string($_POST["direccion"]);
$poblacion    = $mysqli->real_escape_string($_POST['poblacion']);
$alta         = $mysqli->real_escape_string($_POST['alta']);
$codpostal    = $mysqli->real_escape_string($_POST['codpostal']);
$provincia    = $mysqli->real_escape_string($_POST['provincia']);
$fechanac     = $mysqli->real_escape_string($_POST['fechanac']);
$activo       = $mysqli->real_escape_string($_POST['activo']);
$razonsocial  = $mysqli->real_escape_string($_POST['razon_social']);
$contacto     = $mysqli->real_escape_string($_POST['contacto']);
$telefono     = $mysqli->real_escape_string($_POST['telefono']);
$movil        = $mysqli->real_escape_string($_POST['movil']);
$pais         = $mysqli->real_escape_string($_POST['pais']);




if ($usuariobase == "alumno") {
    if (isset($_POST['passwd'])) {
        $cambiacontra .= password_hash($mysqli->real_escape_string($_POST['passwd']), PASSWORD_DEFAULT) . "'";
        $insertcontra = password_hash($mysqli->real_escape_string($_POST['passwd']), PASSWORD_DEFAULT);
    }
    if (isset($_POST['baja'])) {
        $baja = $mysqli->real_escape_string($_POST['baja']);
    }
    
    if ($tipo == "engadir") {

        
        $sql = "INSERT INTO usuarios (`id`, `usuario`, `correo`, `passwd`, `tipousuario`, `alta`, `baja`, `activo`) VALUES (null, '" . $usuario . "', '" . $correo . "', '" . $insertcontra . "', '" . $tipousuario . "', '" . $alta . "', '" . $baja . "', '" . $activo . "')";
        $mysqli->query($sql);
        $newid = $mysqli->insert_id;
        $sql   = "INSERT INTO `alumnos`(`id`, `apellidos`, `nombre`, `dni`, `direccion`, `poblacion`, `codpostal`, `provincia`, `fechanac`) VALUES ($newid,'" . $apellidos . "', '" . $nombre . "', '" . $dni . "', '" . $direccion . "', '" . $poblacion . "', '" . $codpostal . "', '" . $provincia . "', '" . $fechanac . "')";
        $mysqli->query($sql);
         if ($_SESSION["tipousuario"]==2 || $_SESSION["tipousuario"]==1) {
              $sql   = "INSERT INTO `fct`(`id`, `alumno`, `docente`, `inicio`, `fin`, `horas`, `empresa`) VALUES (null,'".$newid."','".$_SESSION["id"]."',null,null,null,null)";
              $mysqli->query($sql);
            }      
        echo $newid;
        
    } elseif ($tipo == "editar") {
        $sql = "UPDATE `usuarios` SET `usuario` = '" . $usuario . "' , `correo` = '" . $correo . "'" . $cambiacontra . ", `tipousuario` = '" . $tipousuario . "', `alta` = '" . $alta . "', `baja` = '" . $baja . "', `activo` = '" . $activo . "' WHERE `usuarios`.`id` = " . $id;
        $mysqli->query($sql);
        $sql = "UPDATE `alumnos` SET `apellidos` = '" . $apellidos . "', `nombre` = '" . $nombre . "', `dni` = '" . $dni . "', `direccion` = '" . $direccion . "', `poblacion` = '" . $poblacion . "', `codpostal` = '" . $codpostal . "', `provincia` = '" . $provincia . "', `fechanac` = '" . $fechanac . "' WHERE `alumnos`.`id` = " . $id;
        
        
    }
    
} elseif ($usuariobase == "profesor") {
    
    if (isset($_POST['passwd'])) {
        $cambiacontra .= password_hash($mysqli->real_escape_string($_POST['passwd']), PASSWORD_DEFAULT) . "'";
        $insertcontra = password_hash($mysqli->real_escape_string($_POST['passwd']), PASSWORD_DEFAULT);
    }
    if (isset($_POST['baja'])) {
        $baja = $mysqli->real_escape_string($_POST['baja']);
    }
    
    if ($tipo == "engadir") {
        
        $sql = "INSERT INTO usuarios (`id`, `usuario`,`correo`, `passwd`, `tipousuario`, `alta`, `baja`, `activo`) VALUES (null, '" . $usuario . "', '" . $correo . "','".$insertcontra."'', '" . $tipousuario . "', '" . $alta . "', '" . $baja . "', '" . $activo . "')";
        $mysqli->query($sql);
        $newid = $mysqli->insert_id;
        $sql   = "INSERT INTO `docentes`(`id`, `apellidos`, `nombre`, `dni`) VALUES ($newid,'" . $apellidos . "', '" . $nombre . "', '" . $dni . "')";
        $mysqli->query($sql);
        
        echo $newid;
        
    } elseif ($tipo == "editar") {
        $sql = "UPDATE `usuarios` SET `usuario` = '" . $usuario . "' , `correo` = '" . $correo . "'" . $cambiacontra . ", `tipousuario` = '" . $tipousuario . "', `alta` = '" . $alta . "', `baja` = '" . $baja . "', `activo` = '" . $activo . "' WHERE `usuarios`.`id` = " . $id;
        $mysqli->query($sql);
        $sql = "UPDATE `docentes` SET  `apellidos` = '" . $apellidos . "', `nombre` = '" . $nombre . "', `dni` = '" . $dni . "' WHERE `docentes`.`id` = " . $id;
        
        
    }
} else {
    
    if ($tipo == "engadir") {
        
        $sql = "INSERT INTO `empresas`(`id`, `razon_social`, `direccion`, `poblacion`, `codpostal`, `provincia`, `pais`, `contacto`, `telefono`, `movil`) VALUES (null, '" . $razonsocial . "', '" . $direccion . "', '" . $poblacion . "', '" . $codpostal . "', '" . $provincia . "', '" . $pais . "', '" . $contacto . "', '" . $telefono . "', '" . $movil . "')";
        $mysqli->query($sql);
        $newid = $mysqli->insert_id;
        echo $newid;
        ;
    } elseif ($tipo == "editar") {
        $sql = "UPDATE `empresas` SET `razon_social` = '" . $razonsocial . "', `direccion` = '" . $direccion . "', `poblacion` = '" . $poblacion . "', `codpostal` = '" . $codpostal . "', `provincia` = '" . $provincia . "', `pais` = '" . $pais . "', `contacto` = '" . $contacto . "', `telefono` = '" . $telefono . "', `movil` = '" . $movil . "' WHERE `empresas`.`id` = " . $id;
        $mysqli->query($sql);
        
    }
}






?> 