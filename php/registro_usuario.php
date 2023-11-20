<?php
// Incluir la conexión a la base de datos
include 'conexionbd.php';

// Declaración de variables con el método POST y el nombre de cada input
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Validar campos vacíos
if (empty($nombre_completo) || empty($correo) || empty($usuario) || empty($contrasena)) {
    enviarRespuesta(false, "Todos los campos son obligatorios");
}

// Validar el formato del correo electrónico
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    enviarRespuesta(false, "El formato del correo electrónico no es válido");
}

// Validar contraseña
if (!validarContrasena($contrasena)) {
    enviarRespuesta(false, "La contraseña debe contener al menos un número, una letra mayúscula, un carácter especial y tener al menos 6 caracteres");
}

// Verificar si el correo está repetido
$verificar_correo = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE correo = ?");
mysqli_stmt_bind_param($verificar_correo, "s", $correo);
mysqli_stmt_execute($verificar_correo);
mysqli_stmt_store_result($verificar_correo);

if(mysqli_stmt_num_rows($verificar_correo) > 0) {
    enviarRespuesta(false, "El correo ya está registrado, intenta con otro diferente");
}

// Verificar si el usuario está repetido
$verificar_usuario = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE usuario = ?");
mysqli_stmt_bind_param($verificar_usuario, "s", $usuario);
mysqli_stmt_execute($verificar_usuario);
mysqli_stmt_store_result($verificar_usuario);

if(mysqli_stmt_num_rows($verificar_usuario) > 0) {
    enviarRespuesta(false, "El usuario ya está registrado, intenta con otro diferente");
}

// Generar una sal única para cada usuario
$sal = bin2hex(random_bytes(16));

// Hashear la contraseña con la sal
$contrasena_hasheada = password_hash($sal . $contrasena, PASSWORD_DEFAULT);

// Declaración de variable query con INSERT INTO utilizando sentencias preparadas
$query = "INSERT INTO usuarios (Nombre_Completo, Correo, Usuario, Contrasena, Sal) VALUES (?, ?, ?, ?, ?)";
$statement = mysqli_prepare($conexion, $query);

if ($statement) {
    mysqli_stmt_bind_param($statement, "sssss", $nombre_completo, $correo, $usuario, $contrasena_hasheada, $sal);
    mysqli_stmt_execute($statement);

    // Notificar si el registro se almacenó correctamente
    enviarRespuesta(true, "Usuario almacenado exitosamente");
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

// Función para validar la contraseña
function validarContrasena($contrasena) {
    // Definir una expresión regular que cumpla con las condiciones requeridas
    $regex = '/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*(),.?\:{}|<>]).{6,}$/';

    // Verificar si la contraseña cumple con la expresión regular
    return preg_match($regex, $contrasena);
}
?>
