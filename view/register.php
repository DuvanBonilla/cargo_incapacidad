<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <title>Registro de usuarios</title>
    <link href="css/login.css" rel="stylesheet">
  </head>
<body>
  <form class="login" id="login" action="../controller/ctr_register.php" method="POST">
    <h1>Registro de usuarios</h1>
    <input type="text" placeholder="Nombre" name="nombre">
    <input type="text" placeholder="Cedula" name="cedula">
    <input type="text" placeholder="Sucursal" name="sucursal">
    <input type="text" placeholder="Usuario" name="usuario">
    <input type="password" placeholder="Contraseña" name="contrasena">
    <button class="cta">Registro
    <!-- <span class="span">INICIAR SESIÓN</span> -->
    <span class="second">
      <svg viewBox="0 0 60 43" version="1.1">
        <use xlink:href="css/icons.svg#arrow-icon"></use>
      </svg>
    </span>
  </button>
  </form>
  
</body>
</html>



