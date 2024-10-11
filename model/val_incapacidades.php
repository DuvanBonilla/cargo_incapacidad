<?php
class UsuarioEIncapacidad
{
    private $conexion;

    // Constructor para recibir la conexión a la base de datos
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function ExistPersona($cedula, $conexion)
    {
        $stmt = $this->conexion->prepare('SELECT * FROM tbl_personas WHERE Cedula = ?');
        $stmt->bind_param('s', $cedula);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $this->mostrarMensaje('error', 'La persona ya existe en la Base de datos');
            return true;
        } else {
            $this->mostrarMensaje('success', 'La persona guardada en la Bd');
            return false;
        }
    }

    public function AggIncapacidad($cedula, $nombre, $eps, $empresa, $area, $fechaContrato, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $Totaldias, $observaciones, $archivo)
    {
        if (!empty($cedula) && !empty($nombre) && !empty($eps) && !empty($empresa)  && !empty($area) && !empty($fechaContrato) && !empty($ibc) && !empty($diagnostico) && !empty($inipro) && !empty($tipoinc) && !empty($fechaInicio) && !empty($Totaldias) ) {

            if (!$this->ExistPersona($cedula, $this->conexion)) {
                $this->mostrarMensaje('error', 'La persona ya existe en la Base de datos');
                return false;
            }
            /*Convertir a Integer los valores tipo select*/
            $inipro = (int)$inipro;
            $tipoinc = (int)$tipoinc;

            $porcentaje = 100 * 0.66666; /*66,666% */
            $valordia = $ibc / 30;
            $fechafinal = date('Y-m-d', strtotime($fechaInicio . "+ $Totaldias days"));

            $ValordiaE = ($valordia * $porcentaje);

            if ($inipro == 1) {
                echo "<script>console.log('Es de tipo Inicial');</script>";
                if ($tipoinc == 1 || $tipoinc == 2) {  /*Sí es de tipo EG ó EG-T */
                    if ($Totaldias == 2) {
                        $diasIncapacidad = $Totaldias;
                        $Valorpagado = ($ValordiaE * $diasIncapacidad);
                        $diasCobrar = $Totaldias;
                        $Valordevuelto = $Valorpagado;
                        $stmt = $this->conexion->prepare("INSERT INTO tbl_incapacidades_pagas(Cedula, FechaContrato, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Valordevuelto, Observaciones, Archivo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssisiissiiiiss", $cedula, $fechaContrato, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasCobrar, $Valorpagado, $Valordevuelto, $observaciones, $archivo);
                        if ($stmt->execute()) {
                            $this->mostrarMensaje('success', 'Exito en Incapacidades Pagas');
                            return true;
                        } else {
                            $this->mostrarMensaje('error', 'Error en Incapacidades Pagas');
                            return false;
                        }
                    } else {
                        echo "<script>console.log('más de 2 días');</script>";
                        $diasIncapacidad = $Totaldias - 2;
                        $Valorpagado = ($ValordiaE * $diasIncapacidad);
                        $diasCobrar = $Totaldias;
                        $stmt = $this->conexion->prepare("INSERT INTO tbl_det_incapacidadper(Cedula, FechaContrato, Ibc, 
                        Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, 
                        Fechafinal, Totaldias, Diascobrar, Valorpagado, Observaciones, Archivo) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        // Bind de los parámetros ajustado correctamente (9 en total)
                        $stmt->bind_param("ssisiissiiiss", $cedula, $fechaContrato, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasIncapacidad, $Valorpagado, $observaciones, $archivo);
                        if ($stmt->execute()) {
                            $this->mostrarMensaje('success', 'Exito en Incapacidades Pagas');
                            return true;
                        } else {
                            $this->mostrarMensaje('error', 'Error en Incapacidades Pagas');
                            return false;
                        }
                    }
                } 
                
                elseif ($tipoinc == 3) {/*Sí es de tipo AT */
                    if ($Totaldias == 1) {
                        echo "<script>console.log('es más de 2 días');</script>";
                        $diasIncapacidad = $Totaldias;
                        $Valorpagado = ($ValordiaE * $diasIncapacidad);
                        $diasCobrar = $diasIncapacidad;
                        $Valordevuelto = $Valorpagado;
                        $stmt = $this->conexion->prepare("INSERT INTO tbl_incapacidades_pagas(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Valordevuelto, Observaciones, Archivo) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");
                        $stmt->bind_param("sisiissiiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasCobrar, $Valorpagado, $Valordevuelto, $observaciones, $archivo);
                        if ($stmt->execute()) {
                            $this->mostrarMensaje('success', 'Exito en Incapacidades por Cobrar de tipo AT');
                            return true;
                        } else {
                            $this->mostrarMensaje('error', 'Error en Incapacidades por Cobrar de tipo AT');
                            return false;
                        }
                    } else {
                        echo "<script>console.log('más de 2 días');</script>";
                        $diasIncapacidad = $Totaldias - 1;
                        $Valorpagado = ($ValordiaE * $diasIncapacidad);
                        $diasCobrar = $Totaldias;

                        $stmt = $this->conexion->prepare("INSERT INTO tbl_det_incapacidadper(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Observaciones, Archivo) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

                        // Bind de los parámetros ajustado correctamente (9 en total)
                        $stmt->bind_param("sisiissiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasIncapacidad, $Valorpagado, $observaciones, $archivo);
                        $stmt->execute();
                        exit();
                    }
                } elseif ($tipoinc == 4) { /*Sí es de tipo LM */
                    $diasIncapacidad = $Totaldias;
                    $Valorpagado = ($ValordiaE * $diasIncapacidad);
                    $diasCobrar = $Totaldias;

                    $stmt = $this->conexion->prepare("INSERT INTO tbl_det_incapacidadper(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Observaciones, Archivo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

                    // Bind de los parámetros ajustado correctamente (9 en total)
                    $stmt->bind_param("sisiissiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasIncapacidad, $Valorpagado, $observaciones, $archivo);
                    if ($stmt->execute()) {
                        $this->mostrarMensaje('success', 'Exito en Incapacidades por Cobrar de tipo LM');
                        return true;
                    } else {
                        $this->mostrarMensaje('error', 'Error en Incapacidades por Cobrar de tipo LM');
                        return false;
                    }
                } elseif ($tipoinc == 5) { /*Sí es de tipo LP */
                    $diasIncapacidad = $Totaldias;
                    $Valorpagado = ($ValordiaE * $diasIncapacidad);
                    $diasCobrar = $Totaldias;

                    $stmt = $this->conexion->prepare("INSERT INTO tbl_det_incapacidadper(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Observaciones, Archivo) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

                    $stmt->bind_param("sisiissiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasIncapacidad, $Valorpagado, $observaciones, $archivo);
                    if ($stmt->execute()) {
                        $this->mostrarMensaje('success', 'Exito en Incapacidades por Cobrar de tipo LP');
                        return true;
                    } else {
                        $this->mostrarMensaje('error', 'Error en Incapacidades por Cobrar de tipo LP');
                        return false;
                    }
                }
            } else {
                echo "<script>console.log('Es de tipo Prorroga');</script>";
                $diasIncapacidad = $Totaldias;
                $Valorpagado = ($ValordiaE * $diasIncapacidad);
                $diasCobrar = $Totaldias;
                $stmt = $this->conexion->prepare("INSERT INTO tbl_det_incapacidadper(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Observaciones, Archivo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
                $stmt->bind_param("sisiissiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasIncapacidad, $Valorpagado, $observaciones, $archivo);
                if ($stmt->execute()) {
                    $this->mostrarMensaje('success', 'Exito en Incapacidades tipo Prorroga');
                    return true;
                } else {
                    $this->mostrarMensaje('error', 'Error en Incapacidades tipo Prorroga');
                    return false;
                }
            }
        } else {
            $this->mostrarMensaje('error', 'Diligencie todos los campos');
            return false;
        }
    }

    public function AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato)
    {
        $stmt = $this->conexion->prepare("INSERT INTO tbl_personas(Cedula, Nombre, Eps, Empresa, Areatrabajo, Fechacontrato) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiiis", $cedula, $nombre, $eps, $empresa, $area, $fechaContrato);
        // return $stmt->execute();
        if ($stmt->execute()) {
            $this->mostrarMensaje('success', 'Error al agregar persona.');
            return true; 
        } else {
            $this->mostrarMensaje('error', 'Error al agregar persona.');
            return false; 
        }
    }


    public function mostrarMensaje($tipo, $titulo)
    {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '$tipo',
                title: '$titulo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 5000
            }).then(() => {
                location.assign('../view/index.php');
            });
        });
        </script>";
    }
}