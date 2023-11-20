<?php
// Incluir la conexión a la base de datos
include 'conexionbd.php';

// Verificar que los campos no estén vacíos
if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
    // Campos vacíos, devuelve una respuesta con error
    $response['success'] = false;
    $response['message'] = "Ambos campos son obligatorios";
    $response['redirect'] = "index.php";

    // Devolver la respuesta como JSON
    echo json_encode($response);
    exit();
}

// Declaración de variables con el método POST y el nombre de cada input
$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$contrasena = $_POST['contrasena'];

// Obtener la información del usuario, incluida la sal, desde la base de datos
$info_usuario = mysqli_prepare($conexion, "SELECT contrasena, sal FROM usuarios WHERE usuario = ?");
mysqli_stmt_bind_param($info_usuario, "s", $usuario);
mysqli_stmt_execute($info_usuario);
mysqli_stmt_store_result($info_usuario);

$response = array();

if (mysqli_stmt_num_rows($info_usuario) > 0) {
    mysqli_stmt_bind_result($info_usuario, $contrasena_hash, $sal);
    mysqli_stmt_fetch($info_usuario);

    // Verificar la contraseña proporcionada por el usuario con la sal almacenada y la contraseña hasheada
    if (password_verify($sal . $contrasena, $contrasena_hash)) {
        // Contraseña válida, permitir el acceso

        // Iniciar sesión
        session_start();
        $_SESSION['usuario'] = $usuario;

        $response['success'] = true;
        $response['message'] = "Bienvenido, los datos de acceso son correctos";
        $response['redirect'] = "php/bienvenida.php";
    } else {
        // Contraseña incorrecta
        $response['success'] = false;
        $response['message'] = "Los datos de acceso son incorrectos, por favor verifique la contraseña ingresada";
        $response['redirect'] = "index.php";
    }
} else {
    // Usuario no encontrado
    $response['success'] = false;
    $response['message'] = "Los datos de acceso son incorrectos, por favor verifique el usuario ingresado";
    $response['redirect'] = "index.php";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Devolver la respuesta como JSON
echo json_encode($response);
?>
