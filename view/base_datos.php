<?php
include_once '../model/consu_base_datos.php'
    ?>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..."
        crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Personal Registrado</title>
</head>

<body>
    <div class="iconretr"> <a href="index.php"><i class='bx bxs-chevrons-left'></i> </a></div>
    </div>
    <div class="container" style="margin-top: 4%;padding: 5px">
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <h1>Personal Registrado</h1>
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Eps</th>
                    <th>Empresa</th>
                    <th>Area trabajo</th>
                    <th>Fecha contrato</th>
                    <th>Editar</th>
                    <th>Duplicar</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php if (!empty($personas)): ?>
                        <?php foreach ($personas as $persona): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($persona['Cedula']); ?></strong></td>
                            <td><?= htmlspecialchars($persona['Nombre']); ?></td>
                            <td><?= htmlspecialchars($persona['Eps']); ?></td>
                            <td><?= htmlspecialchars($persona['Empresa']); ?></td>
                            <td><?= htmlspecialchars($persona['Areatrabajo']); ?></td>
                            <td><strong><?= htmlspecialchars($persona['Fechacontrato']); ?></strong></td>

                            <td>
                                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                                    data-target="#Persona" data-cedula="<?= htmlspecialchars($persona['Cedula']); ?>"
                                    data-fechacontrato="<?= htmlspecialchars($persona['Fechacontrato']); ?>">
                                    Editar <i class="fas fa-edit" style="padding:6px"></i>
                                </button>
                            </td>


                            <td>
                                <button type="button" class="btn btn-primary btn-duplicar" data-toggle="modal"
                                    data-target="#Duplicar" data-cedula="<?= htmlspecialchars($persona['Cedula']); ?>"
                                    data-fechacontratoduplicar="<?= htmlspecialchars($persona['Fechacontrato']); ?>">
                                    Duplicar
                                    <i class="bi bi-person-plus"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No se encontraron registros</td>
                    </tr>
                <?php endif; ?>
                </tr>
            </tbody>
        </table>
    </div>
    <?php include 'modal_editar_duplicar.php'; ?>
    <?php include 'modal_editar_persona.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <scrip src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></scrip t>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- colocar los datos de la persona en los inputs del modal editar persona -->


    <script src="../controller/js/duplicar_editar_persona.js"></script>
    <script src="../controller/js/inputs_editar_persona.js"></script>

</body>

</html>

<script>

</script>