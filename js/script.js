
function reseterror () {
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

function actualizarDB(acc){
	$.ajax({
    // En data puedes utilizar un objeto JSON, un array o un query string
    data: {"tipo" : acc, "name" : $('#inputname').val(),"position" :$('#inputposition').val(),"office" : $('#inputoffice').val(),"extn" : $('#inputextn').val(),"start_date" : $('#inputstartdate').val(),"salary" : $('#inputsalary').val()},
    //Cambiar a type: POST si necesario
    type: "POST",
    // Formato de datos que se espera en la respuesta
    dataType: "json",
    // URL a la que se enviará la solicitud Ajax
    url: "../panels/actualiza.php",
	})
	 .done(function( data, textStatus, jqXHR ) {
	 	$('#exito').removeClass('hide');
	 	setTimeout(function(){ $('#exito').addClass('hide'); }, 3000);
	 })
	  .success(function( data, textStatus, jqXHR ) {
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

//***** VARIABLES GLOBALES**********//	
	var accion;
	var botonactual;

//******* PRE-CARGA TABLA***********//
    var table=$('#example').DataTable( {
    	language:{url:"../plugins/datatables/Galician.json"},
    	//processing: true,
        //serverSide: true,
        ajax: "../panels/leecli.php",
        columns: [
            { data: "name" },
            { data: "position" },
            { data: "office" },
            { data: "extn" },
            { data: "start_date" },
            { data: "salary" },
            { data: null,
        			orderable:false,
        			searchable:false,
        			sortable:false,
        			defaultContent: "<div class='text-center'><button type='button' class='editar btn btn-primary btn-xs' title='Editar'><i class='glyphicon glyphicon-pencil'></i></button>&nbsp;&nbsp;&nbsp;<button type='button' class='eliminar btn btn-danger btn-xs title='Borrar'><i class='glyphicon glyphicon-trash'></i></button></div>" }
        ],
        dom: 'lBfrtip',
    buttons: [
       {
            extend: 'pdf',
            text: '<i class="glyphicon glyphicon-save-file"></i>',
            className: 'btn btn-danger btn-md',
            titleAttr: 'Exportar PDF',
            title: 'Trabajadores'


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
        		reseterror();
        		$('#formodal')[0].reset();
        		accion="engadir";
        		$('#guardarform').removeClass('btn-danger').class;
        		$('#guardarform').html("Insertar");
        		$('#titulomodal').html("Nuevo empleado");
        		$('#inputname').prop( "disabled", false );
				 $('#inputposition').prop( "disabled", false );
				 $('#inputoffice').prop( "disabled", false );
				 $('#inputextn').prop( "disabled", false );
				 $('#inputstartdate').prop( "disabled", false );
				 $('#inputsalary').prop( "disabled", false );
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
	if(accion=="engadir" || accion=="editar"){
		if(!formcontrol()){
			$('#mal').removeClass('hide');
			return false;
		}

	}
	if(accion=="engadir"){
		actualizarDB(accion);
		var valores={'name':$('#inputname').val(),
				 'position':$('#inputposition').val(),
				 'office':$('#inputoffice').val(),
				 'extn':$('#inputextn').val(),
				 'start_date':$('#inputstartdate').val(),
				 'salary':$('#inputsalary').val()
				 };
		table.row.add(valores).draw('false');
		$('#formodal')[0].reset();

	}else if (accion=="editar") {
		actualizarDB(accion);
		var f=botonactual.closest('tr');
		fila= table.row(f).index();
		var valores=[$('#inputname').val(),
					 $('#inputposition').val(),
					 $('#inputoffice').val(),
					 $('#inputextn').val(),
					 $('#inputstartdate').val(),
					 $('#inputsalary').val()
					 ];
		var columnas=table.columns().header().count();
		for (var i = 0; i < columnas; i++) {
			table.cell(fila,i).data(valores[i]);
		}
		table.draw(false);
		$('#vmodal').modal('hide');
	}else{
		actualizarDB(accion);
		fila=botonactual.closest('tr');
		table.row(fila).remove().draw(false);
		$('#vmodal').modal('hide');
	}
});

//**************BOTON ELIMINAR************
$('#example tbody').on('click', '.eliminar', function() {
	reseterror();

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

	$('#inputname').val(table.cell(fila,0).data()).prop( "disabled", true );
	$('#inputposition').val(table.cell(fila,1).data()).prop( "disabled", true );
	$('#inputoffice').val(table.cell(fila,2).data()).prop( "disabled", true );
	$('#inputextn').val(table.cell(fila,3).data()).prop( "disabled", true );
	$('#inputstartdate').val(table.cell(fila,4).data()).prop( "disabled", true );
	$('#inputsalary').val(table.cell(fila,5).data()).prop( "disabled", true );

	
});

//**************BOTON EDITAR************
$('#example tbody').on('click', '.editar', function() {
	reseterror();

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

	$('#inputname').val(table.cell(fila,0).data()).prop( "disabled", false );
	$('#inputposition').val(table.cell(fila,1).data()).prop( "disabled", false );
	$('#inputoffice').val(table.cell(fila,2).data()).prop( "disabled", false );
	$('#inputextn').val(table.cell(fila,3).data()).prop( "disabled", true );
	$('#inputstartdate').val(table.cell(fila,4).data()).prop( "disabled", false );
	$('#inputsalary').val(table.cell(fila,5).data()).prop( "disabled", false );

});
	
});