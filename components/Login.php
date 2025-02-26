<?php
session_start();
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
    <link rel="stylesheet" href="../css/Login.css">
    <title><?php echo $nom_completo; ?></title>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Accede al Sistema</h2>

            <form class="login-form" action="../Data/validar_login.php" method="POST" id="formLogin">
                <div class="input-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" placeholder="Ingrese su usuario">
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Ingrese su contraseña">
                </div>
                <button type="submit" class="btn-submit">Iniciar sesión</button>
            </form>

            <div class="footer">
                <p>¿Olvidaste tu contraseña? <a href="#">Recuperar</a></p>
                <p>¿No tienes cuenta? <a href="Registro.php">Registrate</a></p>
            </div>
        </div>
    </div>

    <?php include_once("../components/SourcesJs.php"); ?>
    <script>
    //AL ABRIR LA VENTANA SE EJECUTA LA FUNCION
    document.addEventListener("DOMContentLoaded", function() {
        const notyf = new Notyf(); // Instancia de Notyf

        <?php
            // Si hay un mensaje de error, mostrarlo
            if ($error_message) {
                echo "notyf.error('" . $error_message . "');";
                unset($_SESSION['error_message']);  // Limpiar el mensaje después de mostrarlo
            }
            // Si hay un mensaje de éxito, mostrarlo
            if (isset($_SESSION['success_message']) && $_SESSION['success_message']) {
                echo "notyf.success('" . $_SESSION['success_message'] . "');";
                unset($_SESSION['success_message']);  // Limpiar el mensaje después de mostrarlo
            }
            ?>

    });
    </script>
</body>

</html>