  <?php 
require_once('../permisos.php');
isadmin();

$contenido = "
  <div  class='container' style='margin-top: 90px;'>
  <div id='mal2' class='alert alert-danger hide alertabsolute'>
        
    </div>
    <div id='exito' class='alert alert-success hide alertabsolute' >
        <strong>Bien!</strong> Datos actualizados
    </div>
    <div class='modal fade' tabindex='-2' role='dialog' id='tablamodal'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' id='cerrartabla1' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 id='titulomodala' class='modal-title'></h4>
      </div>
      <div class='modal-body'>

      <select name='alumnossintutor' id='alumnossintutor'>
      </select><button type='button' class='nuevoalumnoprofe btn btn-success'><i class='glyphicon glyphicon-plus'></i></button>
          <div class='table-responsive'>
    <table id='asignatutor' class='table table-hover table-bordered table-condensed' cellspacing='0' width='100%'>
        <thead>
            <tr>  
                <th>ID</th>
                <th>Usuario</th>              
                <th>Nombre</th>
                <th>Apellidos</th>          
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Usuario</th>           
                <th>Nombre</th>
                <th>Apellidos</th>               
                <th></th>
            </tr>
        </tfoot>
    </table>
    </div>
      </div>
      <div class='modal-footer'>
        <button type='button' id='cerrartabla2' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
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
         <div class='form-group  col-md-2'>
        <label for='inputid'>ID</label>
        <input type='text' maxlength='20' class='form-control' id='inputid' placeholder='ID' disabled='true'>
      </div>
      <div class='form-group col-md-4'>
        <label for='inputuser'>Usuario</label>
        <input type='text' maxlength='20' class='form-control' id='inputuser' placeholder='Usuario'>
      </div>
      <div class='form-group col-md-4'>
        <label for='inputdni'>Correo</label>
        <input type='email' maxlength='30' class='form-control' id='inputcorreo' placeholder='Correo'>
      </div> 
      </div>
      <div class='row'>
      <div class='form-group col-md-8'>
        <label for='inputpass'>Contraseña</label>
        <input type='password' maxlength='20' class='form-control' id='inputpass' placeholder='Contraseña'>
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-5'>
        <label for='inputname'>Nombre</label>
        <input type='text' maxlength='10' class='form-control' id='inputname' placeholder='Nombre.' disabled='true'>
      </div>
      <div class='form-group col-md-6'>
        <label for='inputstartdate'>Apellidos</label>
        <input type='date' maxlength='20' class='form-control' id='inputapellidos' placeholder='Apellidos'>
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-5'>
        <label for='inputtuser'>Tipo Usuario</label>
        <select  name='inputtuser' id='inputtuser' class ='form-control'>
          <option value='0'>Admin</option>
          <option value='1'>Tutor</option>
          <option value='2'>Profesor</option>
          <option value='3' selected>Alumno</option>
        </select>
      </div>
      <div class='form-group col-md-4'>
        <label for='DNI'>DNI</label>
        <input type='text' maxlength='20' class='form-control' id='inputdni' placeholder='DNI'>
      </div> 
      </div> 
      <div class='row'>
      <div class='form-group col-md-5'>
        <label for='inputfechaalta'>Fecha alta</label>
        <input type='text' maxlength='20' class='form-control' id='inputfechaalta' placeholder='Fecha alta'>
      </div>
      <div class='form-group col-md-5'>
        <label for='inputfechabaja'>Fecha baja</label>
        <input type='text' maxlength='20' class='form-control' id='inputfechabaja' placeholder='Fecha baja'>
      </div>    
      </div>
      <div class='row'>
      <div class='form-group col-md-2'>
        <label for='inputactivo'>Activo</label>
        <select  name='inputactivo' id='inputactivo' class ='form-control'>
          <option value='0'>No</option>
          <option value='1' selected>Si</option>
          
        </select>
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
                <th>Usuario</th>
                <th>Correo</th>                        
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Tipo Usuario</th>
                <th>DNI</th>
                <th>Alta</th>
                <th>Baja</th>
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
                <th>Alta</th>
                <th>Baja</th>
                <th>Activo</th>                
                <th></th>
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
    <script src='js/formvalidar.js'></script>
    <script src='js/tablejs/scripttableprof.js'></script>
   


";
echo $contenido;
 ?>