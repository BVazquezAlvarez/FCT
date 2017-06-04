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
    <link href="css/jquery/jquery-ui.css" rel="stylesheet">
    <link href="css/jquery/jquery-ui.structure.css" rel="stylesheet">
    <link href="css/jquery/jquery-ui.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="css/firstestilos.css">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>'
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
                    <a class="navbar-brand" href="#"><img src="data/assets/icono.png"></img></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" class="">Inicio</a></li>
                        <li class=" dropdown"><a class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a id="importCSV">Importar varios usuarios</a></li>                           
                                <li><a id="gestadmin">Gestionar Administradores</a></li>
                                <li><a id="gestal">Gestionar Alumnos</a></li>
                                <li><a id="gestprof">Gestionar Profesores</a></li>
                                <li><a id="gestFCT">Gestionar FCT</a></li>
                            </ul>
                        </li>                        
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conectado como '.$_SESSION["usuario"].' <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a id="cambiacontra">Cambiar contraseña</a></li>
                                <li><a id="perfil">Mi perfil</a></li>
                            </ul>
                        </li>
                        <li class=""><a id="deslog">Desconectar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>


<div id="contenido" class="container"><div id="bienvenida" style="margin-top: 90px">Bienvenido a la gestión de FCT '.$_SESSION["usuario"].'. Usted es un administrador, por lo que tendrá acceso a lo siguiente:<br>
    <ul>
    <li><b>Importar varios usuarios:</b> Añadir varios alumnos a la vez a través de un archivo CSV.</li>
    <li><b>Gestionar administradores:</b> Añadir y editar personas con todos los privilegios.</li>
    <li><b>Gestionar profesores:</b> Añadir y editar personas con los privilegios de profesor (Gestionar Alumnos y su calendario).</li>
    <li><b>Gestionar alumnos:</b> Añadir y editar alumnos que solo podrán gestionar su propio calendario.</li>
    <li><b>Gestionar FTC:</b> Añadir y editar Empresas y sus puestos</li></div></div>
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
                    <a class="navbar-brand" href="#"><img src="data/assets/icono.png"></img></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" class="">Inicio</a></li>                  
                        <li class=" dropdown"><a class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a id="importCSV">Importar varios usuarios</a></li>     
                                <li><a id="gestal">Gestionar Alumnos</a></li>
                                <li><a id="gestFCT">Gestionar Empresas</a></li>
                            </ul>
                        </li>                        
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conectado como '.$_SESSION["usuario"].' <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a id="cambiacontra">Cambiar contraseña</a></li>
                                <li><a id="perfil">Mi perfil</a></li>
                            </ul>
                        </li>
                        <li class=""><a id="deslog">Desconectar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div id="contenido" class="container"><div id="bienvenida" style="margin-top: 90px">Bienvenido a la gestión de FCT '.$_SESSION["usuario"].'. Usted es un profesor, por lo que tendrá acceso a lo siguiente:<br>
    <ul>
    <li><b>Importar varios usuarios:</b> Añadir varios alumnos a la vez a través de un archivo CSV.</li>
    <li><b>Gestionar alumnos:</b> Añadir y editar alumnos que solo podrán gestionar su propio calendario.</li>
    <li><b>Gestionar FTC:</b> Añadir y editar Empresas y sus puestos</li></div></div>
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
                    <a class="navbar-brand" href="#"><img src="data/assets/icono.png"></img></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" class="">Inicio</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Calendario <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=" dropdown">
                                    <a href="calendarioal" id="calendarioal" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar Calendario</a>
                                </li>
                            </ul>
                        </li>                                              
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conectado como '.$_SESSION["usuario"].'  <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a id="cambiacontra">Cambiar contraseña</a></li>
                                <li><a id="perfil" >Mi perfil</a></li>
                            </ul>
                        </li>
                        <li class=""><a id="deslog">Desconectar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div id="contenido" class="container"><div id="bienvenida" style="margin-top: 90px">Bienvenido a la gestión de FCT '.$_SESSION["usuario"].'. Usted es un alumno, por lo que tendrá acceso a lo siguiente:<br>
    <ul>
    <li><b>Gestionar tu calendario:</b> Añadir, editar las tareas que vas desempeñando en tu empresa, ver cuantas horas te quedan en que fecha aproximada terminas.</li>
';


$scripts=' 
    <script src="plugins/datatables/datatables.min.js" ></script>
    <script src="js/bootstrap/bootstrap.js"></script>
    <script src="js/jquery/jquery-ui.js"></script>
    <script src="js/jquery/jquery.validate.min.js"></script>
    <script src="js/polyfiller/modernizr-custom.js"></script>
    
    ';


$footer='
  </body>
</html>';






















 ?>