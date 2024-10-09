
<?php
require_once ("../model/conexion.php");

$conexion = new Conexion();
$conMysql = $conexion->conMysql();


$stmt = $conMysql->prepare("SELECT * FROM tbl_eps");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0){
    while($fila = mysqli_fetch_assoc($result)){
        $id = $fila["IdEps"];
        $rol = $fila["Descripcion"];
        ?>
        <option value="<?php echo "$id;" ?>"> <?php echo "$rol"; ?></option>
        <?php

    }
}


?>

