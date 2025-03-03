<?php
session_start();
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["contra"]);

    // Validar si los campos están vacíos
    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "warning", "message" => "Debe completar todos los campos."]);
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
            echo json_encode(["status" => "success"]);
            exit();
        } else {
            echo json_encode(["status" => "warning", "message" => "Contraseña incorrecta."]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Usuario no encontrado."]);
        exit();
    }
}
?>
