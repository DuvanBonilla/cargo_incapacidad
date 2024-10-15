<?php
include_once 'conexion.php';

class Usuarios
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function ConsuUsuarios()
    {
        $consulta = "
            SELECT 
                u.Cedula,
                u.Nombre,
                s.Descripcion AS Sucursal,
                u.Usuario,
                u.Contrasena
            FROM 
                tbl_usuarios u
            INNER JOIN 
                tbl_sucursal s ON u.Sucursal = s.IdSucursal 
            ORDER BY 
                u.Nombre ASC
        ";

        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: ' . mysqli_error($this->conexion));
        }
         // Contador para ver cuántos registros se recuperan
    $totalRegistros = mysqli_num_rows($resultado);
    echo "Total de usuarios encontrados: " . $totalRegistros; // Depuración


        $usuarios = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $usuarios[] = $fila;
        }

        return $usuarios;
    }
}

$conexion = (new Conexion())->conMysql();

$usuarioClass = new Usuarios($conexion);
$usuarios = $usuarioClass->ConsuUsuarios();

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

return $usuarios;
