<?php  
require_once('../conexiondb.php');
require_once('../permisos.php');

isuser();

if ($_SESSION["tipousuario"]==3) {

 $sql="SELECT usuarios.id, usuario ,nombre, apellidos,correo, dni, direccion, poblacion, alta, codpostal, provincia, fechanac FROM usuarios RIGHT JOIN alumnos ON(usuarios.id=alumnos.id) WHERE usuarios.id=".$_SESSION["id"];
}elseif($_SESSION["tipousuario"]==2 || $_SESSION["tipousuario"]==1){
   $sql="SELECT usuarios.id, usuario ,nombre, apellidos,correo, dni, alta FROM usuarios RIGHT JOIN docentes ON(usuarios.id=docentes.id) WHERE usuarios.id=".$_SESSION["id"];
}else{
   $sql="SELECT usuarios.id, usuario, alta FROM usuarios WHERE usuarios.id=".$_SESSION["id"];

}


    $result = $mysqli->query($sql);

    if ($mysqli->errno) {echo('Esto va mal' . $bd->error);}

    $resulta = array();
    while($registro = $result->fetch_assoc()) {
        $resulta[] = $registro;

    }





$contenido='
<div class="container" style="margin-top: 90px;">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">'.$resulta[0]["nombre"].' '.$resulta[0]["apellidos"].'</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Usuario:</td>
                        <td class="editor" id="tduser">'.$resulta[0]["usuario"].'</td>
                      </tr>
                      <tr>
                        <td>Nombre:</td>
                        <td class="editor" id="tdnombre">'.$resulta[0]["nombre"].'</td>
                      </tr>
                      <tr>
                        <td>Apellidos:</td>
                        <td class="editor" id="tdapellidos">'.$resulta[0]["apellidos"].'</td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td class="editor" id="tdemail">'.$resulta[0]["correo"].'</td>
                      </tr>
                       <tr>
                        <td>DNI:</td>
                        <td class="editor" id="tddni">'.$resulta[0]["dni"].'</td>
                      </tr>';
if($_SESSION["tipousuario"]==3){
      $contenido.='
                        <tr>
                        <td>Dirección:</td>
                        <td class="editor" id="tddireccion">'.$resulta[0]["direccion"].'</td>
                      </tr>
                      <tr>
                        <td>Población:</td>
                        <td class="editor" id="tdpoblacion">'.$resulta[0]["poblacion"].'</td>
                        </tr>
                        <td>Cod Postal:</td>
                        <td class="editor" id="tdcodpostal">'.$resulta[0]["codpostal"].'</td>                           
                      </tr>
                      </tr>
                        <td>Provincia:</td>
                        <td class="editor" id="tdprovincia">'.$resulta[0]["provincia"].'</td>                           
                      </tr>
                       </tr>
                        <td>Fecha Nac:</td>
                        <td class="editor" id="tdfechanac">'.$resulta[0]["fechanac"].'</td>                           
                      </tr>';
}
$contenido.='            <tr>
                        <td>Fecha Alta:</td>
                        <td class="" id="tdfechaalta">'.$resulta[0]["alta"].'</td>                           
                      </tr>                                          
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                 <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a id="editProfile" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
    <script src="js/profilejs.js"></script>
';
echo $contenido;

    