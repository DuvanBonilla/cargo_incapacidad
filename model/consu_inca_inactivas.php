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
        $consulta = "SELECT p.*, i.Ibc, i.Fechainicio, i.Totaldias, i.Diascobrar, i.Diasdevueltos, a.Descripcion AS Areatrabajo, t.Descripcion AS Tipoi, g.Descripcion AS Inip
        FROM tbl_personas p
        INNER JOIN tbl_incapacidades_pagas i ON p.Cedula = i.Cedula 
        AND p.Fechacontrato = i.Fechacontrato
        INNER JOIN tbl_areatrabajo a ON p.Areatrabajo = a.IdArea
        INNER JOIN tbl_tipo t ON i.Tipoincapacidad = t.IdTipo
        INNER JOIN tbl_prorroga g ON i.Inicialprorroga = g.Idprorroga";

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
