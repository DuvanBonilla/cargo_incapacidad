<?php
class EditarPersona
{

    public function editarPersona($Cedula, $Nombre, $Eps, $Empresa, $AreaTrabajo, $Fechacontrato, $conexion)
    {
        $sql = "UPDATE tbl_personas SET Cedula = ?, Nombre = ?, Eps = ?, Empresa = ?, Areatrabajo = ?, Fechacontrato = ? WHERE Cedula = ? AND Fechacontrato = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssiiisss", $Cedula, $Nombre, $Eps, $Empresa, $AreaTrabajo, $Fechacontrato, $Cedula, $Fechacontrato);
        if ($stmt->execute()) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'succes',
                    title: 'Registro editado',
                    confirmButtonColor: '#3049D6FF',
                    confirmButtonText: 'OK',
                    timer: 6000
                }).then(() => {
                    location.assign('../view/base_datos.php');
                });
            });
            </script>";
            exit();
        } else {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fallo al editar',
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 6000
                    }).then(() => {
                        location.assign('../view/base_datos.php');
                    });
                });
                </script>";
            exit();
        }

    }
}