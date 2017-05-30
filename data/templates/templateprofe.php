<?php 
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
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FCT Alumnos<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=" dropdown">
                                    <a href="calendarioadmin" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ver Calendarios</a>
                                </li>
                                <li><a href="fctasignador">Asignador FCT</a></li>
                            </ul>
                        </li>
                        <li class=" dropdown"><a class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a id="gestal">Gestionar Alumnos</a></li>
                                <li><a id="gesFCT">Gestionar Empresas</a></li>
                            </ul>
                        </li>                        
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conectado como '.$_SESSION["usuario"].' <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Cambiar contraseña</a></li>
                                <li><a id="perfil">Mi perfil</a></li>
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






 ?>