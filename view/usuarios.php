<?php
include_once '../model/consu_base_usuarios.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./css/images/lor.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/inca_activas.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Usuarios Registrados</title>
</head>

<body>
    <div class="iconretr"> <a href="./index.php"><i class='bx bxs-chevrons-left'></i> </a></div>
    <div class="container" style="margin-top: 4%; padding: 5px">
        <h1>Usuarios Registrados</h1>

        <!-- Tabla con los datos de usuarios -->
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Sucursal</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($usuario['Cedula']); ?></strong></td>
                            <td><?= htmlspecialchars($usuario['Nombre']); ?></td>
                            <td><?= htmlspecialchars($usuario['Sucursal']); ?></td>
                            <td><?= htmlspecialchars($usuario['Usuario']); ?></td>
                            <td>
                                <div class="position-relative">
                                    <input type="password" value="<?= htmlspecialchars($usuario['Contrasena']); ?>" class="form-control password-field" readonly>
                                    <i class="fas fa-eye toggle-password" style="cursor: pointer; position: absolute; top: 50%; right: 10px; transform: translateY(-50%); color: blue;" onclick="togglePassword(this)"></i>
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                                    data-target="#Usuario" data-cedula="<?= htmlspecialchars($usuario['Cedula']); ?>">
                                    Editar <i class="fas fa-edit" style="padding:6px"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No se encontraron registros</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="register.php" class="btn btn-success mb-3">
            Crear nuevo usuario <i class="fas fa-user"></i>
        </a>


    </div>

    <?php include 'modal_editar_usuario.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../controller/js/inputs_editar_usuario.js"></script>
    <script src="../controller/js/orden_tablas.js"></script>

    <script>
        $(document).ready(function() {

            // Funcionalidad para mostrar/ocultar contraseña
            $('.toggle-password').on('click', function() {
                let input = $(this).siblings('.password-field');
                let type = input.attr('type') === 'password' ? 'text' : 'password';
                input.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
        });
    </script>

</body>

</html>