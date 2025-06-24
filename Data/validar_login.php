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
    $query = "SELECT u.UserNameUsu, u.NomUsu, u.ApeUsu, u.ContraUsu, r.NomRol, r.IdRol 
              FROM Roles as r 
              JOIN Usuarios as u ON r.IdRol = u.IdRol 
              WHERE u.EstadoUsu = 1 AND u.UserNameUsu = '$username'";

    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($row["ContraUsu"] == $password) { // Comparación directa (no segura)
            $_SESSION["rol"] = $row["NomRol"];
            $_SESSION["username"] = $row["UserNameUsu"];
            $_SESSION["nombre"] = $row["NomUsu"];
            $_SESSION["apellido"] = $row["ApeUsu"];
            $_SESSION["id_rol"] = $row["IdRol"];
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
