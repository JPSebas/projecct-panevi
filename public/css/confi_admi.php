<?php
// Inicia una nueva sesión o reanuda la sesión existente.
session_start();

// Incluye el archivo de configuración que contiene los datos de conexión a la base de datos.
include "../app/config/config.php";

// Comprueba si no se ha establecido la sesión 'nombre' o si el 'tipo_usuario' no es 'administrador'.
if (!isset($_SESSION['nombre']) || $_SESSION['tipo_usuario'] != 'administrador') {
    // Si la condición anterior se cumple, redirige al usuario a la página de inicio de sesión.
    header("Location: login.php");
    // Finaliza la ejecución del script para asegurarse de que no se ejecute código adicional.
    exit();
}

// Comprueba si se ha enviado el formulario de actualización.
if (!empty($_POST['btnActualizar'])) {
    // Recupera los datos del formulario enviados a través de POST.
    $nuevoEmail = $_POST['nuevo_email'];
    $nuevaPassword = $_POST['nueva_password'];
    $passwordActual = $_POST['password_actual'];

    // Comprueba si alguno de los campos está vacío.
    if (empty($nuevoEmail) || empty($nuevaPassword) || empty($passwordActual)) {
        // Si algún campo está vacío, establece un mensaje de error.
        $mensaje = 'Todos los campos son requeridos.';
    } else {
        // Consulta la base de datos para comprobar si el email y la contraseña actual coinciden con los datos del administrador.
        $resultado = $conexion->query("SELECT * FROM administradores WHERE email='{$_SESSION['email']}' AND password='$passwordActual'");
        
        // Comprueba si se encontró un administrador con las credenciales proporcionadas.
        if ($resultado->num_rows > 0) {
            // Actualiza el email y la contraseña del administrador en la base de datos.
            $conexion->query("UPDATE administradores SET email='$nuevoEmail', password='$nuevaPassword' WHERE email='{$_SESSION['email']}'");
            // Actualiza el email en la sesión.
            $_SESSION['email'] = $nuevoEmail; 
            // Establece un mensaje de éxito.
            $mensaje = 'Datos actualizados correctamente.';
        } else {
            // Si la contraseña actual es incorrecta, establece un mensaje de error.
            $mensaje = 'Contraseña actual incorrecta.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" class="light-mode">

<head>
    <!-- Define the character encoding and set the viewport for responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link to external CSS file and favicon -->
    <link rel="stylesheet" href="../public/css/perfil1.css">
    <link rel="shortcut icon" href="../public/img/acceso.png" type="image/x-icon">
    
    <!-- Link to Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    
    <!-- Set the title of the page -->
    <title>Administrador</title>
</head>

<body>

    <!-- SVG symbols for logo, hidden initially -->
    <svg style="display:none;">
        <symbol id="logo" viewBox="0 0 140 59">
            <g>
                <!-- Path elements defining different parts of the SVG logo -->
                <path d="M6.8 57c0 .4-.1.7-.2.9-.1.2-.3.4-.4.5-.1.1-.4.199-.5.3-.2 0-.3.1-.5.1-.1 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.2 0-.4-.2-.5-.4-.1-.2-.2-.5-.2-.9V44.7h-2c-.3 0-.6-.101-.8-.2-.2-.1-.3-.2-.5-.4s-.2-.3-.2-.4v-.4c0-.1 0-.2.1-.399 0-.2.1-.301.2-.4.1-.1.3-.3.5-.4.1 0 .4-.1.7-.1h2.1v-3.5c0-1 .1-1.9.3-2.7C4.1 35 4.5 34.3 5 33.7c.5-.6 1.1-1.1 1.9-1.4.8-.3 1.7-.5 2.7-.5.9 0 1.5.101 1.8.4.3.3.5.6.5 1.1 0 .3-.1.601-.3.9-.2.3-.6.4-1.2.4h-.6c-.6 0-1.1.101-1.5.301-.4.199-.7.5-.9.8C7.2 36 7 36.5 7 37c-.1.5-.1 1-.1 1.6V42h2.7c.3 0 .6.1.8.2.2.1.3.2.5.399.1.101.2.301.2.401 0 .2.1.3.1.4 0 .1 0 .3-.1.399 0 .2-.1.3-.2.4-.1.1-.3.3-.5.399-.2.101-.5.2-.8.2H6.8V57z" />
                <!-- Additional path elements representing other parts of the logo -->
                <path d="M30.4 50.2c0 1.3-.2 2.5-.7 3.5-.5 1.1-1.1 2-1.9 2.8-.8.8-1.8 1.4-2.8 1.8-1.1.4-2.3.601-3.5.601-1.3 0-2.4-.2-3.5-.601-1.1-.399-2-1-2.8-1.8-.8-.8-1.4-1.7-1.9-2.8-.5-1.101-.7-2.2-.7-3.5s.2-2.4.7-3.5c.5-1.101 1.1-2 1.9-2.7.8-.8 1.7-1.4 2.8-1.8 1.1-.4 2.3-.601 3.5-.601 1.3 0 2.4.2 3.5.601 1.1.399 2 1 2.8 1.8.8.8 1.4 1.7 1.9 2.7.5 1.1.7 2.3.7 3.5zm-3.4 0c0-.8-.1-1.5-.4-2.3-.2-.7-.6-1.4-1.1-1.9s-1-1-1.7-1.3c-.7-.3-1.5-.5-2.4-.5s-1.7.2-2.4.5-1.3.8-1.7 1.3c-.5.5-.8 1.2-1.1 1.9-.2.699-.4 1.5-.4 2.3s.1 1.5.4 2.3c.2.7.6 1.4 1.1 1.9.5.6 1 1 1.7 1.3s1.5.5 2.4.5 1.7-.2 2.4-.5 1.3-.8 1.7-1.3c.5-.601.8-1.2 1.1-1.9.3-.7.4-1.5.4-2.3z" />
                <path d="M38.1 44.8h.1c.4-.899 1-1.7 1.9-2.3s1.8-.9 2.9-.9c.5 0 1 .101 1.3.301.4.199.6.6.6 1.1 0 .6-.2 1-.6 1.2-.4.2-.8.3-1.4.3h-.2c-1.3 0-2.4.5-3.2 1.4-.8.899-1.3 2.3-1.3 4.1v7c0 .4-.1.7-.2.9-.1.199-.3.399-.4.5-.2.1-.4.199-.5.3-.2 0-.3.1-.5.1-.1 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.1-.2-.3-.301-.4-.5C35 57.7 35 57.4 35 57V43.5c0-.4.1-.7.2-.9.1-.199.3-.399.4-.5.2-.1.3-.199.5-.199s.3-.101.5-.101c.1 0 .3 0 .4.101.2 0 .3.1.5.199.2.101.3.301.4.5.1.2.2.5.2.9v1.3z" />
                <!-- Further path elements for more parts of the SVG logo -->
            </g>
        </symbol>
    </svg>
</body>
</html>
