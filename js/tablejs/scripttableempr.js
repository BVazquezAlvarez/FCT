/*************** VARIABLES GLOBALES**********/
var accion;
var botonactual;



function actualizarDB(acc, table) {
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

    $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
        data: {'usuariobase': 'empresa',
            'tipo': acc,
            'id': $('#inputid').val(),
            'razon_social': $('#inputrazonsocial').val(),
            'direccion': $('#inputdireccion').val(),
            'poblacion': $('#inputpoblacion').val(),
            'codpostal': $('#inputcodigopostal').val(),
            'provincia': $('#inputprovincia').val(),
            'pais': $('#inputpais').val(),
            'contacto': $('#inputcontacto').val(),
            'telefono': $('#inputtelefono').val(),
            'movil': $('#inputmovil').val(),
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
                if (acc = "engadir") {

                    fila = botonactual;
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
        ajax: "leefct.php",
        columns: [
            {data: "id"},
            {data: "razon_social"},
            {data: "direccion", "visible": false, },
            {data: "poblacion"},
            {data: "codpostal", "visible": false, },
            {data: "provincia"},
            {data: "pais"},
            {data: "contacto"},
            {data: "telefono"},
            {data: "movil", "visible": false, },
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
                    $('#titulomodal').html("Nueva Empresa");
                    $('#inputrazonsocial').prop("disabled", false);
                    $('#inputdireccion').prop("disabled", false);
                    $('#inputpoblacion').prop("disabled", false);
                    $('#inputcodigopostal').prop("disabled", false);
                    $('#inputprovincia').prop("disabled", false);
                    $('#inputpais').prop("disabled", false);
                    $('#inputcontacto').prop("disabled", false);
                    $('#inputtelefono').prop("disabled", false);
                    $('#inputmovil').prop("disabled", false);
                    $('#vmodal').modal({
                        show: true, backdrop: false, keyboard: false
                    });

                }

            },
        ]


    });



//****** BOTON GUARDAR MODAL********//


    $('#guardarform').click(function () {
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
                'razon_social': $('#inputrazonsocial').val(),
                'direccion': $('#inputdireccion').val(),
                'poblacion': $('#inputpoblacion').val(),
                'codpostal': $('#inputcodigopostal').val(),
                'provincia': $('#inputprovincia').val(),
                'pais': $('#inputpais').val(),
                'contacto': $('#inputcontacto').val(),
                'telefono': $('#inputtelefono').val(),
                'movil': $('#inputmovil').val()


            };
            botonactual = table.row.add(valores).draw('false');
            $('#formodal')[0].reset();

        } else if (accion == "editar") {
            actualizarDB(accion, table, botonactual);
            var f = botonactual.closest('tr');
            fila = table.row(f).index();
            var valores = [
                $('#inputid').val(),
                $('#inputrazonsocial').val(),
                $('#inputdireccion').val(),
                $('#inputpoblacion').val(),
                $('#inputcodigopostal').val(),
                $('#inputprovincia').val(),
                $('#inputpais').val(),
                $('#inputcontacto').val(),
                $('#inputtelefono').val(),
                $('#inputmovil').val()
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
        //reseterror();

        accion = "editar";
        botonactual = $(this);
        var f = botonactual.closest('tr');
        var fila = table.row(f).index();
        $('#guardarform').html("Actualizar");
        $('#guardarform').removeClass('btn-danger');
        $('#titulomodal').html("Actualizar datos de empresa");
        $('#vmodal').modal({
            show: true, backdrop: false, keyboard: false
        });

        $('#inputid').val(table.cell(fila, 0).data()).prop("disabled", true);
        $('#inputrazonsocial').val(table.cell(fila, 1).data()).prop("disabled", false);
        $('#inputdireccion').val(table.cell(fila, 2).data()).prop("disabled", false);
        $('#inputpoblacion').val(table.cell(fila, 3).data()).prop("disabled", false);
        $('#inputcodigopostal').val(table.cell(fila, 4).data()).prop("disabled", false);
        $('#inputprovincia').val(table.cell(fila, 5).data()).prop("disabled", false);
        $('#inputpais').val(table.cell(fila, 6).data()).prop("disabled", false);
        $('#inputcontacto').val(table.cell(fila, 7).data()).prop("disabled", false);
        $('#inputtelefono').val(table.cell(fila, 8).data()).prop("disabled", false);
        $('#inputmovil').val(table.cell(fila, 3).data()).prop("disabled", false);


    });

});