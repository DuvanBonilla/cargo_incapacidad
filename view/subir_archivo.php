<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir y procesar Excel</title>
    <link rel="stylesheet" href="css/subir_archivo.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="iconretr"> <a href="index.php"><i class='bx bxs-chevrons-left'></i> </a></div>
<div class="container">
    <form action="../model/generar_cruce.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo_excel" accept=".xlsx, .xls" required><br><br>
        <button type="submit">Realizar Cruce De Valores</button>
    </form>
</div>

</body>
</html>
