<?php
session_start();
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["contra"]);

    
    // Validar si los campos están vacíos
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Debe completar todos los campos.";
        header("Location: ../components/Login.php");
        exit();
    }

    // Consulta para obtener el usuario y su rol
    $query = "SELECT u.username_usu, u.nombre_usu, u.apellido_usu, u.clave_usu, r.nombre_rol, r.id_rol 
              FROM rol as r 
              JOIN usuario as u ON r.id_rol = u.id_rol 
              WHERE u.estado = 1 AND r.estado = 1 AND u.username_usu = '$username'";

    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        if ($row["clave_usu"] == $password) { // Comparación directa (no segura)
            $_SESSION["rol"] = $row["nombre_rol"];
            $_SESSION["username"] = $row["username_usu"];
            $_SESSION["nombre"] = $row["nombre_usu"];
            $_SESSION["apellido"] = $row["apellido_usu"];
            $_SESSION["id_rol"] = $row["id_rol"];
            header("Location: ../components/Home.php"); // Redirigir al dashboard o página principal
            exit();
        } else {
            $_SESSION['error_message'] = "Contraseña incorrecta.";
            header("Location: ../components/Login.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Usuario no encontrado.";
        header("Location: ../components/Login.php");
        exit();
    }
}
?>