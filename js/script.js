// Ejecutando funciones cuando se hace clic en los botones o se redimensiona la ventana
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

// Declarando variables para acceder a elementos del DOM
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

// Función para ajustar la página según el ancho de la ventana
function anchoPage() {
    if (window.innerWidth > 850) {
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    } else {
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";
    }
}

// Llamada a la función para ajustar la página al cargar
anchoPage();

// Función para mostrar el formulario de inicio de sesión
function iniciarSesion() {
    if (window.innerWidth > 850) {
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "10px";
        formulario_register.style.display = "none";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    } else {
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

// Función para mostrar el formulario de registro
function register() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    } else {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
}

// Evento que se ejecuta al cargar el contenido de la página
document.addEventListener("DOMContentLoaded", function () {
    // Obteniendo elementos del DOM
    const formLogin = document.getElementById("form-login");
    const btnLogin = document.getElementById("btn-login");
    const formRegistro = document.getElementById("form-registro");
    const btnRegistro = document.getElementById("btn-registro");
    const notificacionContainer = document.getElementById("notificacion-container");

    // Agregando evento de clic al botón de inicio de sesión
    btnLogin.addEventListener("click", function (event) {
        event.preventDefault();
        enviarFormulario(formLogin);
    });

    // Agregando evento de tecla al formulario de inicio de sesión
    formLogin.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            enviarFormulario(formLogin);
        }
    });

    // Agregando evento de clic al botón de registro
    btnRegistro.addEventListener("click", function (event) {
        event.preventDefault();
        enviarFormulario(formRegistro);
    });

    // Agregando evento de tecla al formulario de registro
    formRegistro.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            enviarFormulario(formRegistro);
        }
    });

    // Función para enviar el formulario mediante una solicitud XMLHttpRequest
    function enviarFormulario(formulario) {
        const formData = new FormData(formulario);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", formulario.action, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                const response = JSON.parse(xhr.responseText);
                mostrarNotificacion(response.success, response.message, response.redirect);
            }
        };

        xhr.send(new URLSearchParams(formData));
    }

    // Función para mostrar una notificación usando la librería Swal
    function mostrarNotificacion(esExitoso, mensaje, redirect) {
        notificacionContainer.innerHTML = "";

        const icono = esExitoso ? "success" : "error";
        const titulo = esExitoso ? "¡Operación exitosa!" : "¡Error!";

        Swal.fire({
            title: titulo,
            text: mensaje || (esExitoso ? "Operación exitosa" : "Error desconocido"),
            icon: icono,
            confirmButtonText: "OK"
        }).then(function () {
            notificacionContainer.innerHTML = "";

            // Redirige si la operación fue exitosa y hay una URL de redirección
            if (esExitoso && redirect) {
                window.location.href = redirect;
            }
        });
    }
});
