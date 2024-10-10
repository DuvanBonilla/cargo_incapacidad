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
        $stmt = $conexion->prepare('SELECT * FROM tbl_personas WHERE Cedula = ?');
        $stmt->bind_param('s', $cedula);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $this->mostrarMensaje('error', 'La persona ya existe en la Base de datos');
            return true;
        } else {
            return false;
        }
    }

    public function AggIncapacidad($cedula, $nombre, $eps, $empresa, $area, $fechaContrato, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $Totaldias, $observaciones, $archivo)
    {
        if (!empty($cedula) && !empty($nombre) && !empty($eps) && !empty($empresa) && !empty($area) && !empty($fechaContrato) && !empty($ibc) && !empty($diagnostico) && !empty($inipro) && !empty($tipoinc) && !empty($fechaInicio) && !empty($Totaldias) && !empty($observaciones) && !empty($archivo)) {

            /*Convertir a Integer los valores tipo select*/
            $inipro = (int) $inipro;
            $tipoinc = (int) $tipoinc;
            // Prepara la consulta SQL con la fecha final calculada usando DATE_ADD
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
                        $stmt = $this->conexion->prepare("INSERT INTO tbl_incapacidades_pagas(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Valordevuelto, Observaciones, Archivo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");
                        $stmt->bind_param("sisiissiiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasCobrar, $Valorpagado, $Valordevuelto, $observaciones, $archivo);
                        $stmt->execute();
                        exit();
                    } else {
                        echo "<script>console.log('más de 2 días');</script>";
                        $diasIncapacidad = $Totaldias - 2;
                        $Valorpagado = ($ValordiaE * $diasIncapacidad);
                        $diasCobrar = $Totaldias;
                        $stmt = $this->conexion->prepare("INSERT INTO tbl_det_incapacidadper(Cedula, Ibc, 
                        Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, 
                        Fechafinal, Totaldias, Diascobrar, Valorpagado, Observaciones, Archivo) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

                        // Bind de los parámetros ajustado correctamente (9 en total)
                        $stmt->bind_param("sisiissiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasIncapacidad, $Valorpagado, $observaciones, $archivo);
                        $stmt->execute();
                        exit();
                    }
                }

                //         }
                //     }
                // }
                elseif ($tipoinc == 3) {/*Sí es de tipo AT */
                    if ($Totaldias == 1) {
                        echo "<script>console.log('es más de 2 días');</script>";
                        $diasIncapacidad = $Totaldias;
                        $Valorpagado = ($ValordiaE * $diasIncapacidad);
                        $diasCobrar = $diasIncapacidad;
                        $Valordevuelto = $Valorpagado;
                        $stmt = $this->conexion->prepare("INSERT INTO tbl_incapacidades_pagas(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Valordevuelto, Observaciones, Archivo) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");

                        // Bind de los parámetros ajustado correctamente (9 en total)
                        $stmt->bind_param("sisiissiiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasCobrar, $Valorpagado, $Valordevuelto, $observaciones, $archivo);
                        if ($stmt->execute()) {
                            $this->AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato);
                            $this->mostrarMensaje('success', 'Persona e incapacidad registrada');
                        } else {
                            $this->mostrarMensaje('error', 'Error al almacenar los datos');
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
                        if ($stmt->execute()) {
                            $this->AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato);
                            $this->mostrarMensaje('success', 'Persona e incapacidad registrada');
                        } else {
                            $this->mostrarMensaje('error', 'Error al almacenar los datos');
                        }
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
                        $this->AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato);
                        $this->mostrarMensaje('success', 'Persona e incapacidad registrada');
                    } else {
                        $this->mostrarMensaje('error', 'Error al almacenar los datos');
                    }
                } elseif ($tipoinc == 5) { /*Sí es de tipo LP */
                    $diasIncapacidad = $Totaldias;
                    $Valorpagado = ($ValordiaE * $diasIncapacidad);
                    $diasCobrar = $Totaldias;

                    $stmt = $this->conexion->prepare("INSERT INTO tbl_det_incapacidadper(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Observaciones, Archivo) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

                    $stmt->bind_param("sisiissiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasIncapacidad, $Valorpagado, $observaciones, $archivo);
                    if ($stmt->execute()) {
                        $this->AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato);
                        $this->mostrarMensaje('success', 'Persona e incapacidad registrada');
                    } else {
                        echo "Error: " . $stmt->error; // Muestra el error de la consulta
                        $this->mostrarMensaje('error', 'Error al almacenar los datos');
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
                $stmt->execute();
                if ($stmt->execute()) {
                    $this->AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato);
                    $this->mostrarMensaje('success', 'Persona e incapacidad registrada');
                    exit;
                } else {
                    $this->mostrarMensaje('error', 'Error al almacenar los datos');
                }
            }
        } else {
            $this->mostrarMensaje('error', 'Diligencie todos los campos');
            exit;
        }
    }

    public function AggIncapacidad_pagas($cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasCobrar, $Valorpagado, $Valordevuelto, $observaciones, $archivo)
    {
        $stmt = $this->conexion->prepare("INSERT INTO tbl_incapacidades_pagas(Cedula, Ibc, Codigodiagnostico, Inicialprorroga, Tipoincapacidad, Fechainicio, Fechafinal, Totaldias, Diascobrar, Valorpagado, Valordevuelto, Observaciones, Archivo) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");
        $stmt->bind_param("sisiissiiiiss", $cedula, $ibc, $diagnostico, $inipro, $tipoinc, $fechaInicio, $fechafinal, $Totaldias, $diasCobrar, $Valorpagado, $Valordevuelto, $observaciones, $archivo);
        return $stmt->execute();
    }

    public function AggPersona($cedula, $nombre, $eps, $empresa, $area, $fechaContrato)
    {
        $estadoActivo = 1;
        $stmt = $this->conexion->prepare("INSERT INTO tbl_personas(Cedula, Nombre, Estado, Eps, Empresa, Areatrabajo, Fechacontrato) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiiiis", $cedula, $nombre, $estadoActivo, $eps, $empresa, $area, $fechaContrato);
        // return $stmt->execute();

        if ($stmt->execute()) {
            return $this; // O un objeto adecuado
        } else {
            return false; // Esto debe cambiar
        }
        //    if ($stmt->execute()) {
        //             $this->mostrarMensaje('success', 'Persona e incapacidad registrada');

        //         } else {
        //             $this->mostrarMensaje('error', 'Diligencie todos los campos');

        //         }
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
                timer: 50000
            }).then(() => {
                location.assign('../view/index.php');
            });
        });
        </script>";
    }
}
