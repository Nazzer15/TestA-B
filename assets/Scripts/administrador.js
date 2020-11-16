$(document).ready(function(){

    tablaClientes = $("#tablaclientes").DataTable({
        "columnaDefs": [{
            "targets": -1,
            "data": null

        }],
        "language": {

            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron registros",
            "info": "",
            "infoFiltered": "(filtrando de un total de MAX registros)",
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
});