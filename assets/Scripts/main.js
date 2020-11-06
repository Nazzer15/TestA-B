$(document).ready(function () {

    tablaCliente = $("#tablaCliente").DataTable({
        "columnaDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-info btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }]

    });

    


    //Calificacion

    $("#btnNuevo").click(function () {

        $("#formCalificacion").trigger('reset');
        $("#modalCalificacion").modal('show');

    });


    $("#formCalificacion").submit(function (e) {
        e.preventDefault();

    });

    $('#btnSiguiente').click(function () {
        $("#modalCalificacion").modal('hide');
        $("#modalCliente").modal('show');
    });

    //Fin Calificacion

    //Cliente - Otro contacto
    $("#btnCliente").click(function () {
        $("#modalCliente").modal('show');
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

    //Ocultar form en Crear Test
    /*  
    .hiddenDiv {
        display: none;
    }
                
    .showDiv {
        display: block;
    }
    */    


});
