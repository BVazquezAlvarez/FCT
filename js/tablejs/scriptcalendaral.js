//***** VARIABLES GLOBALES**********//	
var accion;
var botonactual;
var iduser;

function actualizaSelectEmpresa() {
    $.ajax({
        type: "POST",
        data: {
            'accion': 'actualizaSelectEmpresa',
        },
        url: "crunchercalendar.php",
        dataType: "text",
    }).success(function (data, textStatus, jqXHR) {
        $('#empresaSelect').html(data).fadeIn();

    })


            .fail(function (jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus + " " + errorThrown);
                    $('#mal2').removeClass('hide');
                    $('#mal2').html(" <strong>Error!</strong>No se ha podido actualizar: " + errorThrown);
                    setTimeout(function () {
                        $('#mal2').addClass('hide');
                    }, 3000);
                    return false;
                }
            });
}

function actualizaSelectPosto(empresa) {
    empresa || (empresa = ' blue');
    $.ajax({
        type: "POST",
        data: {
            'accion': 'actualizaSelectPosto',
            'empresa': empresa

        },
        url: "crunchercalendar.php",
        dataType: "text",
    }).success(function (data, textStatus, jqXHR) {
        $('#puestoSelect').html(data).fadeIn();

    })


            .fail(function (jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus + " " + errorThrown);
                    $('#mal2').removeClass('hide');
                    $('#mal2').html(" <strong>Error!</strong>No se ha podido actualizar: " + errorThrown);
                    setTimeout(function () {
                        $('#mal2').addClass('hide');
                    }, 3000);
                    return false;
                }
            });

}
function actualizarDB(acc, table) {

    var idcalend;
    fila = botonactual;
    if (!table.cell(fila, 0).data()) {
        idcalend = 0;
    } else {
        idcalend = table.cell(fila, 0).data();
    }
    $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
        data: {'usuariobase': 'alumno',
            'tipo': acc,
            'id': idcalend,
            'idalumno': iduser,
            'fecha': $('#inputfecha').val(),
            'horas': $('#inputhoras').val(),
            'tareas': $('#inputtareas').val(),
        },
        //Cambiar a type: POST si necesario
        type: "POST",
        // Formato de datos que se espera en la respuesta
        dataType: "text",
        // URL a la que se enviará la solicitud Ajax
        url: "actualizacalendar.php",
    })
            .done(function (data, textStatus, jqXHR) {

                $('#exito').removeClass('hide');
                setTimeout(function () {
                    $('#exito').addClass('hide');
                }, 3000);
            })
            .success(function (data, textStatus, jqXHR) {
                if (acc = "engadir") {
                    table.cell(fila, 0).data(data).draw('false');
                    ;
                }
                $('#exito').removeClass('hide');
                setTimeout(function () {
                    $('#exito').addClass('hide');
                }, 3000);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus + " " + errorThrown);
                    $('#mal2').removeClass('hide');
                    $('#mal2').html(" <strong>Error!</strong>No se ha podido actualizar: " + errorThrown);
                    setTimeout(function () {
                        $('#mal2').addClass('hide');
                    }, 3000);
                    return false;
                }
            });
}



$(document).ready(function () {
    iduser = $("#iduser").data('value');

    if (!Modernizr.inputtypes.date) {
        $("input[type=date]").datepicker({
            closeText: "Cerrar",
            prevText: "&#x3C;Ant",
            nextText: "Sig&#x3E;",
            currentText: "Hoy",
            monthNames: ["enero", "febrero", "marzo", "abril", "mayo", "junio",
                "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"],
            monthNamesShort: ["ene", "feb", "mar", "abr", "may", "jun",
                "jul", "ago", "sep", "oct", "nov", "dic"],
            dayNames: ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"],
            dayNamesShort: ["dom", "lun", "mar", "mié", "jue", "vie", "sáb"],
            dayNamesMin: ["D", "L", "M", "X", "J", "V", "S"],
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
        language: {url: "plugins/datatables/Galician.json"},
        //processing: true,
        //serverSide: true,
        //
        "ajax": {
            "url": "leecalendar.php",
            "data": {
                "id": iduser,
            }
        },
        columns: [
            {data: "id", "visible": false, },
            {data: "idalumno", "visible": false, },
            {data: "fecha"},
            {data: "horas"},
            {data: "tareas"},
            {data: null,
                orderable: false,
                searchable: false,
                sortable: false,
                defaultContent: "<div class='text-center'><button type='button' class='editar btn btn-primary btn-xs' title='Editar'><i class='glyphicon glyphicon-pencil'></i></button>"}
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
                text: 'Insertar',
                className: 'btn btn-info btn-md',
                action: function () {
                    $('#formodal')[0].reset();
                    accion = "engadir";
                    $('#guardarform').removeClass('btn-danger').class;
                    $('#guardarform').html("Insertar");
                    $('#titulomodal').html("Nuevo alumno");
                    $('#vmodal').modal({
                        show: true, backdrop: false, keyboard: false
                    });

                }

            },
        ]


    });



//****** BOTON GUARDAR MODAL********//


    $('#guardarform').click(function () {

        var idcalend;
        if (!table.cell(fila, 0).data()) {
            idcalend = 0;
        } else {
            idcalend = table.cell(fila, 0).data();
        }

        /*	if(accion=="engadir" || accion=="editar"){
         if(!formcontrol()){
         $('#mal').removeClass('hide');
         return false;
         }
         
         }*/
        if (accion == "engadir") {
            actualizarDB(accion, table);
            var valores = {
                'id': 0,
                'idalumno': iduser,
                'fecha': $('#inputfecha').val(),
                'horas': $('#inputhoras').val(),
                'tareas': $('#inputtareas').val(),
            };
            botonactual = table.row.add(valores).draw('false');
            $('#formodal')[0].reset();

        } else if (accion == "editar") {
            var f = botonactual.closest('tr');
            var fila = table.row(f).index();
            actualizarDB(accion, table);
            var valores = [
                idcalend,
                iduser,
                $('#inputfecha').val(),
                $('#inputhoras').val(),
                $('#inputtareas').val(),
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
    $('#example tbody').on('click', '.editar', function () {

        accion = "editar";
        botonactual = $(this);
        var f = botonactual.closest('tr');
        var fila = table.row(f).index();
        $('#guardarform').html("Actualizar");
        $('#guardarform').removeClass('btn-danger');
        $('#titulomodal').html("Actualizar datos de alumno");
        $('#vmodal').modal({
            show: true, backdrop: false, keyboard: false
        });

        $('#inputfecha').val(table.cell(fila, 2).data());
        $('#inputhoras').val(table.cell(fila, 3).data());
        $('#inputtareas').val(table.cell(fila, 4).data());

    });

    $('#conffct').click(function () {
        actualizaSelectEmpresa();
        actualizaSelectPosto();
        $('#conffctmodal').modal({
            show: true, backdrop: false, keyboard: false
        });

        $("#empresaSelect").on('change', function (event) {
            var empresa = $("#empresaSelect option:selected").val();
            actualizaSelectPosto(empresa);
        });
        /*
         $.ajax({
         // En data puedes utilizar un objeto JSON, un array o un query string
         data: {		 'usuariobase': 'alumno',	
         'tipo' : acc,
         'id':idcalend,
         'idalumno':iduser,
         'fecha':$('#inputfecha').val(),
         'horas':$('#inputhoras').val(),
         'tareas':$('#inputtareas').val(),
         },
         //Cambiar a type: POST si necesario
         type: "POST",
         // Formato de datos que se espera en la respuesta
         dataType: "text",
         // URL a la que se enviará la solicitud Ajax
         url: "crunchercalendar.php",
         })
         .done(function( data, textStatus, jqXHR ) {
         })
         .success(function( data, textStatus, jqXHR ) {
         
         })
         .fail(function( jqXHR, textStatus, errorThrown ) {
         if ( console && console.log ) {
         console.log( "La solicitud ha fallado: " +  textStatus  +  " " + errorThrown);
         $('#mal2').removeClass('hide');
         $('#mal2').html(" <strong>Error!</strong>No se ha podido actualizar: " +errorThrown);
         setTimeout(function(){ $('#mal2').addClass('hide'); }, 3000);
         return false;
         }
         }
         */
    });


});