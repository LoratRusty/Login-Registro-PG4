<?php
// Incluye la lógica de verificación de sesión
require_once('../validar_sesion.php');
?>

<?php
// Incluye el archivo de conexión a la base de datos
include '../conexionbd.php';

    // Recupera el valor del campo "lenguaje1 , lenguaje2 , lenguaje3" desde el formulario
    $lenguaje1 = $_POST['lenguaje1'];
    $lenguaje2 = $_POST['lenguaje2'];
    $lenguaje3 = $_POST['lenguaje3'];
    
// Validar campos vacíos
if (empty($lenguaje1) || empty($lenguaje2) || empty($lenguaje3)) {
    enviarRespuesta(false, "Todos los campos son obligatorios");
}

// Declaración de variable query con INSERT INTO utilizando sentencias preparadas
$query = "INSERT INTO lenguajes_programacion (Lenguaje1,Lenguaje2,Lenguaje3) VALUES (?, ?, ?)";
$statement = mysqli_prepare($conexion, $query);

if ($statement) {
    mysqli_stmt_bind_param($statement, "sss", $lenguaje1,$lenguaje2,$lenguaje3);
    mysqli_stmt_execute($statement);

    // Notificar si el registro se almacenó correctamente
    enviarRespuesta(true, "Lenguajes almacenados exitosamente");
} else {
    // Notificar si hubo un error en la consulta preparada
    enviarRespuesta(false, "Error al guardar la información: " . mysqli_error($conexion));
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