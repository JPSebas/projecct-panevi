<?php
// Inicia una nueva sesión o reanuda la sesión existente.
session_start();

// Comprueba si no se ha establecido la sesión 'nombre' o si el 'tipo_usuario' no es 'administrador'.
if (!isset($_SESSION['nombre']) || $_SESSION['tipo_usuario'] != 'administrador') {
    // Si la condición anterior se cumple, redirige al usuario a la página de inicio de sesión.
    header("Location: login.php");
    // Finaliza la ejecución del script para asegurarse de que no se ejecute código adicional.
    exit();
}
?>

<path
                    d="M133.2 44.8h.1c.4-.899 1-1.7 1.9-2.3.899-.6 1.8-.9 2.899-.9.5 0 1 .101 1.301.301.4.199.6.599.6 1.099 0 .6-.2 1-.6 1.2-.4.2-.801.3-1.4.3h-.2c-1.3 0-2.399.5-3.2 1.4-.8.899-1.3 2.3-1.3 4.1v7c0 .4-.1.7-.2.9-.1.199-.3.399-.399.5-.101.1-.4.199-.5.3-.2 0-.3.1-.5.1-.101 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.101-.2-.3-.301-.399-.5s-.199-.5-.199-.9v-1.3h-.1c-.4.899-1 1.7-1.899 2.3-.899.6-1.8.9-2.899.9-.5 0-1-.1-1.301-.301-.4-.199-.6-.599-.6-1.099 0-.6.199-1 .6-1.2.399-.199.801-.3 1.399-.3h.199c1.3 0 2.399-.5 3.199-1.399.8-.9 1.301-2.3 1.301-4.1v-7c0-.399.1-.7.199-.9s.3-.4.399-.5c.1-.1.3-.199.5-.3.2 0 .3-.1.5-.1.1 0 .3 0 .5.1.2 0 .399.1.5.3s.301.3.399.5.199.5.199.9v1.3z"
                />
            </g>
        </symbol>
    </svg>

    <!-- Header of the page with a navigation bar and logo -->
    <header class="container_header">
        <!-- Logo on the left side of the header -->
        <a href="./administrador.html" class="icon logo" title="Inicio">
            <svg class="logo" role="img">
                <use xlink:href="#logo"></use>
            </svg>
        </a>

        <!-- Navigation bar for user profile, theme switcher, and logout -->
        <div class="container_navbar">
            <!-- User icon with dropdown for profile -->
            <div class="container_perfil">
                <div class="navbar_perfil">
                    <div class="user">
                        <a href="./perfil.html" class="icon" title="Perfil">
                            <!-- User icon with class from FontAwesome -->
                            <i class="fas fa-user-circle"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Theme switcher button to toggle between light and dark modes -->
            <button id="switch-mode" class="switch-mode">
                <!-- Icon for the theme switcher -->
                <i class="fas fa-sun"></i>
            </button>

            <!-- Logout button that links to the login page -->
            <div class="container_logout">
                <div class="navbar_logout">
                    <a href="./index.html" class="icon" title="Cerrar Sesión">
                        <!-- Logout icon from FontAwesome -->
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main section of the page -->
    <main>
        <!-- Section for user information display -->
        <div class="container_perfil-content">
            <div class="container_flex">
                <!-- Left column for user avatar -->
                <div class="container_img-perfil">
                    <!-- Placeholder for profile image -->
                    <img class="img_perfil" src="../public/img/avatar.png" alt="Avatar">
                </div>

                <!-- Right column for user personal information -->
                <div class="container_info-perfil">
                    <h2>Mi perfil</h2>
                    <p>Datos personales:</p>
                    <p>
                        <!-- User's full name -->
                        <strong>Nombre:</strong> Juan Perez
                    </p>
                    <p>
                        <!-- User's email -->
                        <strong>Email:</strong> juan.perez@example.com
                    </p>
                    <p>
                        <!-- User's role -->
                        <strong>Rol:</strong> Administrador
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer with copy right information -->
    <footer>
        <p>&copy; 2024 Nombre de la Empresa. Todos los derechos reservados.</p>
    </footer>

    <!-- Link to a JavaScript file for additional functionality -->
    <script src="../public/js/main.js"></script>

</body>

</html>
