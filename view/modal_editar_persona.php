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
    <div class="modal fade" id="Persona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Editar Incapacidad</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="bi bi-x"
                            aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/ctr_editar_persona.php" method="POST">
                        <div id="step1" class="modal-step">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Cedula" class="form-label">Cédula</label>
                                        <input type="text" id="Cedula" name="Cedula" class="form-control1" required
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Nombre" class="form-label">Nombre</label>
                                        <input type="text" id="Nombre" name="Nombre" class="form-control1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Eps" class="form-label">EPS</label>
                                        <input type="text" id="Eps" name="Eps" class="form-control1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Empresa" class="form-label">Empresa</label>
                                        <input type="text" id="Empresa" name="Empresa" class="form-control1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="AreaTrabajo" class="form-label">Área de Trabajo</label>
                                        <input type="text" id="AreaTrabajo" name="AreaTrabajo" class="form-control1"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="Fechacontrato" class="form-label">Fecha de contrato</label>
                                <input type="date" name="Fechacontrato" id="Fechacontrato" class="form-control1"
                                    required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Modificar</button>
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