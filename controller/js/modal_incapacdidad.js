document.getElementById('nextStep').addEventListener('click', function () {
    document.getElementById('step1').style.display = 'none'; // Oculta el paso 1
    document.getElementById('step2').style.display = 'block'; // Muestra el paso 2
});

// Volver al paso anterior
document.getElementById('prevStep').addEventListener('click', function () {
    document.getElementById('step2').style.display = 'none'; // Oculta el paso 2
    document.getElementById('step1').style.display = 'block'; // Muestra el paso 1
});

// Reiniciar el modal al cerrarlo para que vuelva abrirse desde el primer paso
var modal = document.getElementById('Registrar_incapacidad');
modal.addEventListener('hidden.bs.modal', function () {
    document.getElementById('step1').style.display = 'block'; // Muestra el paso 1
    document.getElementById('step2').style.display = 'none'; // Oculta el paso 2
    modal.querySelector('form').reset(); // Reinicia el formulario
});