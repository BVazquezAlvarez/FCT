<?php

require_once('data/conexiondb.php');
$permisos->isprofe();
$mysqli->autocommit(false);
$getData = array();
$stmtuser = $mysqli->stmt_init();
$stmttipo = $mysqli->stmt_init();
$contnoint = 0;
$contint = 0;
$filename = $_FILES["archivocsv"]["tmp_name"];
$stmtuser->prepare("INSERT INTO usuarios (`id`, `usuario`, `correo`, `passwd`, `tipousuario`, `alta`, `baja`, `activo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmttipo->prepare("INSERT INTO `alumnos`(`id`, `apellidos`, `nombre`, `dni`, `direccion`, `poblacion`, `codpostal`, `provincia`, `fechanac`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $tuser = 3;



$header = null;
if ($_FILES["archivocsv"]["size"] > 0) {
    $file = fopen($filename, "r");
    $mysqli->begin_transaction();
    $contlanes=0;
    while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
        $contlanes++;
        if ($header === null) {
            $header = $getData;
            continue;
        }

        if (!$getData[4]) {
            $tuser = $getData[4];
        }
        $stmtuser->bind_param("isssissi", $getData[0], $getData[1], $getData[2], password_hash($getData[3], PASSWORD_DEFAULT), $tuser, $getData[5], $getData[6], $getData[7]);
        $userex = $stmtuser->execute();
        if (!$userex) {
            $mysqli->rollback();
            $contnoint = $contnoint + 1;
            $errorlineas.=" ".$contlanes;
        } else {
             $mysqli->commit();            
                $stmttipo->bind_param("isssssiss", $newid, $getData[8], $getData[9], $getData[10], $getData[11], $getData[12], $getData[13], $getData[14], $getData[15]);        
            $newid = $mysqli->insert_id;
            $tipoex = $stmttipo->execute();

            if (!$tipoex) {
                $mysqli->rollback();
                $contnoint = $contnoint + 1;
            } else {
                $mysqli->commit();
                $contint = $contint + 1;
            }
        }
    }

    fclose($file);
}

echo "Usuarios insertados: $contint<br>Usuarios no insertados: $contnoint<br>Error en lineas:$errorlineas";
?>










