<?php
class EditarUsuario
{
    public function editarUsuario($Cedula, $Nombre, $Sucursal, $Usuario, $Contrasena, $conexion)
    {
      
        if ($Contrasena !== null) {
            // Si se ha proporcionado una nueva contraseña, actualizamos todo
            $sql = "UPDATE tbl_usuarios SET Nombre = ?, Sucursal = ?, Usuario = ?, Contrasena = ? WHERE Cedula = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sisss", $Nombre, $Sucursal, $Usuario, $Contrasena, $Cedula);
        } else {
            // Si no se ha proporcionado una nueva contraseña, omitimos el campo Contrasena
            $sql = "UPDATE tbl_usuarios SET Nombre = ?, Sucursal = ?, Usuario = ? WHERE Cedula = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("siss", $Nombre, $Sucursal, $Usuario, $Cedula);
        }

        // Ejecutar la consulta y verificar el resultado
        if ($stmt->execute()) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Registro editado',
                    confirmButtonColor: '#3049D6FF',
                    confirmButtonText: 'OK',
                    timer: 6000
                }).then(() => {
                    location.assign('../view/usuarios.php');
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
                        location.assign('../view/usuarios.php');
                    });
                });
                </script>";
            exit();
        }
    }
}
