<?php
include 'conexion.php';

class Personas
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function Perincapacidades()
    {
        $consulta = "SELECT p.*, i.Ibc, i.Fechainicio, i.Totaldias, a.Descripcion AS Areatrabajo
        FROM tbl_personas p
        INNER JOIN tbl_det_incapacidadper i ON p.Cedula = i.Cedula
        INNER JOIN tbl_areatrabajo a ON p.Areatrabajo = a.IdArea"; 
        
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: ' . mysqli_error($this->conexion));
        }

        $personas = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $personas[] = $fila;
        }

        return $personas; 
    }
}

$conexion = (new Conexion())->conMysql();

$persoClass = new Personas($conexion);
$personas = $persoClass->Perincapacidades();

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

return $personas;
