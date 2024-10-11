<?php
require_once '../model/conexion.php';
require_once '../model/val_guardar_persona_duplicada.php';

$conexion = new Conexion();
$conexion = $conexion->conMysql();


$ceduladuplicar = $_POST['CedulaDuplicar'];
$nombreduplicar = $_POST['NombreDuplicar'];
$EpsDuplicar = $_POST['EpsDuplicar'];
$EmpresaDuplicar = $_POST['EmpresaDuplicar'];
$AreaTrabajoDuplicar = $_POST['AreaTrabajoDuplicar'];
$FechacontratoDuplicar = $_POST['FechacontratoDuplicar'];

$personaduplicada = new Val_guardar_persona_duplicada();
$personaduplicada->cambiarEstadoPersona($ceduladuplicar, $conexion);
$personaduplicada->guardarPersonaDuplicada($ceduladuplicar, $nombreduplicar, $EpsDuplicar, $EmpresaDuplicar, $AreaTrabajoDuplicar, $FechacontratoDuplicar, $conexion);