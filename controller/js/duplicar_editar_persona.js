$('.btn-duplicar').on('click', function () {
    const cedula = $(this).data('cedula');
    const fechacontrato = $(this).data('fechacontratoduplicar'); // Captura la fecha

    $.ajax({
        url: '../../cargo_incapacidad/model/consu_personas.php',
        type: 'POST',
        data: { cedula: cedula, fechacontrato: fechacontrato }, // Enviar la fecha
        dataType: 'json',
        success: function (response) {
            console.log(response);

            if (response.persona) {
                const persona = response.persona;

                $('#CedulaDuplicar').val(persona.Cedula);
                $('#NombreDuplicar').val(persona.Nombre);
                $('#FechacontratoDuplicar').val(persona.Fechacontrato);

                populateSelectsDuplicar(response.eps, response.empresa, response.areaTrabajo);

                $('#EpsDuplicar').val(persona.Eps);
                $('#EmpresaDuplicar').val(persona.Empresa);
                $('#AreaTrabajoDuplicar').val(persona.Areatrabajo);

                // Mostrar el modal
                $('#Duplicar').modal('show'); // Descomentar para mostrar el modal
            } else {
                console.error('No se encontraron resultados para la cédula proporcionada.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
});


// Función para llenar los selectores
function populateSelectsDuplicar(epsList, empresaList, areaTrabajoList) {
    const epsSelect = $('#EpsDuplicar');
    epsSelect.empty(); // Limpiar el select actual
    epsSelect.append(new Option('Seleccione EPS', '')); // Opción por defecto
    epsList.forEach(eps => {
        epsSelect.append(new Option(eps.Descripcion, eps.IdEps)); // Agrega la opción de EPS
    });

    const empresaSelectDuplicar = $('#EmpresaDuplicar'); // Asegúrate de que el ID sea correcto
    empresaSelectDuplicar.empty(); // Limpiar el select actual
    empresaSelectDuplicar.append(new Option('Seleccione Empresa', '')); // Opción por defecto
    empresaList.forEach(empresa => {
        empresaSelectDuplicar.append(new Option(empresa.Descripcion, empresa.IdEmpresa)); // Agrega la opción de Empresa
    });

    const areaTrabajoSelectDuplicar = $('#AreaTrabajoDuplicar'); // Asegúrate de que el ID sea correcto
    areaTrabajoSelectDuplicar.empty(); // Limpiar el select actual
    areaTrabajoSelectDuplicar.append(new Option('Seleccione Área de Trabajo', '')); // Opción por defecto
    areaTrabajoList.forEach(area => {
        areaTrabajoSelectDuplicar.append(new Option(area.Descripcion, area.IdArea)); // Agrega la opción de Área de Trabajo
    });
}