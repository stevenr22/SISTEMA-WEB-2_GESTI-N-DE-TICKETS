<?php
session_start();
include_once("../Data/VariablesGlobales.php");
variables();
global $nombre_pestañas;

$nom_completo = "";
foreach ($nombre_pestañas as $pestaña) {
    if ($pestaña == "Registrarse") {
        $nom_completo = $nombre_pestañas[0] . " | " . $pestaña;
        break;
    }
}

// Guardar el mensaje de error en una variable si existe
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <?php include_once("../components/SourcesCss.php"); ?>
    <link rel="stylesheet" href="../css/Register.css">
    <title><?php echo $nom_completo; ?></title>
</head>

<body>
    <div class="register-container">
        <div class="register-box">
            <h2>Registro de Usuario</h2>

            <form class="register-form" action="../Data/validar_register.php" method="POST" id="formRegister">
                <div class="form-row">
                    <div class="input-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                    </div>
                    <div class="input-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido">
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label for="celular">Número de Celular</label>
                        <input type="text" id="celular" name="celular" placeholder="Ingrese su número de celular">
                    </div>
                    <div class="input-group">
                        <label for="correo">Correo</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingrese su correo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección">
                    </div>
                    <div class="input-group">
                        <label for="edad">Edad:</label>
                        <input type="text" id="edad" name="edad" placeholder="Ingrese su edad">
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" placeholder="Ingrese su usuario">
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña">
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label for="confirm_password">Confirmar Contraseña</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Confirme su contraseña">
                    </div>
                </div>
                <button type="submit" class="btn-submit">Registrarse</button>
            </form>
            <div class="footer">
                <p>¿Ya tienes una cuenta? <a href="Login.php">Iniciar sesión</a></p>
            </div>
        </div>
    </div>

    <?php include_once("../components/SourcesJs.php"); ?>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const notyf = new Notyf(); // Instancia de Notyf

        <?php
        // Si hay un mensaje de advertencia, mostrarlo
        if (isset($_SESSION['error_message']) && $_SESSION['error_message']) {
            echo "notyf.error('" . $_SESSION['error_message'] . "');";
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