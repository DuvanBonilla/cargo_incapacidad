$(document).ready(function () {
    // Capturar el evento de clic en el botón
    $('.btn-edit').on('click', function () {
        // Obtener la cédula del botón
        const cedula = $(this).data('cedula');

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../../cargo_incapacidad/model/consu_usuarios.php', // Asegúrate de poner la ruta correcta
            type: 'POST',
            data: { cedula: cedula },
            dataType: 'json', // Asegúrate de que la respuesta se interprete como JSON
            success: function (response) {
                // Manejo de la respuesta del servidor
                console.log(response); // Muestra la respuesta en la consola
  
                // Verifica si hay resultados
                if (response.usuario) {
                    const usuario = response.usuario; // Accede al objeto usuario

                    // Llenar los campos del formulario con los datos recibidos
                    $('#Cedula').val(usuario.Cedula);
                    $('#Nombre').val(usuario.Nombre);
                    $('#UsuarioInput').val(usuario.Usuario);
                    $('#Contrasena').val(usuario.Contrasena);

                    
                    // Llenar los selectores de Sucursal (si es necesario)
                    populateSelect(response.sucursal, 'Sucursal');

                    console.log(response.sucursal); // Verifica la lista de sucursales
                    
                    // Asignar valor seleccionado en el selector de Sucursal
                    $('#Sucursal').val(usuario.Sucursal); // Seleccionar la sucursal correspondiente
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
function populateSelect(sucursalList) {
    const selectElement = $('#Sucursal');
    selectElement.empty(); // Limpiar el select actual
    selectElement.append(new Option('Seleccione Sucursal', '')); // Opción por defecto
    sucursalList.forEach(sucursal => {
        selectElement.append(new Option(sucursal.Descripcion, sucursal.IdSucursal)); // Agrega la opción de sucursal
    });
}

