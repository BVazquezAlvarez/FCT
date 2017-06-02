<?php 
require_once('../conexiondb.php');
require_once('../permisos.php');

isuser();

if($_SESSION['tipousuario']==3){
     $id=$_SESSION['id'];
 	 }else{
 	   $id=$_POST['id'];	
 	 }

require_once('../../crunchercalendar.php');
$resulta=muestraFechas($id, $mysqli);

        
$contenido = "
  <div  class='container' style='margin-top: 90px;'>
  <div id='mal2' class='alert alert-danger hide alertabsolute'>
        
    </div>
    <div id='exito' class='alert alert-success hide alertabsolute' >
        <strong>Bien!</strong> Datos actualizados
    </div>
     <input type='hidden' id='iduser' data-value='".$id."' />
     <div class='panel panel-warning' id='panelinfofct'>
     <div class='panel panel-title'>
     Información FCT del alumno:
     </div>
     <button id='conffct' style='float: right;' type='button' class='btn btn-warning btn-xs' title='Editar'><i class='glyphicon glyphicon-wrench'></i></button>
     <ul>
     <li>Empresa: ".$resulta[0]['razon_social']."</li>
     <li>Puesto: ".$resulta[0]['posto']."</li>
     <li>Fecha comienzo: ".$resulta[0]['inicio']."</li>
     <li>Fecha finalización prevista: ".$resulta[0]['fin']."</li>
     <li>Horas realizadas: ".$resulta[0]['horas']."</li>
     <li>Horas restantes: ".(384-$resulta[0]['horas'])."</li>
     </ul>
     </div>
     <div class='modal fade' tabindex='-1' role='dialog' id='conffctmodal'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 id='titulom' class='modal-title'></h4>
      </div>
      <div class='modal-body'>
        <div id='mal' class='alert alert-danger hide'>
        <strong>Oops!</strong> Te has olvidado de rellenar algún campo
    </div>        
    <div class='row'>
    <div class='form-group  col-md-4'>
        <label for='empresaSelect'>Empresa</label>
         <select name='empresaSelect' id='empresaSelect'></select>
     </div>
      <div class='form-group col-md-4'>
        <label for='puestoSelect'>Puesto</label>
         <select name='puestoSelect' id='puestoSelect'></select>

      </div>
	      <div class='col-md-4'>
	          <button type='button' id='asignaposto'>Asignar Puesto</button>
		  </div>
      </div>
      
      </div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
        <button type='button' class='btn btn-primary' id='guardarform'></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <div class='modal fade' tabindex='-1' role='dialog' id='vmodal'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 id='titulomodal' class='modal-title'></h4>
      </div>
      <div class='modal-body'>
        <div id='mal' class='alert alert-danger hide'>
        <strong>Oops!</strong> Te has olvidado de rellenar algún campo
    </div>
        <form id='formodal'>
        <div class='row'>
         <div class='form-group  col-md-4'>
        <label for='inputfecha'>Fecha</label>
        <input type='date' class='form-control' id='inputfecha' placeholder='AAAA/MM/DD'>
      </div>
      <div class='form-group col-md-2'>
        <label for='inputhoras'>Horas</label>
        <input type='number' max='24' min='1' class='form-control' id='inputhoras' >
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-12'>
        <label for='inputtareas'>Tareas</label>
       <textarea class='form-control' rows='5' id='inputtareas' ></textarea>
      </div>
      </div>
    </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
        <button type='button' class='btn btn-primary' id='guardarform'></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <div class='table-responsive'>
    <table id='example' class='table table-hover table-bordered table-condensed' cellspacing='0' width='100%'>
        <thead>
            <tr>
           		<th>ID</th>
            	<th>ID alumno</th>
                <th>Fecha</th>
                <th>Horas</th>           
                <th>Tareas</th>                               
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
            	<th>ID alumno</th>
                <th>Fecha</th>
                <th>Horas</th>           
                <th>Tareas</th>                                 
                <th></th>
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
    <script src='js/tablejs/scriptcalendaral.js'></script>


";
echo $contenido;