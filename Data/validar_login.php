<?php
session_start();
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Validar si los campos están vacíos
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Debe completar todos los campos.";
        header("Location: ../components/Login.php");  // Redirige a Login.php
        exit();
    }

    // Validar credenciales en la base de datos
    $query = "SELECT u.username_usu, u.clave_usu, r.nombre_rol, r.id_rol 
              FROM rol as r 
              JOIN usuario as u ON r.id_rol = u.id_rol 
              WHERE u.estado = 1 AND r.estado = 1";

    $result = mysqli_query($conn, $query);

    // Verificar si el usuario existe y la contraseña es correcta
    $validCredentials = false;
    while ($row = mysqli_fetch_array($result)) {
        if ($row["username_usu"] == $username && $row["clave_usu"] == $password) {
            $_SESSION["rol"] = $row["nombre_rol"];
            $_SESSION["username"] = $row["username_usu"];
            $_SESSION["id_rol"] = $row["id_rol"];
            header("Location: ../components/Home.php");  // Redirige a la página de inicio
            exit();
        }
    }

    // Si las credenciales son incorrectas, mostrar mensaje de error
    if (!$validCredentials) {
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos.";
        header("Location: ../components/Login.php");  // Redirige a Login.php
        exit();
    }
}
?>
