<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/incapacidad/modal/incapacidad.css">
    <title>Incapacidad</title>
</head>

<body>
    <div class="modal fade" id="Duplicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Duplicar Incapacidad</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="bi bi-x"
                            aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/ctr_duplicar_persona.php" method="POST">
                        <div id="step1" class="modal-step">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CedulaDuplicar" class="form-label">Cédula</label>
                                        <input type="text" id="CedulaDuplicar" name="CedulaDuplicar"
                                            placeholder="Identificación" class="form-control1" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="NombreDuplicar" class="form-label">Nombre</label>
                                        <input type="text" id="NombreDuplicar" name="NombreDuplicar"
                                            placeholder="Nombre Completo" class="form-control1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="EpsDuplicar" class="form-label">EPS</label>
                                        <input type="text" id="EpsDuplicar" name="EpsDuplicar" placeholder="Eps"
                                            class="form-control1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="EmpresaDuplicar" class="form-label">Empresa</label>
                                        <input type="text" id="EmpresaDuplicar" name="EmpresaDuplicar"
                                            placeholder="Empresa" class="form-control1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="AreaTrabajoDuplicar" class="form-label">Área de Trabajo</label>
                                        <input type="text" id="AreaTrabajoDuplicar" name="AreaTrabajoDuplicar"
                                            placeholder="Area Trabajo" class="form-control1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="FechacontratoDuplicar" class="form-label">Fecha de contrato</label>
                                <input type="date" name="FechacontratoDuplicar" id="FechacontratoDuplicar"
                                    class="form-control1" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>