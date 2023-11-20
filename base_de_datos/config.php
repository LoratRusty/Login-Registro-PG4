<?php
// Archivo de conexión a la base de datos (modifica los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Nombre de la base de datos a crear
$dbname = "acceso";

// Crear la base de datos
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sqlCreateDatabase) === TRUE) {
    echo "Base de datos '$dbname' creada correctamente<br>";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
    $conn->close();
    die();
}

// Seleccionar la base de datos recién creada
$conn->select_db($dbname);

// Archivo SQL con la definición de las tablas
$sqlFile = 'acceso.sql';

// Lee el contenido del archivo SQL
$sql = file_get_contents($sqlFile);

// Ejecuta el script SQL
if ($conn->multi_query($sql)) {
    echo "Tablas creadas correctamente";
} else {
    echo "Error al crear las tablas: " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
