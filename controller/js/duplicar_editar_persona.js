$(document).ready(function () {
    $('.btn-duplicar').on('click', function () {
        // Obtener los datos de los atributos del botón
        var cedula = $(this).data('cedula');
        var nombre = $(this).data('nombre');
        var eps = $(this).data('eps');
        var empresa = $(this).data('empresa');
        var area = $(this).data('area');
        var fecha = $(this).data('fecha');

        // Colocar los valores en los inputs del modal
        $('#CedulaDuplicar').val(cedula);
        $('#NombreDuplicar').val(nombre);
        $('input[name="EpsDuplicar"]').val(eps);
        $('input[name="EmpresaDuplicar"]').val(empresa);
        $('input[name="AreaTrabajoDuplicar"]').val(area);
        $('#FechacontratoDuplicar').val(fecha);
    });
});