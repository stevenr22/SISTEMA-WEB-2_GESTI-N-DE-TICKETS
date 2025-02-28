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
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";

// Limpiar los mensajes de sesión después de mostrarlos
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../components/SourcesCss.php"); ?>
    <title><?php echo $nom_completo; ?></title>
</head>

<body>
    <div class="container">
        <div class="box">
            <h2>Accede al Sistema</h2>
        </div>

        <form class="form" method="POST" id="formLogin" action="../Data/validar_login.php">
            <div class="input-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" placeholder="Ingrese su usuario">
            </div>

            <div class="input-group">
                <label for="contra">Contraseña</label>
                <input type="password" id="contra" name="contra" placeholder="Ingrese su contraseña">
            </div>
            <div class="input-group checkbox-group">
                <input type="checkbox" id="checkPassword" onchange="mostrarContraseña(['contra'])">
                <label for="mostrarContraseña">Mostrar contraseña</label>
            </div>

            <button type="submit">Iniciar sesión</button>
        </form>

        <div class="footer">
            <p>¿Olvidaste tu contraseña? <a href="RecuperarClave.php">Recuperar</a></p>
            <p>¿No tienes cuenta? <a href="Registro.php">Registrate</a></p>
        </div>

    </div>

    <?php include_once("../components/SourcesJs.php"); ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if ($error_message): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $error_message; ?>'
        });
        <?php endif; ?>

        <?php if ($success_message): ?>
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '<?php echo $success_message; ?>'
        });
        <?php endif; ?>
    });
    </script>
</body>

</html>