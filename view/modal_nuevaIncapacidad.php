<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../view/css/images/lor.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/incapacidad/modal/incapacidad.css">
    <title>Incapacidad</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" async></script>

</head>

<body>
    <div class="modal fade" id="nuevaIncapacidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Nueva Incapacidad</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="bi bi-x"
                            aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/ctr_registrar_incapacidad.php" method="POST">
                        <input type="hidden" id="Cedula" name="Cedula">
                        <input type="hidden" name="Fechacontrato" id="Fechacontrato">
                        <div id="step1" class="modal-step">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="IBC" class="form-label">IBC</label>
                                        <input type="text" id="IBC" name="IBC" placeholder="IBC" class="form-control1" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Codigodiagnostico" class="form-label">Código Diagnóstico</label>
                                        <input type="text" id="Codigodiagnostico" name="Codigodiagnostico" class="form-control1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inipro" class="form-label">Inicial/Prorroga</label>
                                        <select class="form-control1" id="inipro" name="inipro">
                                            <option selected>Inicial/Prorroga</option>
                                            <?php require_once("../model/consu_prorroga.php"); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Tipoincapacidad" class="form-label">Tipo de Incapacidad</label>
                                        <select class="form-control1" id="Tipoincapacidad" name="Tipoincapacidad">
                                            <option>Seleccione Tipo</option>
                                            <?php require_once("../model/consu_tipoIncapacidad.php"); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Fechainicio" class="form-label">Fecha Inicio</label>
                                        <input type="date" id="Fechainicio" name="Fechainicio" class="form-control1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Totaldias" class="form-label">Días</label><br>
                                        <input type="text" id="Totaldias" name="Totaldias" class="form-control1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Observaciones" class="form-label">Observaciones</label>
                                        <textarea id="Observaciones" name="Observaciones" class="form-control1"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="Archivo" class="form-label">Archivo</label>
                                        <input type="file" id="Archivo" name="Archivo" class="form-control1">
                                    </div>
                                </div>
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
    <script src="../controller/js/calculardias_LP.js" async></script>

</body>

</html>