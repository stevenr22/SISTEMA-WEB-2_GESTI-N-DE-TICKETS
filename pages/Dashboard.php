<?php
session_start();
include_once("../Data/VariablesGlobales.php");
variables();
global $nombre_pestañas;

$nom_completo = "";
foreach ($nombre_pestañas as $pestaña) {
    if ($pestaña == "Inicio") {
        $nom_completo = $nombre_pestañas[0] . " | " . $pestaña;
        break;
    }
}

// VALIDAR CONTROL DE SESIONES, POR AHORA SERÁ ADMIN
if (!isset($_SESSION["username"])) {
    // Si no es un Administrador, redirige a la página de inicio
    $_SESSION['error_message'] = "Acceso restringido. Debe iniciar sesión.";
    header("Location: ../index.php");
    exit();
}

$nombre_rol = $_SESSION["rol"];
$username = $_SESSION["username"];
$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$nombre_completo = $nombre . " " . $apellido;  // Concatenación de nombre y apellido
$id_rol = $_SESSION["id_rol"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../components/SourcesCss.php");?>
    <title><?php echo $nom_completo; ?></title>
</head>

<body>

    <div class="parent">
        <div class="div1">1</div>
        <div class="div2">2</div>
        <div class="div3">3</div>
        <div class="div4">4</div>
    </div>


</body>

</html>