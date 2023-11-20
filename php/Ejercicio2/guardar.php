<?php
// Incluye la lógica de verificación de sesión
require_once('../validar_sesion.php');
?>

<?php
// Incluye el archivo de conexión a la base de datos
include '../conexionbd.php';

// Recupera el valor del campo "cedula ,nombre ,apellido, telefono, carrera" desde el formulario
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$carrera = $_POST['carrera'];

// Validar campos vacíos
if (empty($cedula) || empty($nombre) || empty($apellido) || empty($telefono) || empty($carrera)) {
    enviarRespuesta(false, "Todos los campos son obligatorios");
}

// Verificar si la cedula está repetida
$verificar_cedula = mysqli_prepare($conexion, "SELECT * FROM estudiantes WHERE cedula = ?");
mysqli_stmt_bind_param($verificar_cedula, "s", $cedula);
mysqli_stmt_execute($verificar_cedula);
mysqli_stmt_store_result($verificar_cedula);

if(mysqli_stmt_num_rows($verificar_cedula) > 0) {
    enviarRespuesta(false, "La cédula ya está registrada, intente con otra diferente");
}

// Declaración de variable query con INSERT INTO utilizando sentencias preparadas
$query = "INSERT INTO estudiantes (Cedula, Nombre, Apellido, Telefono, Carrera) VALUES (?, ?, ?, ?, ?)";
$statement = mysqli_prepare($conexion, $query);

if ($statement) {
    mysqli_stmt_bind_param($statement, "sssss", $cedula,$nombre,$apellido,$telefono,$carrera);
    mysqli_stmt_execute($statement);

    // Notificar si el registro se almacenó correctamente
    enviarRespuesta(true, "Estudiante registrado exitosamente");
} else {
    // Notificar si hubo un error en la consulta preparada
    enviarRespuesta(false, "Error al registrar la información: " . mysqli_error($conexion));
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Función para enviar una respuesta en formato JSON y salir del script
function enviarRespuesta($success, $message) {
    $response = array("success" => $success, "message" => $message);
    echo json_encode($response);
    exit();
}
?>