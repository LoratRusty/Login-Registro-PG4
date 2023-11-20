// Espera a que se cargue todo el contenido del DOM antes de ejecutar el script
document.addEventListener("DOMContentLoaded", function () {

    // Obtiene referencias a elementos del DOM
    const formRegistro = document.getElementById("form-registro");
    const btnRegistro = document.getElementById("btn-registro");
    const notificacionContainer = document.getElementById("notificacion-container");

    // Añade un evento de clic al botón de registro
    btnRegistro.addEventListener("click", function (event) {
        // Previene el comportamiento predeterminado del formulario
        event.preventDefault();
        // Llama a la función para enviar el formulario
        enviarFormulario(formRegistro);
    });

    // Añade un evento de tecla al formulario de registro
    formRegistro.addEventListener("keypress", function (event) {
        // Verifica si la tecla presionada es "Enter"
        if (event.key === "Enter") {
            // Previene el comportamiento predeterminado del formulario
            event.preventDefault();
            // Llama a la función para enviar el formulario
            enviarFormulario(formRegistro);
        }
    });

    // Función para enviar el formulario al servidor
    function enviarFormulario(formulario) {
        // Crea un objeto FormData con los datos del formulario
        const formData = new FormData(formulario);

        // Crea una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        // Configura la solicitud con el método POST y la URL del formulario
        xhr.open("POST", formulario.action, true);
        // Configura la cabecera de la solicitud para indicar que se está enviando un formulario
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Define la función que se ejecutará cuando cambie el estado de la solicitud
        xhr.onreadystatechange = function () {
            // Verifica si la solicitud se ha completado y se ha recibido una respuesta del servidor
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Parsea la respuesta JSON del servidor
                const response = JSON.parse(xhr.responseText);
                // Llama a la función para mostrar la notificación al usuario
                mostrarNotificacion(response.success, response.message, response.redirect);
            }
        };

        // Envía la solicitud al servidor con los datos del formulario
        xhr.send(new URLSearchParams(formData));
    }

    // Función para mostrar notificaciones al usuario
    function mostrarNotificacion(esExitoso, mensaje, redirect) {
        // Limpia el contenedor de notificaciones
        notificacionContainer.innerHTML = "";

        // Determina el tipo de icono y título de la notificación
        const icono = esExitoso ? "success" : "error";
        const titulo = esExitoso ? "¡Operación exitosa!" : "¡Error!";

        // Muestra la notificación usando SweetAlert
        Swal.fire({
            title: titulo,
            text: mensaje || (esExitoso ? "Operación exitosa" : "Error desconocido"),
            icon: icono,
            confirmButtonText: "OK"
        }).then(function () {
            // Limpia el contenedor de notificaciones nuevamente
            notificacionContainer.innerHTML = "";

            // Si la operación fue exitosa y hay una redirección, recarga la página
            if (esExitoso && redirect) {
                location.reload();
            }
        });
    }
});
