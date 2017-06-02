/*************** VARIABLES GLOBALES**********/
var accion;
var botonactual;

function actualizaSelect(){
	 $.ajax({
            type: "POST",
            data: {
                'funcion': 'alumnospropios'
            },
            url: "leecli.php",
            dataType: "text",

        }).success(function(data, textStatus, jqXHR) {
            $('#alumnossintutor').html(data).fadeIn();

        })


        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus + " " + errorThrown);
                $('#mal2').removeClass('hide');
                $('#mal2').html(" <strong>Error!</strong>No se ha podido actualizar: " + errorThrown);
                setTimeout(function() {
                    $('#mal2').addClass('hide');
                }, 3000);
                return false;
            }
        });
}


function actualizaAlumtutor(table) {
    $('#tablamodal').modal({
        show: true,
        backdrop: false,
        keyboard: false
    });
    var f = botonactual.closest('tr');
    var fila = table.row(f).index();
    var tabla = $('#asignatutor').DataTable({
        language: {
            url: "plugins/datatables/Galician.json"
        },
        //processing: true,
        //serverSide: true,
        data: {
            'idprofe': table.cell(fila, 0).data()
        },
        "ajax": {
            "url": "leetutoria.php",
            "data": {
                "idprofe": table.cell(fila, 0).data(),
            },
            "type": "POST"
        },

        columns: [{
                data: "id"
            },
            {
                data: "usuario"
            },
            {
                data: "nombre"
            },
            {
                data: "apellidos"
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                sortable: false,
                defaultContent: "<div class='text-center'><button type='button' class='editar btn btn-danger btn-xs' title='Editar'><i class='glyphicon glyphicon-remove'></i></button>	</div>"
            }
        ],
        dom: "<'row'l><'row'<'col-sm-7' B><'col-sm-5'f>>rtip",
        buttons: [{
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

        ]


    });
   	actualizaSelect()

    $('#cerrartabla1, #cerrartabla2').on('click', function() {
        tabla.destroy();
    });

    $('.nuevoalumnoprofe').on('click', function() {
       
        $.ajax({
                type: "POST",
                data: {
                	'tipo': 'engadir',
                    'idalumno': $("#alumnossintutor").val(),
                    'idprofe': table.cell(fila, 0).data(),
                },
                url: "actualizatutor.php",
                dataType: "text",

            }).success(function(data, textStatus, jqXHR) {
	            var	valor= $("#alumnossintutor option:selected").text();
	            var pos=valor.indexOf(':');
	            var us=valor.slice(0, pos);
	           	valor=valor.slice(pos+2);
	           	pos=valor.indexOf(' ');
	           	var nom=valor.slice(0, pos);
	           	valor=valor.slice(pos+2);
				var valores = {
				            'id': data,
				            'usuario': us,
				            'nombre': nom,
				            'apellidos': valor,				            
				};
				botonactual = tabla.row.add(valores).draw('false');
				actualizaSelect()



            })


            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus + " " + errorThrown);
                    $('#mal2').removeClass('hide');
                    $('#mal2').html(" <strong>Error!</strong>No se ha podido actualizar: " + errorThrown);
                    setTimeout(function() {
                        $('#mal2').addClass('hide');
                    }, 3000);
                    return false;
                }
            });


    });
}

function actualizarDB(acc, table) {
    if (!Modernizr.inputtypes.date) {
        $("input[type=date]").datepicker({
            closeText: "Cerrar",
            prevText: "&#x3C;Ant",
            nextText: "Sig&#x3E;",
            currentText: "Hoy",
            monthNames: ["enero", "febrero", "marzo", "abril", "mayo", "junio",
                "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
            ],
            monthNamesShort: ["ene", "feb", "mar", "abr", "may", "jun",
                "jul", "ago", "sep", "oct", "nov", "dic"
            ],
            dayNames: ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"],
            dayNamesShort: ["dom", "lun", "mar", "mié", "jue", "vie", "sáb"],
            dayNamesMin: ["D", "L", "M", "X", "J", "V", "S"],
            weekHeader: "Sm",
            dateFormat: "yy-mm-dd",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ""

        });
    }

    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                'usuariobase': 'profesor',
                'tipo': acc,
                'id': $('#inputid').val(),
                'usuario': $('#inputuser').val(),
                'correo': $('#inputcorreo').val(),
                'passwd': $('#inputpass').val(),
                'nombre': $('#inputname').val(),
                'apellidos': $('#inputapellidos').val(),
                'dni': $('#inputdni').val(),
                'tipousuario': $('#inputtuser').val(),
                'alta': $('#inputfechaalta').val(),
                'baja': $('#inputfechabaja').val(),
                'activo': $('#inputactivo').val()
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "text",
            // URL a la que se enviará la solicitud Ajax
            url: "actualiza.php",
        })
        .done(function(data, textStatus, jqXHR) {

            $('#exito').removeClass('hide');
            setTimeout(function() {
                $('#exito').addClass('hide');
            }, 3000);
        })
        .success(function(data, textStatus, jqXHR) {
            if (acc = "engadir") {

                fila = botonactual;
                table.cell(fila, 0).data(data).draw('false');;
            }
            $('#exito').removeClass('hide');
            setTimeout(function() {
                $('#exito').addClass('hide');
            }, 3000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus + " " + errorThrown);
                $('#mal2').removeClass('hide');
                $('#mal2').html(" <strong>Error!</strong>No se ha podido actualizar: " + errorThrown);
                setTimeout(function() {
                    $('#mal2').addClass('hide');
                }, 3000);
                return false;
            }
        });


}



$(document).ready(function() {

    $("#formodal").validate({

            rules: {
                inputuser: {
                    required: true,
                    minlength: 4,
                    maxlength: 20

                },
                inputpass: {
                    required: false,
                    minlength: 5
                },
                inputname: "required",
                inputapellidos:"required",
                inputcorreo: "required",
                inputdni: "required",
                inputfechaalta: {
                    required: true,
                    date: true,
                    //dateLessThan : '#inputfechabaja'

                },
                inputfechabaja: {
                    required: false,
                    date: true,
                    //dateGreaterThan : '#inputfechaalta'
                },
            },
            messages: {
                inputuser: {
                    required: "Inserta un usuario",
                    minlength: "El nombre de usuario necesita al menos 4 carácteres",
                    maxlength: "El nombre de usuario admite 20 caracteres como máximo"
                },
                inputpass: {
                    minlength: "Tu contraseña tiene que tener al menos 5 carácteres"
                },
                inputname: "Inserta un nombre",
                inputapellidos: "Inserta los apellidos",
                inputdni: "Inserta el DNI",
                inputfechaalta: {
                    required: "Inserte una fecha de alta",
                    date: "Tiene que ser un formato de fecha válida (AAAA-MM-DD)",
                    dateLessThan : 'Esta fecha tiene que ser anterior a la fecha de baja'

                },
                inputfechabaja: {   
                    date: "Tiene que ser un formato de fecha válida (AAAA-MM-DD)",
                    dateLessThan : 'Esta fecha tiene que ser posterior a la fecha de alta'
                },
            },
              submitHandler: function(form) {
                submitUpdate();
              }


        });

if (!Modernizr.inputtypes.date) {
            $("input[type=date]").datepicker({
                closeText: "Cerrar",
                prevText: "&#x3C;Ant",
                nextText: "Sig&#x3E;",
                currentText: "Hoy",
                monthNames: [ "enero","febrero","marzo","abril","mayo","junio",
                "julio","agosto","septiembre","octubre","noviembre","diciembre" ],
                monthNamesShort: [ "ene","feb","mar","abr","may","jun",
                "jul","ago","sep","oct","nov","dic" ],
                dayNames: [ "domingo","lunes","martes","miércoles","jueves","viernes","sábado" ],
                dayNamesShort: [ "dom","lun","mar","mié","jue","vie","sáb" ],
                dayNamesMin: [ "D","L","M","X","J","V","S" ],
                weekHeader: "Sm",
                dateFormat: "yy-mm-dd",
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ""

                }
             );
}


    //******* PRE-CARGA TABLA***********//
    var table = $('#example').DataTable({
        language: {
            url: "plugins/datatables/Galician.json"
        },
        //processing: true,
        //serverSide: true,
        ajax: "leeprof.php",
        columns: [{
                data: "id"
            },
            {
                data: "usuario"
            },
            {
                data: "correo",
                "visible": false,
            },
            {
                data: "nombre"
            },
            {
                data: "apellidos"
            },
            {
                data: "tipousuario",
                "visible": false,
            },
            {
                data: "dni"
            },
            {
                data: "alta",
                "visible": false,
            },
            {
                data: "baja",
                "visible": false,
            },
            {
                data: "activo",
                "visible": false,
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                sortable: false,
                defaultContent: "<div class='text-center'><button type='button' class='editar btn btn-primary btn-xs' title='Editar'><i class='glyphicon glyphicon-pencil'></i></button>	<button type='button' class='alumnospropios btn btn-success btn-xs' title='Ver Alumnos'><i class='glyphicon glyphicon-education'></i></button>"
            }
        ],
        dom: 'lBfrtip',
        buttons: [{
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
                text: 'Insertar',
                className: 'btn btn-info btn-md',
                action: function() {
                    $('#formodal')[0].reset();
                    accion = "engadir";
                    $('#guardarform').removeClass('btn-danger').class;
                    $('#guardarform').html("Insertar");
                    $('#titulomodal').html("Nuevo docente");
                    $('#inputuser').prop("disabled", false);
                    $('#inputcorreo').prop("disabled", false);
                    $('#inputpass').prop("disabled", false);
                    $('#inputname').prop("disabled", false);
                    $('#inputtuser').prop("disabled", false);
                    $('#inputapellidos').prop("disabled", false);
                    $('#inputdni').prop("disabled", false);
                    $('#inputfechaalta').prop("disabled", false);
                    $('#inputfechabaja').prop("disabled", false);
                    $('#inputactivo').prop("disabled", false);
                    $('#vmodal').modal({

                        show: true,
                        backdrop: false,
                        keyboard: false
                    });

                }

            },



        ]


    });



    //****** BOTON GUARDAR MODAL********//


    $('#guardarform').click(function() {
        var fila;
        /*	if(accion=="engadir" || accion=="editar"){
        		if(!formcontrol()){
        			$('#mal').removeClass('hide');
        			return false;
        		}

        	}*/
        if (accion == "engadir") {
            actualizarDB(accion, table, botonactual);
            var valores = {
                'id': $('#inputid').val(),
                'usuario': $('#inputuser').val(),
                'nombre': $('#inputname').val(),
                'correo': $('#inputcorreo').val(),
                'apellidos': $('#inputapellidos').val(),
                'tipousuario': $('#inputtuser').val(),
                'dni': $('#inputdni').val(),
                'alta': $('#inputfechaalta').val(),
                'baja': $('#inputfechabaja').val(),
                'activo': $('#inputactivo').val()


            };
            botonactual = table.row.add(valores).draw('false');
            $('#formodal')[0].reset();

        } else if (accion == "editar") {
            actualizarDB(accion, table, botonactual);
            var f = botonactual.closest('tr');
            fila = table.row(f).index();
            var valores = [
                $('#inputid').val(),
                $('#inputuser').val(),
                $('#inputcorreo').val(),
                $('#inputname').val(),
                $('#inputapellidos').val(),
                $('#inputtuser').val(),
                $('#inputdni').val(),
                $('#inputfechaalta').val(),
                $('#inputfechabaja').val(),
                $('#inputactivo').val()
            ];
            var columnas = table.columns().header().count();
            for (var i = 0; i < columnas; i++) {
                table.cell(fila, i).data(valores[i]);
            }
            table.draw(false);
            $('#vmodal').modal('hide');
        }
    });


    //**************BOTON EDITAR************
    $('#example tbody').on('click', '.editar', function() {
        //reseterror();

        accion = "editar";
        botonactual = $(this);
        var f = botonactual.closest('tr');
        var fila = table.row(f).index();
        $('#guardarform').html("Actualizar");
        $('#guardarform').removeClass('btn-danger');
        $('#titulomodal').html("Actualizar datos de docente");
        $('#vmodal').modal({
            show: true,
            backdrop: false,
            keyboard: false
        });

        $('#inputid').val(table.cell(fila, 0).data()).prop("disabled", true);
        $('#inputuser').val(table.cell(fila, 1).data()).prop("disabled", false);
        $('#inputcorreo').val(table.cell(fila,2).data()).prop( "disabled", false );
        $('#inputname').val(table.cell(fila, 3).data()).prop("disabled", false);
        $('#inputapellidos').val(table.cell(fila, 4).data()).prop("disabled", false);
        $('#inputtuser').val(table.cell(fila, 5).data()).prop("disabled", false);
        $('#inputdni').val(table.cell(fila, 6).data()).prop("disabled", false);
        $('#inputfechaalta').val(table.cell(fila, 7).data()).prop("disabled", false);
        $('#inputfechabaja').val(table.cell(fila, 8).data()).prop("disabled", false);
        $('#inputactivo').val(table.cell(fila, 9).data()).prop("disabled", false);


    });



    $('#example tbody').on('click', '.alumnospropios', function() {
    botonactual = $(this);
    
        actualizaAlumtutor(table)




    });



});