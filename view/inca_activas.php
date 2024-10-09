<?php include '../model/consu_inca_activas.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/inca_activas.css">
    <!-- --- font awesome --- -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Inca_Activas</title>
</head>
<body>
    <div class="iconretr"> <a href="index.php"><i class='bx bxs-chevrons-left'></i> </a></div>
</div>
    <div class="container" style="margin-top: 4%;padding: 5px">
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <h1>INCAPACIDADES ACTIVAS</h1>
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Area T</th>
                    <th>Ibc</th>
                    <th>Fecha Inicio</th>
                    <th>Días</th>
                    <th>Incapacidad</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($personas)) : ?>
                    <?php foreach ($personas as $persona) : ?>
                        <tr>
                            <td><?= htmlspecialchars($persona['Cedula']); ?></td>
                            <td><?= htmlspecialchars($persona['Nombre']); ?></td>
                            <td><?= htmlspecialchars($persona['Areatrabajo']); ?></td>
                            <td><?= htmlspecialchars($persona['Ibc']); ?></td>
                            <td><?= htmlspecialchars($persona['Fechainicio']); ?></td>
                            <td><?= htmlspecialchars($persona['Totaldias']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No se encontraron registros</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
       
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../controller/js/inca_activas.js"></script>
</body>
</html>
