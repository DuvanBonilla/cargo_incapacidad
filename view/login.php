
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
    <title>Inicio de sesion</title>
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
  <form class="login" id="login" action="../controller/ctr_login.php" method="POST">
    <h1>Gestión de Incapacidades</h1>
    <input id="usuario" type="text" placeholder="Usuario" name="usuario">
    <input id ="contrasena" type="password" placeholder="Contraseña" name="contrasena">
    <button class="cta">Iniciar Sesión
    <span class="second">
      <svg viewBox="0 0 60 43" version="1.1">
        <use xlink:href="css/icons.svg#arrow-icon"></use>
      </svg>
    </span>
  </button>    
  </form>
  
</body>
</html>



