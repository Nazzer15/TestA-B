$(document).ready(function () {

    tablaCliente = $("#tablaCliente").DataTable({
        "columnaDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-warning btnEditarC'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],
        "language": {

            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron registros",
            "info": "",
            "infoFiltered": "(filtrando de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "procesando..."
        }

    });

    $("#btnNuevoCliente").click(function () {

        $("#formCalificacion").trigger('reset');
        $("#modalCalificacion").modal('show');

    });

    $('#cancelarCalifi').click(function () {
        $('#puntos').addClass('hidden');
    });

    //Fin Calificacion

    //Cliente - Otro contacto
    $("#btnCliente").click(function () {
        $("#modalCliente").modal('show');
        $('#puntos').hide();
    });

    //Otro contacto Abre

    $("#btnOtroContacto").click(function () {
        $(".adicionalDiv").removeClass("hiddenDiv");
        $(".adicionalDiv").addClass("showDiv");
    });

    //Otro contacto cierra
    $('#btnOtroContactoCerrar').click(function () {
        $(".adicionalDiv").removeClass("showDiv");
        $(".adicionalDiv").addClass("hiddenDiv");
    });

    $('#btnCancelar').click(function () {
        $('#formCliente').trigger('reset');
    });



    //Toggle menu
    $("i").click(function () {
        $("ul").toggleClass("open");
    });
    cantidadLocales = 0;
    sectorObjetivo = 0;
    colaboradores = 0;
    zona = 0;
    reconocimiento = 0;
    ventas = 0;
    posicion = 0;
    $('#estrellas').starrr({
        change: function (e, valor) {
            cantidadLocales = valor;

        }
    });
    $('#estrellasSO').starrr({
        change: function (e, valor) {
            sectorObjetivo = valor;

        }
    });
    $('#estrellasCO').starrr({
        change: function (e, valor) {
            colaboradores = valor;

        }
    });
    $('#estrellasZO').starrr({
        change: function (e, valor) {
            zona = valor;

        }
    });
    $('#estrellasRM').starrr({
        change: function (e, valor) {
            reconocimiento = valor;

        }
    });
    $('#estrellasVD').starrr({
        change: function (e, valor) {
            ventas = valor;

        }
    });
    $('#estrellasPC').starrr({
        change: function (e, valor) {
            posicion = valor;

        }
    });
    //Crear calificacion
    $("#btnSiguiente").click(function () {
        opcion = 1;
        var form = $("#formCalificacion");
        if (form.valid()) {


            $("#cantidadLocales").val(cantidadLocales);
            $("#sectorObjetivo").val(sectorObjetivo);
            $("#colaboraciones").val(colaboradores);
            $("#zona").val(zona);
            $("#reconocimiento").val(reconocimiento);
            $("#ventas").val(ventas);
            $("#posicion").val(posicion);


            total = parseInt(cantidadLocales) + parseInt(sectorObjetivo) + parseInt(colaboradores) + parseInt(zona) + parseInt(reconocimiento) + parseInt(ventas) + parseInt(posicion);


            console.log("total " + total);
            if (total >= 18) {
                if (opcion === 1) {
                    $.ajax({
                        url: "procesarCliente.php",
                        type: "POST",
                        dataType: "JSON",
                        data: form.serialize() + "&accionCliente=crearCalificacion",
                        success: function (data) {
                            console.log(data);
                        }
                    });
                    $("#modalCalificacion").modal('hide');
                    $("#modalCliente").modal('show');

                }
            } else {


                //$('#totalView').text(totalError);
                $('#totalView').text(total);
                $('#puntos').removeClass('hidden');
                $('#puntos').show();
            }

        }
    });
    //Cerrar calificacion

    //Crear cliente
    $("#btnCrearCliente").click(function () {
        opcion = 1;
        var form = $("#formCliente");
        form.validate({
            rules: {

                nombreMarca: {
                    required: true,

                },
                nombreContacto: {
                    required: true,

                },
                sector: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,


                }
            },
            messages: {

                nombreMarca: { required: "Campo requerido*" },
                nombreContacto: { required: "Campo requerido*" },
                email: { required: "Campo requerido", email: "Formato Incorrecto" }
            }
        });
        if (form.valid()) {
            nombreMarca = $("#nombreMarca").val();
            nombreContacto = $("#nombreContacto").val();
            sector = $("#sector").val();
            email = $("#email").val();
            nombreAdicional = $("#nombreAdicional").val();
            emailAdicional = $("#EmailAdicional").val();


            $('#empleadoId').val();
            empleadoId = $('#empleadoId').serialize();

            if (opcion === 1) {
                $.ajax({
                    url: "procesarCliente.php",
                    type: "POST",
                    dataType: "JSON",
                    data: form.serialize() + "&accionCliente=crearCliente", empleadoId,
                    success: function () {
                        
                    }
                });

                $("#modalCliente").modal('hide');
                $("#modalCliente").trigger('reset');
                location.reload();
            }

        } else {

        }



    });
    //Cerrar cliente

    var fila;

    //Boton de la tabla
    $(".btnEditarC").click(function () {
        $('#modalEditarCliente').modal('show');
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        marca = fila.find('td:eq(1)').text();
        nombreContacto = fila.find('td:eq(2)').text();
        correo = fila.find('td:eq(3)').text();
        estado = parseInt(fila.find('td:eq(6)').text());
        monto = fila.find('td:eq(7)').text();
        nombreAdicional = fila.find('td:eq(10)').text();
        correoAdicional = fila.find('td:eq(11)').text();

        $('#marcaE').val(marca);
        $('#nombreContactoE').val(nombreContacto);
        $('#correoE').val(correo);
        $('#estadoE').val(estado);
        $('#montoE').val(monto);
        $('#nombreContactoAdcE').val(nombreAdicional);
        $('#correoAdcE').val(correoAdicional);

    });

    // Editar cliente
    $("#btnEditarCliente").click(function () {
        var form = $('#formEditarCliente');
        form.validate({
            rules: {

                marcaE: {
                    required: true,

                },
                nombreContactoE: {
                    required: true,

                },

                correoE: {
                    required: true,
                    email: true,


                },
                estadoE: {
                    required: true
                }
            },
            messages: {

                marcaE: { required: "Campo requerido*" },
                nombreContactoE: { required: "Campo requerido*" },
                correoE: { required: "Campo requerido", email: "Formato Incorrecto" },
                estadoE: { required: "Campo requerido" }
            }
        });
        if (form.valid()) {
            marca = $('#marcaE').val();
            nombreContacto = $('#nombreContactoE').val();
            correo = $('#correoE').val();
            estado = $('#estadoE').val();
            console.log(estado);
            monto = $('#montoE').val();
            nombreContactoAdic = $('#nombreContactoAdcE');
            correoAdic = $('#correoAdcE');
            id = parseInt(fila.find('td:eq(0)').text());
            $("#idE").val(id);
            idserializado = $("#idE").serialize();
            $.ajax({
                url: "procesarCliente.php",
                type: "POST",
                dataType: "JSON",
                data: form.serialize() + "&accionCliente=editarCliente", idserializado,
                success: function () {
                    location.reload();
                }
            });
            
        }
        
    });
    //cerrar cliente


    //Eliminar
    $(".btnBorrar").click(function () {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        console.log(id);
        $("#idE").val(id);
        idserializado = $("#idE").serialize();
        marca = fila.find('td:eq(1)').text();
        console.log(fila);

        opcion = 3;
        var responseconfirm = confirm("¿Estas seguro que deseas eliminar al cliente" + " " + marca + "?");
        if (responseconfirm) {
            $.ajax({
                url: "procesarCliente.php",
                type: "POST",
                datatype: "json",
                data: idserializado + "&accionCliente=eliminarCliente",
                success: function () {
                    location.reload();
                }
            });
        }

    });
    //Elimina cliente


});

