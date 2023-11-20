<?php
// Incluye la lógica de verificación de sesión
require_once('../validar_sesion.php');
?>
<?php
// Incluye el archivo de conexión a la base de datos
include '../conexionbd.php';

// Recupera los valores de los campos desde el formulario
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$numero = $_POST['numero'];

// Validar campos vacíos
if (empty($cedula) || empty($nombre) || empty($apellido) || empty($direccion) || empty($numero)) {
    enviarRespuesta(false, "Todos los campos son obligatorios");
}

// Verificar si la cedula está repetida
$verificar_cedula = mysqli_prepare($conexion, "SELECT * FROM baloncesto_uba WHERE cedula = ?");
mysqli_stmt_bind_param($verificar_cedula, "s", $cedula);
mysqli_stmt_execute($verificar_cedula);
mysqli_stmt_store_result($verificar_cedula);

if(mysqli_stmt_num_rows($verificar_cedula) > 0) {
    enviarRespuesta(false, "La cédula ya está registrada, intente con otra diferente");
}

// Verificar si el numero está repetido
$verificar_numero = mysqli_prepare($conexion, "SELECT * FROM baloncesto_uba WHERE numero = ?");
mysqli_stmt_bind_param($verificar_numero, "s", $numero);
mysqli_stmt_execute($verificar_numero);
mysqli_stmt_store_result($verificar_numero);

if(mysqli_stmt_num_rows($verificar_numero) > 0) {
    enviarRespuesta(false, "El número de jugador ya se encuentra asignado, intente con otro diferente");
}
// Declaración de variable query con INSERT INTO utilizando sentencias preparadas
$query = "INSERT INTO baloncesto_uba (Cedula, Nombre, Apellido, Direccion, numero) VALUES (?, ?, ?, ?, ?)";
$statement = mysqli_prepare($conexion, $query);

if ($statement) {
    mysqli_stmt_bind_param($statement, "sssss", $cedula,$nombre,$apellido,$direccion,$numero);
    mysqli_stmt_execute($statement);

    // Notificar si el registro se almacenó correctamente
    enviarRespuesta(true, "Jugador almacenado exitosamente");
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