<?php
include_once 'conexion.php';

// Verificar si se ha enviado la cédula
if (isset($_POST['cedula'])) {
    $cedula = $_POST['cedula'];

    class Usuarios2
    {
        private $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        // Consultar los datos de un usuario por su cédula
        public function ConsuUsuarios($cedula)
        {
            $consulta = "SELECT * FROM tbl_usuarios WHERE Cedula = '$cedula'";
            $resultado = mysqli_query($this->conexion, $consulta);

            if (!$resultado) {
                exit('Error en la consulta: ' . mysqli_error($this->conexion));
            }

            $usuario = [];
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $usuario[] = $fila;
            }

            return $usuario;
        }

        // Consultar las sucursales (si las necesitas)
        public function ConsuSucursales()
        {
            $consulta = "SELECT * FROM tbl_sucursal";
            $resultado = mysqli_query($this->conexion, $consulta);

            if (!$resultado) {
                exit('Error en la consulta: ' . mysqli_error($this->conexion));
            }

            $sucursal = [];
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $sucursal[] = $fila;
            }

            return $sucursal;
        }
    }

    // Crear conexión
    $conexion = (new Conexion())->conMysql();
    $usuarioClass = new Usuarios2($conexion);

    // Obtener la información del usuario
    $usuario = $usuarioClass->ConsuUsuarios($cedula);
    $sucursalesList = $usuarioClass->ConsuSucursales();

    // Cerrar la conexión
    (new Conexion())->cerrarConexion($conexion);

    // Devolver el resultado para el uso en el AJAX
    echo json_encode([
        'usuario' => count($usuario) > 0 ? $usuario[0] : null, // Devuelve solo el primer resultado
        'sucursal' => $sucursalesList // Lista de sucursales si es necesario
    ]);
} else {
    echo json_encode(['error' => 'No se ha recibido la cédula.']);
}
?>
