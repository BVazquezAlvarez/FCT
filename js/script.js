//***** VARIABLES GLOBALES**********//	
	var accion;
	var botonactual;


/*function reseterror () {
	$('#mal').addClass('hide');
	$('#mal').html("");
	$('#inputname').removeClass('errorForm');
	$('#inputposition').removeClass('errorForm');
	$('#inputoffice').removeClass('errorForm');
	$('#inputextn').removeClass('errorForm');
	$('#inputstartdate').removeClass('errorForm');
	$('#inputsalary').removeClass('errorForm');


}


function formcontrol(){
	reseterror();
	var errormensaje="<strong>Oops!</strong> Los siguientes campos están vacios o son incorrectos:";
	var valido=true;
	if ($('#inputname').val()=="" || $('#inputname').val()==" " || /^\s+$/.test($('#inputname').val())) {
		$('#inputname').addClass('errorForm');
		errormensaje+=" Nombre";
		valido=false;
	}
	if ($('#inputposition').val()=="" || $('#inputposition').val()==" ") {
		$('#inputposition').addClass('errorForm');
		errormensaje+=" Posicion";
		valido=false;
		
	}
	if ($('#inputoffice').val()=="" || $('#inputoffice').val()==" ") {
		$('#inputoffice').addClass('errorForm');
		errormensaje+=" Oficina";
		valido=false;
	}
	if ($('#inputextn').val()=="" || $('#inputextn').val()==" " || isNaN($('#inputextn').val())){
		$('#inputextn').addClass('errorForm');
		errormensaje+=" Extn";
		valido=false;
	}
	if ($('#inputstartdate').val()=="" || $('#inputstartdate').val()==" ") {
		$('#inputstartdate').addClass('errorForm');
		$errormensaje+=" Fecha";
		valido=false;
	}
	if ($('#inputsalary').val()=="" || $('#inputsalary').val()==" ") {
		$('#inputsalary').addClass('errorForm');
		errormensaje+=" Salario";
		valido=false;
	}
	$('#mal').html(errormensaje);
	return valido;

}
*/
function actualizarDB(acc, table){
	$.ajax({
    // En data puedes utilizar un objeto JSON, un array o un query string
    data: {		 'tipo' : acc,
    			 'id':$('#inputid').val(),	
				 'usuario':$('#inputuser').val(),
				 'passwd':$('#inputpass').val(),
				 'nombre':$('#inputname').val(),
				 'apellidos':$('#inputapellidos').val(),
				 'dni':$('#inputdni').val(),
				 'tipousuario':$('#inputtuser').val(),
				 'alta':$('#inputfechaalta').val(),
				 'baja':$('#inputfechabaja').val(),
				 'direccion':$('#inputdireccion').val(),
				 'poblacion':$('#inputpoblacion').val(),
				 'provincia':$('#inputprovincia').val(),
				 'codpostal':$('#inputcodigopostal').val(),
				 'fechanac':$('#inputfechanac').val(),
				 'activo':$('#inputactivo').val()
		},
    //Cambiar a type: POST si necesario
    type: "POST",
    // Formato de datos que se espera en la respuesta
    dataType: "text",
    // URL a la que se enviará la solicitud Ajax
    url: "actualiza.php",
	})
	 .done(function( data, textStatus, jqXHR ) {

	 	$('#exito').removeClass('hide');
	 	setTimeout(function(){ $('#exito').addClass('hide'); }, 3000);
	 })
	  .success(function( data, textStatus, jqXHR ) {
	  	if(acc="engadir"){
	  	var f=botonactual.closest('tr');
		fila= table.row(f).index();
		table.cell(fila,0).data(data).draw('false');;
	 	}
	 	$('#exito').removeClass('hide');
	 	setTimeout(function(){ $('#exito').addClass('hide'); }, 3000);
	 })
	 .fail(function( jqXHR, textStatus, errorThrown ) {
	     if ( console && console.log ) {
	         console.log( "La solicitud ha fallado: " +  textStatus  +  " " + errorThrown);
	         	$('#mal2').removeClass('hide');
	         	$('#mal2').html(" <strong>Error!</strong>No se ha podido actualizar: " +errorThrown);
	 			setTimeout(function(){ $('#mal2').addClass('hide'); }, 3000);
	 			return false;
	     }
	});
	}



$(document).ready(function () {



//******* PRE-CARGA TABLA***********//
    var table=$('#example').DataTable( {
    	language:{url:"plugins/datatables/Galician.json"},
    	//processing: true,
        //serverSide: true,
        ajax: "leecli.php",
        columns: [
            { data: "id" },
            { data: "usuario" },
            //{ data: "passwd","visible": false, },
            { data: "nombre" },
            { data: "apellidos" },
            { data: "tipousuario", "visible": false, },
            { data: "dni" },
            { data: "direccion" },
            { data: "poblacion" },
            { data: "alta", "visible": false, },
            { data: "baja","visible": false, },
            { data: "codpostal" },
            { data: "provincia","visible": false, },
            { data: "fechanac" },
            { data: "activo","visible": false, },
            { data: null,
        			orderable:false,
        			searchable:false,
        			sortable:false,
        			defaultContent: "<div class='text-center'><button type='button' class='editar btn btn-primary btn-xs' title='Editar'><i class='glyphicon glyphicon-pencil'></i></button>" }
        ],
        dom: 'lBfrtip',
    buttons: [
       {
            extend: 'pdf',
            text: '<i class="glyphicon glyphicon-save-file"></i>',
            className: 'btn btn-danger btn-md',
            titleAttr: 'Exportar PDF',
            title: 'Alumnos'


        },
         {
            extend: 'excelHtml5',
            text: '<i class="glyphicon glyphicon-calendar"></i>',
            className: 'btn btn-success btn-md',
            titleAttr: 'Exportar Excel'
        },
        {
            extend: 'print',
            text: '<i class="glyphicon glyphicon-print"></i>',
            className: 'btn btn-info btn-md',
            titleAttr: 'Imprimir',
          	
        },
        {
        	extend: 'columnToggle',
        	text: 'Mostrar Salario',
        	className:'btn btn-info btn-md', 
        	columns: '.ocultar'
        	
        	
        },
        {
        	text: 'Insertar',
        	className:'btn btn-info btn-md',
        	action: function () {
        		$('#formodal')[0].reset();
        		accion="engadir";
        		$('#guardarform').removeClass('btn-danger').class;
        		$('#guardarform').html("Insertar");
        		$('#titulomodal').html("Nuevo empleado");
        		$('#inputuser').prop( "disabled", true );
        		$('#inputuser').prop( "disabled", false );
				$('#inputpass').prop( "disabled", false );
				$('#inputname').prop( "disabled", false );
				$('#inputtuser').prop( "disabled", false );
				$('#inputapellidos').prop( "disabled", false );
				$('#inputdni').prop( "disabled", false );
				$('#inputfechaalta').prop( "disabled", false );
				$('#inputfechabaja').prop( "disabled", false );
				$('#inputdireccion').prop( "disabled", false );
				$('#inputpoblacion').prop( "disabled", false );
				$('#inputcodigopostal').prop( "disabled", false );
				$('#inputprovincia').prop( "disabled", false );
				$('#inputfechanac').prop( "disabled", false );
				$('#inputactivo').prop( "disabled", false );
        		$('#vmodal').modal({

        			show: true, backdrop: false, keyboard:false	
        		});
        		
        	}
        	
        },


        
    ]
       

    } );



//****** BOTON GUARDAR MODAL********//


$('#guardarform').click(function() {
	var fila;
/*	if(accion=="engadir" || accion=="editar"){
		if(!formcontrol()){
			$('#mal').removeClass('hide');
			return false;
		}

	}*/
	if(accion=="engadir"){
		actualizarDB(accion,table,botonactual);
		var valores={
				 'id':$('#inputid').val(),
				 'usuario':$('#inputuser').val(),
				 'nombre':$('#inputname').val(),
				 'apellidos':$('#inputapellidos').val(),				
				 'tipousuario':$('#inputtuser').val(),
				 'dni':$('#inputdni').val(),
				 'direccion':$('#inputdireccion').val(),
				 'poblacion'	:$('#inputpoblacion').val(),
				 'alta':$('#inputfechaalta').val(),
				 'baja':$('#inputfechabaja').val(),
		         'codpostal':$('#inputcodigopostal').val(),
				 'provincia':$('#inputprovincia').val(),
				 'fechanac':$('#inputfechanac').val(),
				 'activo':$('#inputactivo').val()


				 };
		table.row.add(valores).draw('false');
		$('#formodal')[0].reset();

	}else if (accion=="editar") {
		actualizarDB(accion,table,botonactual);
		var f=botonactual.closest('tr');
		fila= table.row(f).index();
		var valores=[
				 $('#inputid').val(),
				 $('#inputuser').val(),
				 $('#inputname').val(),
				 $('#inputapellidos').val(),
				 $('#inputtuser').val(),				 
				 $('#inputdni').val(),
				 $('#inputdireccion').val(),
				 $('#inputpoblacion').val(),
				 $('#inputfechaalta').val(),
				 $('#inputfechabaja').val(),
				 $('#inputcodigopostal').val(),
				 $('#inputprovincia').val(),
				 $('#inputfechanac').val(),
				 $('#inputactivo').val()
					 ];
		var columnas=table.columns().header().count();
		for (var i = 0; i < columnas; i++) {
			table.cell(fila,i).data(valores[i]);
		}
		table.draw(false);
		$('#vmodal').modal('hide');
	}else{
		actualizarDB(accion,table,botonactual);
		fila=botonactual.closest('tr');
		table.row(fila).remove().draw(false);
		$('#vmodal').modal('hide');
	}
});

//**************BOTON ELIMINAR************
$('#example tbody').on('click', '.eliminar', function() {
	//reseterror();

	accion="borrar";
	botonactual=$(this);
	var fila=botonactual.closest('tr');
	$('#guardarform').html("Eliminar").addClass;
	$('#titulomodal').html("¿Estás seguro de eliminar este empleado?");
	$('#guardarform').addClass('btn-danger');
	$('#vmodal').modal(
				{
        			show: true, backdrop: false, keyboard:false	
        		});
	$('#inputid').val(table.cell(fila,0).data()).prop( "disabled", true );
	$('#inputuser').val(table.cell(fila,1).data()).prop( "disabled", false );
	//$('#inputpass').val(table.cell(fila,3).data()).prop( "disabled", false );
	$('#inputname').val(table.cell(fila,2).data()).prop( "disabled", false );
	$('#inputapellidos').val(table.cell(fila,3).data()).prop( "disabled", false );
	$('#inputtuser').val(table.cell(fila,4).data()).prop( "disabled", false );
	$('#inputdni').val(table.cell(fila,5).data()).prop( "disabled", false );
	$('#inputdireccion').val(table.cell(fila,6).data()).prop( "disabled", false );
	$('#inputpoblacion').val(table.cell(fila,7).data()).prop( "disabled", false );
	$('#inputfechaalta').val(table.cell(fila,8).data()).prop( "disabled", false );
	$('#inputfechabaja').val(table.cell(fila,9).data()).prop( "disabled", false );
	$('#inputcodigopostal').val(table.cell(fila,10).data()).prop( "disabled", false );
	$('#inputprovincia').val(table.cell(fila,11).data()).prop( "disabled", false );
	$('#inputfechanac').val(table.cell(fila,12).data()).prop( "disabled", false );
	$('#inputactivo').val(table.cell(fila,13).data()).prop( "disabled", false );

	
});

//**************BOTON EDITAR************
$('#example tbody').on('click', '.editar', function() {
	//reseterror();

	accion="editar";
	botonactual=$(this);
	var f=botonactual.closest('tr');
	var fila= table.row(f).index();
	$('#guardarform').html("Actualizar");
	$('#guardarform').removeClass('btn-danger');
	$('#titulomodal').html("Actualizar datos de empleado");
	$('#vmodal').modal({
        			show: true, backdrop: false, keyboard:false	
        		});

	$('#inputid').val(table.cell(fila,0).data()).prop( "disabled", true );
	$('#inputuser').val(table.cell(fila,1).data()).prop( "disabled", false );
	//$('#inputpass').val(table.cell(fila,3).data()).prop( "disabled", false );
	$('#inputname').val(table.cell(fila,2).data()).prop( "disabled", false );
	$('#inputapellidos').val(table.cell(fila,3).data()).prop( "disabled", false );
	$('#inputtuser').val(table.cell(fila,4).data()).prop( "disabled", false );
	$('#inputdni').val(table.cell(fila,5).data()).prop( "disabled", false );
	$('#inputdireccion').val(table.cell(fila,6).data()).prop( "disabled", false );
	$('#inputpoblacion').val(table.cell(fila,7).data()).prop( "disabled", false );
	$('#inputfechaalta').val(table.cell(fila,8).data()).prop( "disabled", false );
	$('#inputfechabaja').val(table.cell(fila,9).data()).prop( "disabled", false );
	$('#inputcodigopostal').val(table.cell(fila,10).data()).prop( "disabled", false );
	$('#inputprovincia').val(table.cell(fila,11).data()).prop( "disabled", false );
	$('#inputfechanac').val(table.cell(fila,12).data()).prop( "disabled", false );
	$('#inputactivo').val(table.cell(fila,13).data()).prop( "disabled", false );


});
	
});