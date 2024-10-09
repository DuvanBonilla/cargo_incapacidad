<?php
require_once ("../model/conexion.php");

$conexion = new Conexion();
$conMysql = $conexion->conMysql();

$queryProrroga= 'SELECT * FROM tbl_prorroga';

$result = mysqli_query($conMysql, $queryProrroga);

if ($result->num_rows > 0){
    while($fila = mysqli_fetch_array($result)){
        $id = (int)$fila["Idprorroga"];
        $descripcion = $fila["Descripcion"];
        ?>
            <option value="<?php echo $id; ?>"> <?php echo $descripcion; ?></option>
        <?php

    }
}
