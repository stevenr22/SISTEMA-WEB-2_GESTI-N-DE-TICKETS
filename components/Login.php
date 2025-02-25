<?php
session_start();
require_once("../Data/conexion.php");
include_once("../Data/VariablesGlobales.php");
variables();
global $nombre_pestañas;

$nom_completo = "";
foreach ($nombre_pestañas as $pestaña) {
    if ($pestaña == "Iniciar Sesión") {
        $nom_completo = $nombre_pestañas[0] . " | " . $pestaña;
        break;
    }
}

// Guardar el mensaje de error en una variable si existe
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../components/SourcesCss.php"); ?>
    <title><?php echo $nom_completo; ?></title>
    <style>
        .error-message {
            color: red;
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <form class="login-form" action="../Data/validar_login.php" method="POST" id="formLogin"
            onsubmit="return ValidarCamposVacios();">
            <h2 class="text-center">Iniciar Sesión</h2>
            
            <!-- Mensaje de error -->
            <?php if (!empty($error_message)) : ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label" for="username">Usuario:</label>
                <input class="form-control" type="text" name="username" placeholder="Ingrese su usuario"
                    id="username" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Contraseña:</label>
                <input class="form-control" type="password" name="password" id="password"
                    placeholder="Ingrese su contraseña" />
            </div>
            <div class="mb-3">
                <input type="checkbox" id="showPassword" onclick="verContraseña()">
                <label for="showPassword">Mostrar contraseña</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-success" type="submit" value="Login">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>

    <?php include_once("../components/SourcesJs.php"); ?>
    <script src="../Validaciones/ValidarFormLogin.js"></script>
    <script>
        function verContraseña() {
            var contraseña = document.getElementById("password");
            if (contraseña.type === "password") {
                contraseña.type = "text";
            } else {
                contraseña.type = "password";
            }
        }
    </script>
</body>
</html>
