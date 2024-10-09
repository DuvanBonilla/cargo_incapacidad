$(document).ready(function () {
    $('.btn-edit').on('click', function () {
        // Obtener los datos de los atributos del botón
        var cedula = $(this).data('cedula');
        var nombre = $(this).data('nombre');
        var eps = $(this).data('eps');
        var empresa = $(this).data('empresa');
        var area = $(this).data('area');
        var fecha = $(this).data('fecha');

        // Colocar los valores en los inputs del modal
        $('#Cedula').val(cedula);
        $('#Nombre').val(nombre);
        $('input[name="Eps"]').val(eps);
        $('input[name="Empresa"]').val(empresa);
        $('input[name="AreaTrabajo"]').val(area);
        $('#Fechacontrato').val(fecha);
    });
});