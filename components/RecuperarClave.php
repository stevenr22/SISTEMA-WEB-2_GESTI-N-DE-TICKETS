<?php
session_start();
include_once("../Data/VariablesGlobales.php");
variables();
global $nombre_pestañas;

$nom_completo = "";
foreach ($nombre_pestañas as $pestaña) {
    if ($pestaña == "Recuperar Clave") {
        $nom_completo = $nombre_pestañas[0] . " | " . $pestaña;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../components/SourcesCss.php"); ?>
    <title><?php echo $nom_completo; ?></title>
</head>

<body>
    <div class="container">
        <div class="box">
            <h2>Recuperar contraseña</h2>
        </div>
        <form class="form" method="POST" id="formRecuperar">

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password"
                    placeholder="Ingrese su contraseña">
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirmar Contraseña</label>
                <input type="password" id="confirm_password" name="confirm_password"
                    placeholder="Confirme su contraseña">
            </div>
            <button type="submit">Recuperar</button>
        </form>

        <div class="footer">
            <p>¿Recordo su contraseña? <a href="Login.php">Inicie</a></p>
        </div>
    </div>
    <?php include_once("../components/SourcesJs.php"); ?>

</body>

</html>