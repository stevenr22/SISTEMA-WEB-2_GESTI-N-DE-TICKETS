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

// Guardar los valores del formulario en variables
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];

// Limpiar los mensajes de sesión después de mostrarlos
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <?php include_once("../components/SourcesCss.php"); ?>
    <title><?php echo $nom_completo; ?></title>
</head>

<body>
    <div class="register-container">
        <div class="register-box">
            <h2>Registro de Usuario</h2>

            <form class="form" action="../Data/validar_register.php" method="POST" id="formRegistro">
                <div class="form-row">
                    <div class="input-group">
                        <label for="nombre">Nombre</label>
                        <input onkeypress="return validarLetras(event);" type="text" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre"
                            value="<?php echo isset($form_data['nombre']) ? $form_data['nombre'] : ''; ?>">
                    </div>
                    <div class="input-group">
                        <label for="apellido">Apellido</label>
                        <input onkeypress="return validarLetras(event);" type="text" id="apellido" name="apellido"
                            placeholder="Ingrese su apellido"
                            value="<?php echo isset($form_data['apellido']) ? $form_data['apellido'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label for="celular">Número de Celular</label>
                        <input onkeypress="return validarNumCelular(event);" type="text" id="celular" name="celular"
                            placeholder="Ingrese su número de celular"
                            value="<?php echo isset($form_data['n_celular']) ? $form_data['n_celular'] : ''; ?>">
                    </div>
                    <div class="input-group">
                        <label for="correo">Correo</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingrese su correo"
                            value="<?php echo isset($form_data['correo']) ? $form_data['correo'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección"
                            value="<?php echo isset($form_data['direccion']) ? $form_data['direccion'] : ''; ?>">
                    </div>
                    <div class="input-group">
                        <label for="edad">Edad:</label>
                        <input type="text" id="edad" name="edad" onkeypress="return validarEdad(event);"
                            placeholder="Ingrese su edad"
                            value="<?php echo isset($form_data['edad']) ? $form_data['edad'] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" placeholder="Ingrese su usuario"
                            value="<?php echo isset($form_data['username']) ? $form_data['username'] : ''; ?>">
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="passwordReg" name="passwordReg" placeholder="Ingrese su contraseña"
                            value="<?php echo isset($form_data['password']) ? $form_data['password'] : ''; ?>">
                    </div>

                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label for="passwordConfirm">Confirmar Contraseña</label>
                        <input type="password" id="passwordConfirm" name="passwordConfirm"
                            placeholder="Confirme su contraseña"
                            value="<?php echo isset($form_data['confirm_password']) ? $form_data['confirm_password'] : ''; ?>">
                    </div>

                </div>
                <div class="form-row">
                    <div class="input-group checkbox-group">
                        <input onchange="mostrarContraseña(['passwordReg','passwordConfirm'])" type="checkbox"
                            id="mostrar_contraseña">
                        <label for="showPassword">Mostrar contraseña</label>
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