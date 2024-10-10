<?php


class Val_guardar_persona_duplicada
{

    public function cambiarEstadoPersona($cedula, $conexion)
    {
        $estadoActivo = 2;
        $stmt = "UPDATE tbl_personas SET Estado = ? WHERE Cedula = ?";
        $stmt = $conexion->prepare($stmt);

        $stmt->bind_param('ii', $estadoActivo, $cedula);

        if ($stmt->execute()) {
            $stmt->close();
            header("location:../view/base_datos.php");
            return true;
        }

    }

    public function guardarPersonaDuplicada($cedula, $nombre, $eps, $empresa, $area, $fecha, $conexion)
    {
        $estadoActivo = 1;
        $stmt = "INSERT INTO tbl_personas(Cedula, Nombre, Estado, Eps, Empresa, Areatrabajo, Fechacontrato) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($stmt);

        $stmt->bind_param('ssiiiis', $cedula, $nombre, $estadoActivo, $eps, $empresa, $area, $fecha);

        if ($stmt->execute()) {
            $stmt->close();
            header("location:../view/base_datos.php");
            return true;
        } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese una fecha valida',
                    showCancelButton: false,
                    confirmButtonColor: '#FF0000',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/base_datos.php');
                });
            });
            </script>";
        }
    }

}