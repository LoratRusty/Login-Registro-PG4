<?php
// Incluye la lógica de verificación de sesión
require_once('validar_sesion.php');

// Cierra la sesión si se ha enviado el parámetro "cerrar_sesion"
if (isset($_GET['cerrar_sesion'])) {
    cerrarSesion();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilos-bienvenida.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <title>Menu Principal</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h1>Bienvenido</h1>
        </div>
        <ul class="menu">
            <li><a href="Ejercicio2/Ejercicio2.php" name="redirigir2"> Ejercicio 2</a></li>
            <li><a href="Ejercicio3/Ejercicio3.php" name="redirigir3"> Ejercicio 3</a></li>
            <li><a href="Ejercicio4/Ejercicio4.php" name="redirigir4"> Ejercicio 4</a></li>
            <li><a href="Ejercicio5/Ejercicio5.php" name="redirigir3"> Ejercicio 5</a></li>
            <li><a href="Ejercicio6/Ejercicio6.php" name="redirigir3"> Ejercicio 6</a></li>
            <li><a href="?cerrar_sesion=1"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
        </ul>
    </div>
    <div class="content">
        <!-- Contenido de la página -->
    </div>

</body>
</html>
