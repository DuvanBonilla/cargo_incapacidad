<?php
session_start();
require_once("../model/conexion.php");
require_once("../model/val_incapacidades.php");
// --------------------------------------------------------
$cedula = $_POST["Cedula"];
$nombre = $_POST["Nombre"];
$eps = $_POST["Eps"];
$empresa = $_POST["Empresa"];
$area = $_POST["Area"];
$fechaContrato = $_POST["Fechacontrato"];
$ibc = $_POST["IBC"];
$diagnostico = $_POST["Codigodiagnostico"];
$inipro = $_POST["inipro"];
$tipoinc = $_POST["Tipoincapacidad"];
$fechaInicio = $_POST["Fechainicio"];
$Totaldias = $_POST["Totaldias"];
$observaciones = $_POST["Observaciones"];
$archivo = $_POST["Archivo"];

// --------------------------------------------------------
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
// --------------------------------------------------------
$incapacidad = new UsuarioEIncapacidad ($conMysql);
// Si la persona NO existe, entonces primero la agregamos
if (!$incapacidad->ExistPersona($cedula, $conexion)) {
    $incapacidad->AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato);
}
// Si la persona existe o se agregó correctamente, agregamos la incapacidad
if ($incapacidad->AggIncapacidad($cedula, $nombre, $eps, $empresa, $area, $fechaContrato, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $Totaldias, $observaciones, $archivo)) {
    echo "Incapacidad registrada con éxito.";
} else {
    echo "Error al registrar la incapacidad.";
}
