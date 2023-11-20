<?php
// validar_sesion.php

// Inicia la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para verificar la sesión
function verificarSesion() {
    // Verifica si existe la marca de tiempo de última actividad
    if (isset($_SESSION['ultimo_acceso'])) {
        // Obtiene el tiempo actual
        $tiempo_actual = time();

        // Calcula la diferencia de tiempo desde la última actividad
        $tiempo_transcurrido = $tiempo_actual - $_SESSION['ultimo_acceso'];

        // Define el tiempo límite de inactividad (en segundos)
        $tiempo_inactividad_limite = 1800; // 30 minutos

        // Comprueba si se ha superado el tiempo límite de inactividad
        if ($tiempo_transcurrido > $tiempo_inactividad_limite) {
            cerrarSesion(); // Cierra la sesión si ha pasado el tiempo límite
        }
    }

    // Actualiza la marca de tiempo de última actividad
    $_SESSION['ultimo_acceso'] = time();

    // Verifica si no existe la variable de sesión 'usuario'
    if (!isset($_SESSION['usuario'])) {
        // Redirige al formulario de inicio de sesión si no hay sesión activa
        header("Location: ../../index.php");
        exit();
    }
}

// Función para cerrar la sesión
function cerrarSesion() {
    // Destruye todas las variables de sesión
    session_unset();

    // Destruye la sesión
    session_destroy();

    // Redirige al formulario de inicio de sesión
    header("Location: ../../index.php");
    exit();
}

// Llama a la función de verificación al incluir este archivo
verificarSesion();
?>
