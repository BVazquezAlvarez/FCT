<?php
require_once('data/conexiondb.php');
require_once('data/templates.php');


$loginnormal='
  <body>
<div class="container">
 <div class="frm-login" style="margin-top: 40px;">
                <div class="frm-head"> 
                    <div class="round round-sm black"><span class="glyphicon glyphicon-user"></span></div>
                    <label class="control-label"><h4>Acceso Control FCT</h4></label>
                </div>
                <div class="frm-body">
                    <form action="login.php" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-3"><label class="control-label">Usuario: </label></div>
                            <div class="col-sm-4">    
                                <input class="form-horizontal" type="text" name="usuario" placeholder="Usuario" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label">Contraseña: </label></div>
                            <div class="col-sm-4">
                                    <input class="form-horizontal" type="password" name="contra" placeholder="Contraseña" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-2">
                                <input class="btn btn-success" type="submit" name="login" value="Acceder" style="width: 175px;"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>';

$loginerror='
  <body>
<div class="container">
 <div class="frm-login" style="margin-top: 40px;">
                <div class="frm-head"> 
                    <div class="round round-sm black"><span class="glyphicon glyphicon-user"></span></div>
                    <label class="control-label"><h4>Acceso Control FCT</h4></label>
                </div>
                <div class="frm-body">
                    <form action="login.php" method="post" class="form-horizontal">
                    <span style="text-align: center; color:red;">Usuario o contraseña incorrecto</span> 
                        <div class="form-group">
                            <div class="col-sm-3"><label class="control-label">Usuario: </label></div>
                            <div class="col-sm-4">    
                                <input class="form-horizontal" type="text" name="usuario" placeholder="Usuario" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label">Contraseña: </label></div>
                            <div class="col-sm-4">
                                    <input class="form-horizontal" type="password" name="contra" placeholder="Contraseña" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-2">
                                <input class="btn btn-success" type="submit" name="login" value="Acceder" style="width: 175px;"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>';
if(isset($_SESSION["usuario"]) && isset($_SESSION["activo"])){
	header('Location: index.php');
}

if(isset($_POST["contra"]) && isset($_POST["usuario"])){

    $sql = "SELECT usuario,passwd,tipousuario,baja,activo FROM usuarios where usuario='".$_POST['usuario']."'";
    $resultado = $mysqli->query($sql);  
    if($mysqli->errno) echo($mysqli->error);  
    if ($row = $resultado->fetch_row()) {
     	$usuario=$row[0];
      	$passwd=$row[1];
     	$tipousuario=$row[2];
      	$baja=$row[3];
      	$activo=$row[4];
    }

    if ($passwd==$_POST["contra"] && $activo==1 && $baja==null) {
    	$_SESSION["usuario"]=$usuario;
     	$_SESSION["tipousuario"]=$tipousuario;
      	$_SESSION["activo"]=$activo;
        header('Location: index.php');
    }else{
       echo $header;
	   echo $loginerror;
       echo $footer;
    }

}else{

echo $header;
echo $loginnormal;
echo $footer;

}




?>