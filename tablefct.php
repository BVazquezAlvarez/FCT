<?php 

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
          <div class='table-responsive'>
    <table id='postoempresa' class='table table-hover table-bordered table-condensed' cellspacing='0' width='100%'>
        <thead>
            <tr>  
                <th>ID</th>
                <th>Posto</th>              
                <th>Alumno</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Posto</th>              
                <th>Alumno</th>
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
      <div class='form-group col-md-8'>
        <label for='inputrazonsocial'>Razon Social</label>
        <input type='text' maxlength='20' class='form-control' id='inputrazonsocial' placeholder='Razon Social'>
      </div>
      </div>
     <div class='row'>
       <div class='form-group col-md-7'>
        <label for='inputdireccion'>Direccion</label>
        <input type='text' maxlength='20' class='form-control' id='inputdireccion' placeholder='Direccion'>
      </div>
      <div class='form-group col-md-5'>
        <label for='inputpoblacion'>Poblacion</label>
        <input type='text' maxlength='20' class='form-control' id='inputpoblacion' placeholder='Poblacion'>
      </div>
      </div>
      <div class='row'>
      <div class='form-group col-md-3'>
        <label for='inputcodigopostal'>Cod. Postal</label>
        <input type='text' maxlength='20' class='form-control' id='inputcodigopostal' placeholder='Cod. Postal'>
      </div>
      <div class='form-group col-md-5'>
        <label for='inputprovincia'>Provincia</label>
        <input type='text' maxlength='20' class='form-control' id='inputprovincia' placeholder='Provincia'>
      </div>
      
      <div class='form-group col-md-3'>
        <label for='inputpais'>Pais</label>
        <input type='text' maxlength='20' class='form-control' id='inputpais' placeholder='Pais'>
      </div> 
      </div>
      <div class='row'>
      <div class='form-group col-md-6'>
        <label for='inputcontacto'>Contacto</label>
        <input type='text' maxlength='20' class='form-control' id='inputcontacto' placeholder='Contacto'>
      </div>
      <div class='form-group col-md-3'>
        <label for='inputtelefono'>Telefono</label>
        <input type='text' maxlength='20' class='form-control' id='inputtelefono' placeholder='Telefono'>
      </div>    
      <div class='form-group col-md-3'>
        <label for='inputmovil'>Movil</label>
        <input type='text' maxlength='20' class='form-control' id='inputmovil' placeholder='Movil'>
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
                <th>Razon Social</th>              
                <th>Direccion</th>
                <th>Poblacion</th>
                <th>Cod Postal</th>
                <th>Provincia</th>
                <th>Pais</th>
                <th>Contacto</th>
                <th>Telefono</th>
                <th>Movil</th>                
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Razon Social</th>              
                <th>Direccion</th>
                <th>Poblacion</th>
                <th>Cod Postal</th>
                <th>Provincia</th>
                <th>Pais</th>
                <th>Contacto</th>
                <th>Telefono</th>
                <th>Movil</th>                
                <th></th>
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
    <script src='js/formvalidar.js'></script>
    <script src='js/tablejs/scripttableempr.js'></script>


";
echo $contenido;
 ?>