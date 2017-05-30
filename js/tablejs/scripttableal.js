//***** VARIABLES GLOBALES**********//	
var accion;
var botonactual;


function actualizarDB(acc, table) {

    $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
        data: {'usuariobase': 'alumno',
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
            'direccion': $('#inputdireccion').val(),
            'poblacion': $('#inputpoblacion').val(),
            'provincia': $('#inputprovincia').val(),
            'codpostal': $('#inputcodigopostal').val(),
            'fechanac': $('#inputfechanac').val(),
            'activo': $('#inputactivo').val()
        },
        //Cambiar a type: POST si necesario
        type: "POST",
        // Formato de datos que se espera en la respuesta
        dataType: "text",
        // URL a la que se enviará la solicitud Ajax
        url: "actualiza.php",
    })
            .done(function (data, textStatus, jqXHR) {

                $('#exito').removeClass('hide');
                setTimeout(function () {
                    $('#exito').addClass('hide');
                }, 3000);
            })
            .success(function (data, textStatus, jqXHR) {
                if (acc == "engadir") {

                    fila = botonactual;
                    table.cell(fila, 0).data(data).draw('false');
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
        responsive: true,
        //processing: true,
        //serverSide: true,
        ajax: "leecli.php",
        data: {"funcion": "alumnosgeneralesS"},
        columns: [
            {data: "id"},
            {data: "usuario"},
            {data: "correo", "visible": false, },
            {data: "nombre"},
            {data: "apellidos"},
            {data: "tipousuario", "visible": false, },
            {data: "dni"},
            {data: "direccion"},
            {data: "poblacion"},
            {data: "alta", "visible": false, },
            {data: "baja", "visible": false, },
            {data: "codpostal"},
            {data: "provincia", "visible": false, },
            {data: "fechanac"},
            {data: "activo", "visible": false, },
            {data: null,
                orderable: false,
                searchable: false,
                sortable: false,
                defaultContent: "<div class='text-center'><button type='button' class='editar btn btn-primary btn-xs' title='Editar'><i class='glyphicon glyphicon-pencil'></i></button> <button type='button' class='calendar btn btn-success btn-xs' title='Calendario'><i class='glyphicon glyphicon-calendar'></i></button>"}
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
                    $('#guardarform').removeClass('btn-danger');
                    $('#guardarform').html("Insertar");
                    $('#titulomodal').html("Nuevo alumno");
                    $('#inputuser').prop("disabled", true);
                    $('#inputcorreo').prop("disabled", false);
                    $('#inputpass').prop("disabled", false);
                    $('#inputname').prop("disabled", false);
                    $('#inputtuser').prop("disabled", false);
                    $('#inputapellidos').prop("disabled", false);
                    $('#inputdni').prop("disabled", false);
                    $('#inputfechaalta').prop("disabled", false);
                    $('#inputfechabaja').prop("disabled", false);
                    $('#inputdireccion').prop("disabled", false);
                    $('#inputpoblacion').prop("disabled", false);
                    $('#inputcodigopostal').prop("disabled", false);
                    $('#inputprovincia').prop("disabled", false);
                    $('#inputfechanac').prop("disabled", false);
                    $('#inputactivo').prop("disabled", false);
                    $('#vmodal').modal({
                        show: true, backdrop: false, keyboard: false
                    });

                }

            },
        ]


    });



//****** BOTON GUARDAR MODAL********//

   $('#formodal').submit(function (event) {
   	alert("SSSSSSSSSSSSSSSSSSSS");
        var fila;
      
        
        if (accion == "engadir") {
            actualizarDB(accion, table, botonactual);
            var valores = {
                'id': $('#inputid').val(),
                'usuario': $('#inputuser').val(),
                'correo': $('#inputcorreo').val(),
                'nombre': $('#inputname').val(),
                'apellidos': $('#inputapellidos').val(),
                'tipousuario': $('#inputtuser').val(),
                'dni': $('#inputdni').val(),
                'direccion': $('#inputdireccion').val(),
                'poblacion': $('#inputpoblacion').val(),
                'alta': $('#inputfechaalta').val(),
                'baja': $('#inputfechabaja').val(),
                'codpostal': $('#inputcodigopostal').val(),
                'provincia': $('#inputprovincia').val(),
                'fechanac': $('#inputfechanac').val(),
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
                $('#inputdireccion').val(),
                $('#inputpoblacion').val(),
                $('#inputfechaalta').val(),
                $('#inputfechabaja').val(),
                $('#inputcodigopostal').val(),
                $('#inputprovincia').val(),
                $('#inputfechanac').val(),
                $('#inputactivo').val()
            ];
            var columnas = table.columns().header().count();
            for (var i = 0; i < columnas; i++) {
                table.cell(fila, i).data(valores[i]);
            }
            table.draw(false);
            $('#vmodal').modal('hide');
        }
           	 event.preventDefault();

   });

//**************BOTON EDITAR************
    $('#example tbody').on('click', '.editar', function () {
        //reseterror();

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

        $('#inputid').val(table.cell(fila, 0).data()).prop("disabled", true);
        $('#inputuser').val(table.cell(fila, 1).data()).prop("disabled", false);
        $('#inputcorreo').val(table.cell(fila, 2).data()).prop("disabled", false);
        $('#inputname').val(table.cell(fila, 3).data()).prop("disabled", false);
        $('#inputapellidos').val(table.cell(fila, 4).data()).prop("disabled", false);
        $('#inputtuser').val(table.cell(fila, 5).data()).prop("disabled", false);
        $('#inputdni').val(table.cell(fila, 6).data()).prop("disabled", false);
        $('#inputdireccion').val(table.cell(fila, 7).data()).prop("disabled", false);
        $('#inputpoblacion').val(table.cell(fila, 8).data()).prop("disabled", false);
        $('#inputfechaalta').val(table.cell(fila, 9).data()).prop("disabled", false);
        $('#inputfechabaja').val(table.cell(fila, 10).data()).prop("disabled", false);
        $('#inputcodigopostal').val(table.cell(fila, 11).data()).prop("disabled", false);
        $('#inputprovincia').val(table.cell(fila, 12).data()).prop("disabled", false);
        $('#inputfechanac').val(table.cell(fila, 13).data()).prop("disabled", false);
        $('#inputactivo').val(table.cell(fila, 14).data()).prop("disabled", false);


    });

    $('#example tbody').on('click', '.calendar', function () {
        botonactual = $(this);
        var f = botonactual.closest('tr');
        var fila = table.row(f).index();
        idaldestino = table.cell(fila, 0).data();

        $.ajax({
            data: {
                "id": idaldestino
            },
            type: "POST",
            dataType: "html",
            url: "calendaral.php",
        })
                .done(function (data, textStatus, jqXHR) {
                    if (console && console.log) {
                        console.log("La solicitud se ha completado correctamente. " + textStatus);
                        $("#contenido").html(data);
                    }
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    if (console && console.log) {
                        console.log("La solicitud a fallado: " + errorThrown);
                    }
                });

    });
});