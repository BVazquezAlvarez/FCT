<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <link href="../css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="../css/firstestilos.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top">
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
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Ver usuarios</a></li>
                                <li><a href="register.html">Registrar usuario</a></li>
                            </ul>
                        </li>                        
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conectado como  <span class="caret"></span></a>
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

<div class="container">
 <div class="frm-login" style="margin-top: 70px;">
                <div class="frm-head"> 
                    <div class="round round-sm black"><span class="glyphicon glyphicon-user"></span></div>
                    <label class="control-label"><h4>Registrar nuevo usuario</h4></label>
                </div>
                <div class="frm-body">
                    <form action="run" method="post"  class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-3"><label class="control-label">Usuario: </label></div>
                            <div class="col-sm-4">    
                                <input class="form-horizontal" type="text" name="name" placeholder="Usuario" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><label class="control-label">Usuario: </label></div>
                            <div class="col-sm-4">    
                                <input class="form-horizontal" type="text" name="name" placeholder="Usuario" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><label class="control-label">Nombre: </label></div>
                            <div class="col-sm-4">    
                                <input class="form-horizontal" type="text" name="name" placeholder="Usuario" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label">Contraseña: </label></div>
                            <div class="col-sm-4">
                                    <input class="form-horizontal" type="password" name="pass" placeholder="Contraseña" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-2">
                                <input class="btn btn-success" type="submit" name="login" value="LogIn" style="width: 175px;"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script type="text/javascript" charset="utf-8">
    



    
</script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap/bootstrap.js"></script>
  </body>
</html>