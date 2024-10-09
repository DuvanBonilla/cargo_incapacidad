<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    
<div class="container">
<a href="login.php" class="icon-back-link">
    <img src="./css/images/apagar.png" alt="Icono de regreso" class="icon-back">
</a>
    <h1 class="heading">Gestión De Incapacidades</h1>
    <div class="box-container">
    
    <a href="#" data-bs-toggle="modal" data-bs-target="#Registrar_incapacidad">
            <div class="box">
                <img src="./css/images/incapacidad.png" alt="">
                <h3>Registrar Incapacidad</h3>
            </div>
        </a>
        <a href="inca_activas.php">
            <div class="box">
                <img src="./css/images/incaactiva.png" alt="">
                <h3>Incapacidades Activas</h3>
            </div>
        </a>
        <a href="">
            <div class="box">
                <img src="./css/images/pago2.png" alt="">
                <h3>Incapacidades Inact</h3>
            </div>
        </a>
        <a href="base_datos.php">
            <div class="box">
                <img src="./css/images/datos.png" alt="">
                <h3>Base De Datos</h3>
            </div>
        </a>
        <a href="subir_archivo.php">
            <div class="box">
                <img src="./css/images/pago.png" alt="">
                <h3>Realizar Cruce</h3>
            </div>
        </a>
        <a href="">
            <div class="box">
                <img src="./css/images/user.png" alt="">
                <h3>Registrar Usuario</h3>
            </div>
        </a>


    </div>

</div>
<!-- Incluye el modal aquí -->
<?php include 'modal_incapacidad.php'; ?>

<!-- Bootstrap JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

 <!-- jQuery (si usas Bootstrap 4 o anterior) -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    

</body>
</html>