<?php
class EditarPersona
{
    public function editarPersona($Cedula, $Nombre, $Eps, $Empresa, $AreaTrabajo, $Fechacontrato, $conexion)
    {
        if (isset($Cedula) && isset($Nombre) && isset($Eps) && isset($Empresa) && isset($AreaTrabajo) && isset($Fechacontrato)) {
            $sql = "UPDATE tbl_personas SET Cedula = ?, Nombre = ?, Eps = ?, Empresa = ?, Areatrabajo = ?, Fechacontrato = ? WHERE Cedula = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssiiiss", $Cedula, $Nombre, $Eps, $Empresa, $AreaTrabajo, $Fechacontrato, $Cedula);
            if ($stmt->execute()) {
                header("location:../view/base_datos.php");
                return true;
            } else {
                header("location:../view/base_datos.php");
                return false;
            }
        } else {
            header("location:../view/base_datos.php");
        }
    }
}