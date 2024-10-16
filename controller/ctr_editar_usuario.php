<?php
require_once '../model/conexion.php';
require_once '../model/editar_usuario.php';

$conexion = new Conexion();
$conexion = $conexion->conMysql();

// Obtener los datos del formulario
$Cedula = $_POST['Cedula'];
$Nombre = $_POST['Nombre'];
$Sucursal = $_POST['Sucursal'];
$Usuario = $_POST['UsuarioInput'];
$Contrasena = $_POST['Contrasena'];

// Verificar si se ha proporcionado una nueva contraseña para actualizarla
if (!empty($Contrasena)) {
    // Hashear la contraseña antes de enviarla al modelo
    $hashedPassword = password_hash($Contrasena, PASSWORD_DEFAULT);
} else {
    $hashedPassword = null; // Si no se ha proporcionado una nueva contraseña, puedes dejarla nula
}

// Crear instancia de la clase EditarUsuario
$editar_usuario = new EditarUsuario();
$result = $editar_usuario->editarUsuario($Cedula, $Nombre, $Sucursal, $Usuario, $hashedPassword, $conexion);
 