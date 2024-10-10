<?php
include_once 'conexion.php';

// Verificar si se ha enviado la cédula
if (isset($_POST['cedula']) && isset($_POST['fechacontrato'])) {
    $cedula = $_POST['cedula'];
    $fechacontrato = $_POST['fechacontrato'];
    class Personas2
    {
        private $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function ConsuPersonass($cedula, $fechacontrato)
        {
            $consulta = "SELECT * from tbl_personas where Cedula = '$cedula' AND Fechacontrato = '$fechacontrato' ";
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

        public function ConsuEps()
        {
            $consulta = "SELECT * FROM tbl_eps";
            $resultado = mysqli_query($this->conexion, $consulta);

            if (!$resultado) {
                exit('Error en la consulta: ' . mysqli_error($this->conexion));
            }

            $eps = [];
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $eps[] = $fila;
            }
            return $eps;
        }

        public function ConsuEmpresa()
        {
            $consulta = "SELECT * FROM tbl_empresa";
            $resultado = mysqli_query($this->conexion, $consulta);
            if (!$resultado) {
                exit('Error en la consulta: ' . mysqli_error($this->conexion));
            }

            $empresa = [];
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $empresa[] = $fila;
            }
            return $empresa;
        }

        public function ConsuAreaTrabajo()
        {
            $consulta = "SELECT * FROM tbl_areatrabajo";
            $resultado = mysqli_query($this->conexion, $consulta);
            if (!$resultado) {
                exit('Error en la consulta: ' . mysqli_error($this->conexion));
            }

            $areaTrabajo = [];
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $areaTrabajo[] = $fila;
            }
            return $areaTrabajo;
        }
    }

    // Crear conexión
    $conexion = (new Conexion())->conMysql();
    $persoClass = new Personas2($conexion);

    // Obtener la información de la persona
    $personas = $persoClass->ConsuPersonass($cedula, $fechacontrato);
    $epsList = $persoClass->ConsuEps();
    $empresaList = $persoClass->ConsuEmpresa();
    $areaTrabajoList = $persoClass->ConsuAreaTrabajo();

    // Cerrar la conexión
    (new Conexion())->cerrarConexion($conexion);

    // Devolver el resultado para el uso en el AJAX
    echo json_encode([
        'persona' => count($personas) > 0 ? $personas[0] : null, // Devuelve solo el primer resultado
        'eps' => $epsList,
        'empresa' => $empresaList,
        'areaTrabajo' => $areaTrabajoList
    ]);
} else {
    echo json_encode(['error' => 'No se ha recibido la cédula.']);
}
