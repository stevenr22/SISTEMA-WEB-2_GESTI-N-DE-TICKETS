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

        <form class="form" method="POST" id="formLogin">
            <div class="input-group">
                <label for="username">Usuario</label>
                <input  type="text" id="username" name="username" placeholder="Ingrese su usuario">
            </div>
            <div class="input-group">
                <label for="password" >Contraseña</label>
                <input  type="password" id="password" name="password" placeholder="Ingrese su contraseña">
            </div>
            <button type="submit" >Iniciar sesión</button>
        </form>

        <div class="footer">
            <p>¿Olvidaste tu contraseña? <a href="RecuperarClave.php">Recuperar</a></p>
            <p>¿No tienes cuenta? <a href="Registro.php">Registrate</a></p>
        </div>

    </div>

    <?php include_once("../components/SourcesJs.php"); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const notyf = new Notyf({
                position: {
                    x: 'left',   // Posición horizontal (izquierda)
                    y: 'top'     // Posición vertical (arriba)
                },
                ripple: true
            });

            <?php
            // Si existe un mensaje de error, mostrarlo usando Notyf
            if (isset($_SESSION['error_message']) && $_SESSION['error_message']) {
                echo "notyf.error('" . $_SESSION['error_message'] . "');";
                unset($_SESSION['error_message']);  // Limpiar el mensaje después de mostrarlo
            }
            ?>
        });
    </script>


</body>

</html>