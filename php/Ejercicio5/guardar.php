<?php
// Incluye la lógica de verificación de sesión
require_once('../validar_sesion.php');
?>

<?php
// Incluye el archivo de conexión a la base de datos
include '../conexionbd.php';

// Recupera los valores de los campos desde el formulario
$materia1 = $_POST['materia1'];
$nota1 = $_POST['nota1'];
$materia2 = $_POST['materia2'];
$nota2 = $_POST['nota2'];
$materia3 = $_POST['materia3'];
$nota3 = $_POST['nota3'];
$materia4 = $_POST['materia4'];
$nota4 = $_POST['nota4'];
$materia5 = $_POST['materia5'];
$nota5 = $_POST['nota5'];
$materia6 = $_POST['materia6'];
$nota6 = $_POST['nota6'];

// Validar campos vacíos
if (empty($materia1) || empty($materia2) || empty($materia3) || empty($materia4) || empty($materia5) || empty($materia6) ||
    empty($nota1) || empty($nota2) || empty($nota3) || empty($nota4) || empty($nota5) || empty($nota6)) {
    enviarRespuesta(false, "Todos los campos son obligatorios");
}

// Arreglo para almacenar las materias
$materias = [$materia1, $materia2, $materia3, $materia4, $materia5, $materia6];

// Verificar que no haya materias repetidas
if (count($materias) !== count(array_unique($materias))) {
    enviarRespuesta(false, "No se permiten almacenar asignaturas repetidas");
}

// Verificar si alguna materia está repetida usando sentencias preparadas
foreach ($materias as $index => $materia) {
    // Construir una consulta preparada para verificar si la materia ya existe en cualquier columna de Materia1 a Materia6
    $query = "SELECT * FROM materias_esis WHERE 
        Materia1 = ? OR Materia2 = ? OR Materia3 = ? OR
        Materia4 = ? OR Materia5 = ? OR Materia6 = ?";
    
    $statement = mysqli_prepare($conexion, $query);
    
    if ($statement) {
        // Asociar parámetros y ejecutar la consulta
        mysqli_stmt_bind_param($statement, "ssssss", $materia, $materia, $materia, $materia, $materia, $materia);
        mysqli_stmt_execute($statement);
        
        // Obtener resultados de la consulta
        $result = mysqli_stmt_get_result($statement);

        // Verificar si la materia ya existe
        if ($result !== false && mysqli_num_rows($result) > 0) {
            enviarRespuesta(false, "La asignatura '" . $materia . "' ya se encuentra registrada, verifique los datos ingresados");
        }
    } else {
        // Notificar si hubo un error en la consulta preparada
        enviarRespuesta(false, "Error en la consulta preparada: " . mysqli_error($conexion));
    }
}

// Declaración de variable query con INSERT INTO utilizando sentencias preparadas
$query = "INSERT INTO materias_esis (Materia1, Nota1, Materia2, Nota2, Materia3, Nota3, Materia4, Nota4, Materia5, Nota5, Materia6, Nota6) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$statement = mysqli_prepare($conexion, $query);

if ($statement) {
    // Asociar parámetros y ejecutar la inserción
    mysqli_stmt_bind_param($statement, "ssssssssssss", $materia1, $nota1, $materia2, $nota2, $materia3, $nota3, $materia4, $nota4, $materia5, $nota5, $materia6, $nota6);
    mysqli_stmt_execute($statement);

    // Notificar si el registro se almacenó correctamente
    enviarRespuesta(true, "Asignaturas y calificaciones almacenados exitosamente");
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
