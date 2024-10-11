<?php

class ValRegister
{

    public function registrarUsuario($nombre, $cedula, $sucursal, $usuario, $contrasena, $conexion)
    {
        // Validar que todos los campos requeridos no estén vacíos
        if (!empty($cedula) && !empty($nombre) && !empty($sucursal) && !empty($usuario) && !empty($contrasena)) {
            $password_hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = "INSERT INTO tbl_usuarios (Cedula, Nombre, Sucursal, Usuario, Contrasena) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($stmt);

            // Asegúrate de usar los tipos correctos
            $stmt->bind_param('issss', $cedula, $nombre, $sucursal, $usuario, $password_hash);

            if ($stmt->execute()) {
                $stmt->close(); // Cerrar el statement antes de retornar
                return true; // Retorna true si la inserción fue exitosa
            } else {
                $error_message = "Error al registrar el usuario: " . $stmt->error;
                $stmt->close(); // Cerrar el statement antes de retornar
                return $error_message; // Retorna un mensaje de error
            }
        } else {
            return "faltan datos en los campos"; // Retorna false si algún campo está vacío
        }
    }

}