$(document).ready(function () {
    // Capturar el evento de clic en el botón
    $('.btn-edit').on('click', function () {
        // Obtener la cédula del botón
        const cedula = $(this).data('cedula');
        const fechacontrato = $(this).data('fechacontrato');


        // Realizar la solicitud AJAX
        $.ajax({
            url: '../../cargo_incapacidad/model/consu_personas.php', // Ruta de tu archivo PHP
            type: 'POST',
            data: { cedula: cedula, fechacontrato: fechacontrato },
            dataType: 'json', // Asegúrate de que la respuesta se interprete como JSON
            success: function (response) {
                // Manejo de la respuesta del servidor
                console.log(response); // Muestra la respuesta en la consola

                // Verifica si hay resultados
                if (response.persona) {
                    const persona = response.persona; // Accede al objeto persona

                    // Llenar los campos del formulario con los datos recibidos
                    $('#Cedula').val(persona.Cedula);
                    $('#Nombre').val(persona.Nombre);
                    $('#Fechacontrato').val(persona.Fechacontrato); // Fecha de contrato

                    // Llenar los selectores de EPS, Empresa y Área de Trabajo
                    populateSelects(response.eps, response.empresa, response.areaTrabajo);

                    // Asignar valores seleccionados en los selectores
                    $('#Eps').val(persona.Eps); // Seleccionar EPS
                    $('#Empresa').val(persona.Empresa); // Seleccionar Empresa
                    $('#AreaTrabajo').val(persona.Areatrabajo); // Seleccionar Área de Trabajo
                } else {
                    console.error('No se encontraron resultados para la cédula proporcionada.');
                }
            },
            error: function (xhr, status, error) {
                // Manejo de errores
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    });
});

// Función para llenar los selectores
function populateSelects(epsList, empresaList, areaTrabajoList) {
    const epsSelect = $('#Eps');
    epsSelect.empty(); // Limpiar el select actual
    epsSelect.append(new Option('Seleccione EPS', '')); // Opción por defecto
    epsList.forEach(eps => {
        epsSelect.append(new Option(eps.Descripcion, eps.IdEps)); // Agrega la opción de EPS
    });

    const empresaSelect = $('#Empresa');
    empresaSelect.empty();
    empresaSelect.append(new Option('Seleccione Empresa', '')); // Opción por defecto
    empresaList.forEach(empresa => {
        empresaSelect.append(new Option(empresa.Descripcion, empresa.IdEmpresa)); // Agrega la opción de Empresa
    });

    const areaTrabajoSelect = $('#AreaTrabajo');
    areaTrabajoSelect.empty();
    areaTrabajoSelect.append(new Option('Seleccione Área de Trabajo', '')); // Opción por defecto
    areaTrabajoList.forEach(area => {
        areaTrabajoSelect.append(new Option(area.Descripcion, area.IdArea)); // Agrega la opción de Área de Trabajo
    });
}