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

// Crear instancia de la clase EditarUsuario
$editar_usuario = new EditarUsuario();
$result = $editar_usuario->editarUsuario($Cedula, $Nombre, $Sucursal, $Usuario, $Contrasena, $conexion);
 