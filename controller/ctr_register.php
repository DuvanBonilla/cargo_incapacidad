<?php

require_once ("../model/conexion.php");
require_once ("../model/val_register.php");

$conexion = new Conexion();
$con = $conexion->conMysql();

$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$sucursal = $_POST['sucursal'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$val_register = new ValRegister();
$result = $val_register->registrarUsuario($nombre, $cedula, $sucursal, $usuario, $contrasena, $con);

if ($result === true ){
    header("location:../view/login.php");
}else{
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error al registrar el usuario',
            confirmButtonColor: '#D63030',
            confirmButtonText: 'OK',
            timer: 6000
        }).then(() => {
            location.assign('../view/register.php');
        });
    });
    </script>";
exit();
}
