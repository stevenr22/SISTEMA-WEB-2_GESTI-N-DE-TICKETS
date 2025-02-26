
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
    <title><?php echo $nom_completo; ?></title>
</head>
<body>
    <h2>Bienvenido señor <b><?php echo $username; ?></b></h2>
    <span>Su nombre es: <?php echo $nombre_completo; ?></span><br>
    <span>Con ROL: <?php echo $nombre_rol; ?></span>  <br> 
    <span>Con ID: <?php echo $id_rol; ?></span>
    <br>
    <button onclick="Logout()">Cerrar sesión</button> 
    <script>
        function Logout() {
            window.location.href = "../Data/CerrarSesion.php";
        }
    </script>
</body>
</html>