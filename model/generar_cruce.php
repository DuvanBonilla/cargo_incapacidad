<?php
require_once __DIR__ . '../../vendor/autoload.php'; 
include 'conexion.php';   

use PhpOffice\PhpSpreadsheet\IOFactory;

$conexionObj = new Conexion();
$conexion = $conexionObj->conMysql();

if (isset($_FILES['archivo_excel']['tmp_name'])) {
    $archivo = $_FILES['archivo_excel']['tmp_name'];

    // Cargar el archivo Excel
    $documento = IOFactory::load($archivo);
    $hojaActual = $documento->getSheet(0); // Tomar la primera hoja
    $numFilas = $hojaActual->getHighestRow(); // Número de filas en la hoja

    // Verificar que hay al menos una fila de datos
    if ($numFilas < 2) {
        echo "El archivo no tiene suficientes datos para procesar.<br>";
        exit; // Salir si no hay datos
    }

    // Recorrer cada fila del archivo Excel, comenzando desde la fila 2
    for ($i = 2; $i <= $numFilas; $i++) { // Suponiendo que la primera fila es de encabezado
        $cedula = $hojaActual->getCell("A" . $i)->getValue();
        $fechaInicioExcel = $hojaActual->getCell("B" . $i)->getFormattedValue();
        $diasExcel = $hojaActual->getCell("C" . $i)->getValue();
        $valorExcel = $hojaActual->getCell("D" . $i)->getValue();

        // Consultar la base de datos para encontrar coincidencias por cédula y fecha de inicio
        $sqlConsulta = "SELECT * FROM tbl_det_incapacidadper WHERE Cedula = '$cedula' AND Fechainicio = '$fechaInicioExcel'";
        $resultado = $conexion->query($sqlConsulta);

        if ($resultado) {
            if ($resultado->num_rows > 0) {
                // Si se encuentra coincidencia, obtener los datos
                $fila = $resultado->fetch_assoc();
                $ibc = $fila['Ibc'];
                $codigoDiagnostico = $fila['Codigodiagnostico'];
                $inicialProrroga = $fila['Inicialprorroga'];
                $tipoIncapacidad = $fila['Tipoincapacidad'];
                $fechaInicio = $fila['Fechainicio'];
                $fechaFinal = $fila['Fechafinal'];
                $diasBD = $fila['Dias'];
                $observacion = $fila['Observaciones'];
                $archivo = $fila['Archivo'];

                // Realizar los cálculos
                $valorPagado = ($ibc / 30) * $diasBD; // Cálculo de valor pagado
                $valorDevuelto = $valorPagado - $valorExcel; // Cálculo de valor devuelto

                // Insertar los datos en la tabla tbl_incapacidades_pagas
                $sqlInsertar = "INSERT INTO tbl_incapacidades_pagas 
                    (Cedula, ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Dias, Valorpagado, Valordevuelto, archivo) 
                    VALUES ('$cedula','$ibc', '$codigoDiagnostico','$inicialProrroga','$tipoIncapacidad','$fechaInicio', '$fechaFinal', '$diasBD','$valorPagado', '$valorDevuelto','$archivo')";
                
                if (!$conexion->query($sqlInsertar)) {
                    echo "Error al insertar en tbl_incapacidades_pagas: " . $conexion->error . "<br>";
                } else {
                    // Eliminar el registro original de tbl_det_personas
                    $sqlEliminar = "DELETE FROM tbl_det_incapacidadper WHERE Cedula = '$cedula' AND Fechainicio = '$fechaInicio'";
                    if (!$conexion->query($sqlEliminar)) {
                        echo "Error al eliminar de tbl_det_personas: " . $conexion->error . "<br>";
                    }
                }
            } else {
                echo "No se encontró coincidencia para cédula $cedula y fecha $fechaInicioExcel<br>";
            }
        } else {
            echo "Error en la consulta: " . $conexion->error . "<br>";
        }
    }    
    echo "Proceso completado exitosamente.";
    
    $conexionObj->cerrarConexion($conexion);
} else {
    echo "No se ha recibido ningún archivo.";
}
