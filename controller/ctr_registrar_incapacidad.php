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
$incapacidad = new UsuarioEIncapacidad($conMysql);
try {
    if (!$incapacidad->ExistPersona($cedula, $conMysql)) {
        $resultadoPersona = $incapacidad->AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato);
        if (method_exists($resultadoPersona, 'mostrarMensaje')) {
            $resultadoPersona->mostrarMensaje('success', 'Persona e incapacidad registrada');
        } else {
            $resultadoPersona->mostrarMensaje('error', 'El objeto no tiene el método mostrarMensaje');
        }
    }
    // Una vez que la persona está registrada (o ya existía), intentar agregar la incapacidad
    $resultadoIncapacidad = $incapacidad->AggIncapacidad($cedula, $nombre, $eps, $empresa, $area, $fechaContrato, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $Totaldias, $observaciones, $archivo);
    if ($resultadoIncapacidad) {
        echo "Incapacidad registrada para la persona: $cedula";
    } else {
        throw new Exception('Error al almacenar los datos de incapacidad.');
    }
} catch (Exception $e) {
    // Captura cualquier excepción y muestra el mensaje de error
    $incapacidad->mostrarMensaje('error', $e->getMessage());
}



// $incapacidad->ExistPersona($cedula,$conMysql);
// // $incapacidad->AggPersona($cedula, $nombre,$eps, $empresa, $area, $fechaContrato);
// $incapacidad->AggIncapacidad($cedula,$nombre,$eps, $empresa, $area, $fechaContrato, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $Totaldias, $observaciones, $archivo);

// --------------------------------------------------------
