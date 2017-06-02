<?php 
session_start();
require_once('../permisos.php');
isprofe();

$contenido = "
  <div  class='container' style='margin-top: 90px;'>
  <div id='mal2' class='alert alert-danger hide alertabsolute'>
        
    </div>
    <div id='exito' class='alert alert-success hide alertabsolute' >
        <strong>Bien!</strong> Datos actualizados
    </div>
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
        <form id='formodal' role='form' action='' method='post'>
        <div class='row'>
         <div class='form-group  col-md-2'>
        <label for='inputid'>ID</label>
        <input type='text' name='inputid' maxlength='20' class='form-control' id='inputid' placeholder='ID' disabled='true' required>
      </div>
      <div class='form-group col-md-7'>
        <label for='inputuser'>Usuario</label>
        <input type='text' name='inputuser' class='form-control' id='inputuser' placeholder='Usuario' required>
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-8'>
        <label for='inputpass'>Contraseña</label>
        <input type='password'  name='inputpass' class='form-control' id='inputpass' placeholder='Contraseña'>
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-5'>
        <label for='inputname'>Nombre</label>
        <input type='text' name='inputname'  class='form-control' id='inputname' placeholder='Nombre.' disabled='true' required>
      </div>
      <div class='form-group col-md-6'>
        <label for='inputapellidos'>Apellidos</label>
        <input type='text' maxlength='20' class='form-control' name='inputapellidos' id='inputapellidos' placeholder='Apellidos' required>
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-5'>
        <label for='inputcorreo'>Correo</label>
        <input type='text' maxlength='30' class='form-control' id='inputcorreo' name='inputcorreo' placeholder='Correo' required>
      </div> 
      <div class='form-group col-md-3'>
        <label for='inputtuser'>Tipo Usuario</label>
        <select  name='inputtuser' id='inputtuser'  class ='form-control' required>

          <option value='0' ";

         if($_SESSION["tipousuario"]!=0){
            $contenido.="disabled";
          }

          $contenido.=" >Administrador</option>
          <option value='1' disabled>Tutor</option>
          <option value='2' disabled>Profesor</option>
          <option value='3' selected>Alumno</option>
        </select>
      </div>
      <div class='form-group col-md-4'>
        <label for='inputdni'>DNI</label>
        <input type='text' maxlength='20' class='form-control' id='inputdni' name='inputdni' placeholder='DNI' required>
      </div> 
      </div>
      <div class='row'>
       <div class='form-group col-md-7'>
        <label for='inputdireccion'>Direccion</label>
        <input type='text' maxlength='60'  class='form-control' name='inputdireccion'  id='inputdireccion' placeholder='Direccion' required>
      </div>
      <div class='form-group col-md-5'>
        <label for='inputpoblacion'>Poblacion</label>
        <input type='text' maxlength='45' class='form-control' id='inputpoblacion' name='inputpoblacion' placeholder='Poblacion' required>
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-5'>
        <label for='inputfechaalta'>Fecha alta</label>
        <input type='text' maxlength='20' class='form-control' name='inputfechaalta' id='inputfechaalta' placeholder='Fecha alta' required>
      </div>
      <div class='form-group col-md-5'>
        <label for='inputfechabaja'>Fecha baja</label>
        <input type='text' maxlength='20' class='form-control' name='inputfechabaja' id='inputfechabaja' placeholder='Fecha baja'>
      </div>    
      </div>
      <div class='row'>
      <div class='form-group col-md-3'>
        <label for='inputcodigopostal'>Cod. Postal</label>
        <input type='text' maxlength='20' class='form-control' name='inputcodigopostal' id='inputcodigopostal' placeholder='Cod. Postal' required>
      </div>
      <div class='form-group col-md-6'>
        <label for='inputprovincia'>Provincia</label>
        <input type='text' maxlength='45' class='form-control' name='inputprovincia' id='inputprovincia' placeholder='Provincia' required>
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-4'>
        <label for='inputfechanac'>Fecha Nac</label>
        <input type='text' maxlength='20' class='form-control' name='inputfechanac' id='inputfechanac' placeholder='Fecha Nac.' required>
      </div>
      <div class='form-group col-md-2'>
        <label for='inputactivo'>Activo</label>
        <select  name='inputactivo' id='inputactivo' name='inputactivo' class ='form-control' required>
          <option value='0'>No</option>
          <option value='1' selected>Si</option>
          
        </select>
      </div>
      </div>
   
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
        <button type='button' class='btn btn-primary' name='guardarform'  id='guardarform'></button>
      </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <div class='table-responsive'>
    <table id='example' class='table table-hover table-bordered table-condensed' cellspacing='0' width='100%'>
        <thead>
            <tr>  
                <th>ID</th>
                <th>Usuario</th>
                <th>Correo</th>                 
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Tipo Usuario</th>
                <th>DNI</th>
                <th>Direccion</th>
                <th>Poblacion</th>
                <th>Alta</th>
                <th>Baja</th>
                <th class='ocultar'>Cod. Postal</th>
                <th>Provincia</th>
                <th>Fecha Nac.</th>
                <th>Activo</th>                
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Correo</th>            
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Tipo Usuario</th>
                <th>DNI</th>
                <th>Direcion</th>
                <th>Poblacion</th>
                <th>Alta</th>
                <th>Baja</th>
                <th class='ocultar'>Cod. Postal</th>
                <th>Provincia</th>
                <th>Fecha Nac.</th>
                <th>Activo</th>                
                <th></th>
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
    <script src='js/formvalidar.js'></script>
    <script src='js/tablejs/scripttableal.js'></script>


";
echo $contenido;
 ?>