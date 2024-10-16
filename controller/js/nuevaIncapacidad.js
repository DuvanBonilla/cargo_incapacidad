$(document).ready(function() {
    // Manejador de clics para el botón btn-nuevaIncapacidad
    $('.btn-nuevaIncapacidad').on('click', function() {
        // Obtener la fila actual del botón
        var $row = $(this).closest('tr');
        
        // Capturar los datos de la fila
        const cedula = $row.find('td:eq(0)').text().trim(); // Cédula
        const fechaContrato = $row.find('td:eq(5)').text().trim(); // Fecha contrato

        // Asignar los valores a los campos ocultos del modal
        $('#Cedula').val(cedula);
        $('#Fechacontrato').val(fechaContrato);

        // Mostrar los valores en la consola
        console.log('Cédula:', cedula);
        console.log('Fecha Contrato:', fechaContrato);
    });

    // Cuando se envíe el formulario
    $('#nuevaIncapacidad form').on('submit', function(e) {
        e.preventDefault(); // Evitar el envío normal del formulario

        // Capturar los valores de los inputs del modal
        var cedula = $('#Cedula').val();
        var ibc = $('#IBC').val(); 
        var fechaContrato = $('#Fechacontrato').val();
        var diagnostico = $('#Codigodiagnostico').val(); 
        var inipro = $('#inipro').val(); 
        var tipoinc = $('#Tipoincapacidad').val();
        var fechaInicio = $('#Fechainicio').val();
        var totalDias = $('#Totaldias').val(); 
        var observaciones = $('#Observaciones').val(); 
        var archivo = $('#Archivo')[0].files[0]; 

        // Si los datos de fecha de contrato, fecha de inicio y tipo de incapacidad están completos
        if (fechaContrato && fechaInicio && tipoinc) {
            calcularDias(); // Llamar a la función para calcular los días automáticamente
        }

        // Crear el objeto FormData para enviar por Ajax
        var formData = new FormData();
        formData.append('Cedula', cedula);
        formData.append('IBC', ibc);
        formData.append('Fechacontrato', fechaContrato);
        formData.append('Codigodiagnostico', diagnostico);
        formData.append('inipro', inipro);
        formData.append('Tipoincapacidad', tipoinc);
        formData.append('Fechainicio', fechaInicio);
        formData.append('Totaldias', totalDias);
        formData.append('Observaciones', observaciones);
        formData.append('Archivo', archivo);

         // Imprimir los datos en la consola antes de enviar
         for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }

        // Enviar los datos al servidor mediante Ajax
        $.ajax({
            url: '../controller/ctr_registrar_incapacidad.php', // URL del controlador
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Incapacidad registrada con éxito AJAX');
            },
            error: function(xhr, status, error) {
                alert('Error al registrar la incapacidad: ' + error);
            }
        });
    });

    // Incorporar los manejadores de eventos para el cálculo automático de los días
    document.getElementById('Tipoincapacidad').addEventListener('change', calcularDias);
    document.getElementById('Fechainicio').addEventListener('change', calcularDias);
    document.getElementById('Fechacontrato').addEventListener('change', calcularDias);
});
