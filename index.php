<?php

require_once('data/conexiondb.php');
require_once('data/templates/templates.php');

$javas = ' <script src="js/index.js"></script>';



if (isset($_SESSION["usuario"]) && isset($_SESSION["tipousuario"]) && isset($_SESSION["activo"])) {
    if ($_SESSION["tipousuario"] == 0) {
        echo $header . $navbaradmin . $scripts . $javas . $footer;
    } elseif ($_SESSION["tipousuario"] == 1 || $_SESSION["tipousuario"] == 2) {
        echo $header . $navbarprofe . $scripts . $javas . $footer;
    } else {
        echo $header . $navbaruser . $scripts . $javas . $footer;
    }
} else {
    header('Location: login.php');
}
?>

