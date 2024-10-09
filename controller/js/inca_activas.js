// 
$(document).ready(function () {
    $('#tablax').DataTable({
        processing: true, // Muestra el indicador de procesamiento
        deferRender: true, // Renderiza solo las filas visibles
        searchDelay: 500, // Agrega un retraso en la búsqueda
        pageLength: 10, // Número de registros por página
        columnDefs: [
            { searchable: false, targets: [0, 1] } // Deshabilitar búsqueda en columnas específicas si es necesario
        ],
        language: {
            processing: "Tratamiento en curso...",
            search: "Buscar&nbsp;:",
            lengthMenu: "Agrupar de _MENU_ items",
            info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
            infoEmpty: "No existen datos.",
            infoFiltered: "(filtrado de _MAX_ elementos en total)",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron datos con tu búsqueda",
            emptyTable: "No hay datos disponibles en la tabla.",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último"
            },
            aria: {
                sortAscending: ": activar para ordenar la columna en orden ascendente",
                sortDescending: ": activar para ordenar la columna en orden descendente"
            }
        },
        scrollY: 400, // Altura del scroll vertical
        lengthMenu: [[10, 25, -1], [10, 25, "All"]]
    });
});
