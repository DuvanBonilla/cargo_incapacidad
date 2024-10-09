<?php
include 'conexion.php';

class Personas
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function ConsuPersonas()
    {
        $consulta = "
            SELECT 
                p.Cedula,
                p.Nombre,
                e.Descripcion AS Eps,       
                emp.Descripcion AS Empresa,  
                at.Descripcion AS Areatrabajo,
                p.Fechacontrato
            FROM 
                tbl_personas p
            INNER JOIN 
                tbl_eps e ON p.Eps = e.IdEps
            INNER JOIN 
                tbl_empresa emp ON p.Empresa = emp.IdEmpresa
            INNER JOIN 
                tbl_areatrabajo at ON p.Areatrabajo = at.IdArea
            ";

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
$personas = $persoClass->ConsuPersonas();

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

return $personas;
