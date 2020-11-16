/* global Swal */
$(document).ready(function () {


    //funcion de login
    $("#btn_login").click(function () {

        var form = $("#form_login");

        $.ajax({
            type: "post",
            dataType: "json",
            url: "procesar.php",
            data: form.serialize() + "&accion=login",
            success: function (data) {
                if (data.valido) {
                    window.location = "empleado.php";
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

    /*Modal agregar empleado*/
    $("#btn-agrega-empleado").click(function () {
        $(".modal-header").css("background-color", "green");
        $(".modal-title").text("Agregar Usuario");
        $(".modal-title").css("color", "#fff");
        $("#formUsuario").trigger('reset');
        $("#modalUsuario").modal('show');
        $("#cedula").removeAttr('disabled');
        opcion = 1;
    });

    //validacion de forms



    /*Funcion de agregar Empleado*/

    /*Table*/
    tablausuarios = $("#tablausuarios").DataTable({
        "columnDefs": [{

            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center '><div class='btn-group'><button class='btn btn-warning btnEditar'>Editar</button><button class='btn btn-danger btnEliminar'>Eliminar</button></div></div>"
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



    var fila;//para capturar la fila para editar o borrar el registro.

    //boton de editar 

    $(".btnEditar").click(function () {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        cedula = parseInt(fila.find('td:eq(1)').text());
        nombre = fila.find('td:eq(2)').text();
        apellido = fila.find('td:eq(3)').text();
        correo = fila.find('td:eq(4)').text();
        rol = fila.find('td:eq(5)').text();
        console.log(rol);
        opcion = 2;

        $("#cedulae").val(cedula);
        if (opcion === 2) {
            $("#cedulae").attr('disabled', true);
        }
        $("#nombree").val(nombre);
        $("#apellidoe").val(apellido);
        $("#correoe").val(correo);
        $("#role").append(rol);


        $(".modal-header").css("background-color", "#F0AD4E");
        $(".modal-title").text("Editar Usuario");
        $(".modal-title").css("color", "#000");
        $("#modalEditar").modal('show');


    });


    //aqui validamos si es agregar o editar
    $("#btnGuardar").click(function () {

        var form = $("#formUsuario");
        $.extend($.validator.messages, { required: "Campos Requeridos", email: "Formato Incorrecto", minlength: "Digita una cedula de 9 dígitos", maxlength: "Digita una cedula de 9 dígitos" });
        if (form.valid()) {
            
            cedula = $("#cedula").val();
            nombre = $("#nombre").val();
            apellido = $("#apellido").val();
            correo = $("#correo").val();

            if (opcion === 1) {
                $.ajax({

                    url: "procesar.php",
                    type: "POST",
                    dataType: "JSON",
                    data: form.serialize() + "&accion=crear-usuario",
                    success: function () {
                        location.reload();


                    }
                });



                location.reload();
            }


        }


    });

    $("#btnEditarBack").click(function () {
        var form = $("#formEditar");
        $.extend($.validator.messages, { required: "Campos Requeridos", email: "Formato Incorrecto", minlength: "Digita una cedula de 9 dígitos", maxlength: "Digita una cedula de 9 dígitos" });
        if (form.valid()) {
            cedula = $("#cedula").val();
            nombre = $("#nombre").val();
            apellido = $("#apellido").val();
            correo = $("#correo").val();

            if (opcion === 2) {
                id = parseInt(fila.find('td:eq(0)').text());

                $("#ide").val(id);
                idserializado = $("#ide").serialize();
                $.ajax({

                    url: "procesar.php",
                    type: "POST",
                    dataType: "JSON",
                    data: form.serialize() + "&accion=edita-usuario", idserializado,
                    success: function (data) {

                        location.reload();


                    }

                });
                location.reload();

            }
           
        }
    });

    //boton de eliminar 
    $(".btnEliminar").click(function () {

        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        $("#id").val(id);
        idserializado = $("#id").serialize();
        nombre = fila.find('td:eq(2)').text();
        apellido = fila.find('td:eq(3)').text();
        opcion = 3;
        var responseconfirm = confirm("¿Estas seguro que deseas eliminar al usuario" + " " + nombre + " " + apellido + "?");
        if (responseconfirm) {
            $.ajax({
                url: "procesar.php",
                type: "POST",
                datatype: "json",
                data: idserializado + "&accion=elimina-usuario",
                success: function () {
                    location.reload();
                }
            });
        }

    });

    //Aqui cuando seleccionamos el nombre del emlpeado la pantalla derecha cambia

    $(".nombreLink").click(function () {

        fila = $(this).closest("tr");
        nombre = fila.find('td:eq(2)').text();
        apellido = fila.find('td:eq(3)').text();
        correo = fila.find('td:eq(4)').text();
        contrataciones = fila.find('td:eq(6)').text();
        reuniones = fila.find('td:eq(7)').text();
        llamadas = fila.find('td:eq(8)').text();
        $("#fullnamecontainer").text(nombre + " " + apellido);
        $("#emailholder").text(correo);
        $("#contratacionesholder").text(contrataciones);
        $("#reunionesholder").text(reuniones);
        $("#llamadasholder").text(llamadas);


    });










});     