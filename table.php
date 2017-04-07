<?php 

$contennido = "
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
        <form id='formodal'>
         <div class='form-group'>
        <label for='inputid'>ID</label>
        <input type='text' maxlength='20' class='form-control' id='inputid' placeholder='ID'>
      </div>
      <div class='form-group'>
        <label for='inputuser'>Usuario</label>
        <input type='text' maxlength='20' class='form-control' id='inputuser' placeholder='Usuario'>
      </div>
      <div class='form-group'>
        <label for='inputpass'>Contraseña</label>
        <input type='password' maxlength='20' class='form-control' id='inputpass' placeholder='Contraseña'>
      </div>
      <div class='form-group'>
        <label for='inputname'>Nombre:</label>
        <input type='text' maxlength='10' class='form-control' id='inputname' placeholder='Nombre.' disabled='true'>
      </div>
      <div class='form-group'>
        <label for='inputstartdate'>Apellidos</label>
        <input type='date' maxlength='20' class='form-control' id='inputapellidos' placeholder='Apellidos'>
      </div>
      <div class='form-group'>
        <label for='inputtuser'>Tipo Usuario</label>
        <input type='text' maxlength='20' class='form-control' id='inputtuser' placeholder='Tipo Usuario'>
      </div>
      <div class='form-group'>
        <label for='DNI'>DNI</label>
        <input type='text' maxlength='20' class='form-control' id='inputdni' placeholder='DNI'>
      </div> 
       <div class='form-group'>
        <label for='inputdireccion'>Direccion</label>
        <input type='text' maxlength='20' class='form-control' id='inputdireccion' placeholder='Direccion'>
      </div>
      <div class='form-group'>
        <label for='inputpoblacion'>Poblacion</label>
        <input type='text' maxlength='20' class='form-control' id='inputpoblacion' placeholder='Poblacion'>
      </div>
      <div class='form-group'>
        <label for='inputfechaalta'>Fecha alta</label>
        <input type='text' maxlength='20' class='form-control' id='inputfechaalta' placeholder='Fecha alta'>
      </div>
      <div class='form-group'>
        <label for='inputfechabaja'>Fecha baja</label>
        <input type='text' maxlength='20' class='form-control' id='inputfechabaja' placeholder='Fecha baja'>
      </div>    
      <div class='form-group'>
        <label for='inputcodigopostal'>Cod. Postal</label>
        <input type='text' maxlength='20' class='form-control' id='inputcodigopostal' placeholder='Cod. Postal'>
      </div>
      <div class='form-group'>
        <label for='inputsalary'>inputprovincia</label>
        <input type='text' maxlength='20' class='form-control' id='inputprovincia' placeholder='Provincia'>
      </div>
      <div class='form-group'>
        <label for='inputfechanac'>Fecha Nac</label>
        <input type='text' maxlength='20' class='form-control' id='inputfechanac' placeholder='Fecha Nac.'>
      </div>
      <div class='form-group'>
        <label for='inputactivo'>Activo</label>
        <input type='text' maxlength='20' class='form-control' id='inputactivo' placeholder='Activo'>
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
    <script src='js/script.js'></script>

";
echo $contennido;
 ?>