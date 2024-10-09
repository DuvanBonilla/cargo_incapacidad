<?php
require_once '../model/conexion.php';
require_once '../model/editar_persona.php';

$conexion = new Conexion();
$conexion = $conexion->conMysql();

$Cedula = $_POST['Cedula'];
$Nombre = $_POST['Nombre'];
$Eps = $_POST['Eps'];
$Empresa = $_POST['Empresa'];
$AreaTrabajo = $_POST['AreaTrabajo'];
$Fechacontrato = $_POST['Fechacontrato'];


$editar_persona = new EditarPersona();
$result = $editar_persona->editarPersona($Cedula, $Nombre, $Eps, $Empresa, $AreaTrabajo, $Fechacontrato, $conexion);