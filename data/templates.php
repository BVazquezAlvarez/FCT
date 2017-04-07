<?php 
$header='<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FCT</title>

    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="css/firstestilos.css">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
  <script src="plugins/datatables/datatables.min.js" ></script>
    <script src="js/bootstrap/bootstrap.js"></script>
 <script src="js/script.js"></script>'
  ;


$navbaradmin='
    <div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Logo</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" class="">Inicio</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=" dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Departments</a>
                                </li>
                                <li><a href="#">Add New</a></li>
                            </ul>
                        </li>
                        <li class=" dropdown"><a class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a id="gestal">Gestionar Alumnos</a></li>
                                <li><a id="gestprof">Gestionar Profesores</a></li>
                                <li><a id="gestprof">Gestionar FCT</a></li>
                            </ul>
                        </li>                        
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conectado como '.$_SESSION["usuario"].' <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Cambiar contraseña</a></li>
                                <li><a href="#">Mi perfil</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="#">Desconectar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>


<div id="contenido" class="container"></div>
';
$navbarprofe='<body>
    <div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Logo</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" class="">Inicio</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=" dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Departments</a>
                                </li>
                                <li><a href="#">Add New</a></li>
                            </ul>
                        </li>
                        <li class=" dropdown"><a class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a id="gestal">Gestionar Alumnos</a></li>
                                <li><a id="gesFCT">Gestionar FCT</a></li>
                            </ul>
                        </li>                        
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conectado como '.$_SESSION["usuario"].' <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Cambiar contraseña</a></li>
                                <li><a href="#">Mi perfil</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="#">Desconectar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div id="contenido" class="container"></div>

    ';

$navbaruser='<body>
    <div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Logo</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" class="">Inicio</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=" dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Departments</a>
                                </li>
                                <li><a href="#">Add New</a></li>
                            </ul>
                        </li>                                              
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conectado como '.$_SESSION["usuario"].'  <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Cambiar contraseña</a></li>
                                <li><a href="#">Mi perfil</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="#">Desconectar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
';


$footer='   
  </body>
</html>';






















 ?>