<?php
    // Definir constantes para la conexión
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'acceso');

    // Intentar realizar la conexión
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Verificar la conexión
    if (!$conexion) {
        die('Error de conexión: ' . mysqli_connect_error());
    }
?>
