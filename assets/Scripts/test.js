/* global Swal */
$(document).ready(function () {



    $('#mostrarCampana').click(function () {
        $('#modalCampana').modal('show');
    });

    $('#btnCrearCampana').click(function () {
        nombreCampana = $("#nombreCampana").val();
        mesId = $("#mesIdCampana").val();
        var form = $('#formCampana');
        $.ajax({
            url: "procesarTest.php",
            type: "POST",
            dataType: "JSON",
            data: form.serialize() + "&accionTest=crearCampana",
            success: function () {
                $('#modalCampana').modal('hide');
                location.reload();
            }
        });

        location.reload();
    });


    //funcion de login
    $("#btnCrearTest").click(function () {

        var form = $("#formLlamada");
        $('#empleadoId').val();
        empleadoId = $('#empleadoId').serialize();
        $.ajax({
            url: "procesarTest.php",
            type: "POST",
            dataType: "JSON",
            data: form.serialize() + "&accionTest=crearTest", empleadoId,
            success: function (data) {
                if (data.valido) {
                    window.location = "empleado-vertest.php";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Datos incorrectos!'

                    });
                }
            }
        });
    });




    /*Table*/
    $("#tablaTest").DataTable({
        "columnDefs": [{

            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-warning btnEditarT'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button><button class='btn btn-info btnVerT' onclick='window.location='empleado-vertestunico.php''>Ver</button></div></div>"
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




    $(".btnEditarT").click(function () {
        console.log("Editar");
        $('#modalEditarTest').modal('show');
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        console.log(id);
        Campana = fila.find('td:eq(1)').text();
        mes = fila.find('td:eq(2)').text();
        Ganador = fila.find('td:eq(4)').text();
        descripcion1 = fila.find('td:eq(5)').text();
        descripcion2 = fila.find('td:eq(6)').text();
        file1 = fila.find('td:eq(7)').text();
        file2 = fila.find('td:eq(8)').text();

        $('#descripcion1').val(descripcion1);
        $('#descripcion2').val(descripcion2);
        $('#file1').val(file1);
        $('#file2').val(file2);
        $('#test').val(Ganador);


    });

    $("#btnEditarTest").click(function () {
        var form = $('#formEditarTest');
        form.validate({
            rules: {

                descripcion1: {
                    required: true,

                },
                descripcion2: {
                    required: true,

                }
            },
            messages: {

                descripcion1: { required: "Campo requerido*" },
                descripcion2: { required: "Campo requerido*" }
            }
        });
        if (form.valid()) {
            descripcion1 = $('#descripcion1').val();
            descripcion2 = $('#descripcion2').val();
            file1 = $('#file1').val();
            file2 = $('#file2').val();
            Ganador = $('#test').val();
            console.log(Ganador);
            id = parseInt(fila.find('td:eq(0)').text());
            $("#idE").val(id);
            idserializado = $("#idE").serialize();
            $.ajax({
                url: "procesarTest.php",
                type: "POST",
                dataType: "JSON",
                data: form.serialize() + "&accionTest=editarTest", idserializado,
                success: function () {
                    // location.reload();
                }
            });

        }

    });

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
                url: "procesarTest.php",
                type: "POST",
                datatype: "json",
                data: idserializado + "&accionTest=eliminarTest",
                success: function () {
                    location.reload();
                }
            });
        }

    });


    $(".btnVerT").click(function () {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        $("#idE").val(id);
        idserializado = $("#idE").serialize();

        $.ajax({
            url: "procesarTest.php",
            type: "POST",
            datatype: "json",
            data: idserializado + "&accionTest=verTest",
            success: function () {
                window.location.href = 'empleado-vertestunico.php';
            }
        });


    });





});     