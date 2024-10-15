<?php
class EditarUsuario
{
    public function editarUsuario($Cedula, $Nombre, $Sucursal, $Usuario, $Contrasena, $conexion)
    {
        // Consulta para actualizar el usuario
        $sql = "UPDATE tbl_usuarios SET Nombre = ?, Sucursal = ?, Usuario = ?, Contrasena = ? WHERE Cedula = ?";
        $stmt = $conexion->prepare($sql);
        
        // Asociar parámetros, considerando los tipos de datos
        // Cedula es varchar(15), Nombre es varchar(50), Sucursal es int(11), Usuario es varchar(20)
        $stmt->bind_param("sisss", $Nombre, $Sucursal, $Usuario, $Contrasena, $Cedula);
        
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
