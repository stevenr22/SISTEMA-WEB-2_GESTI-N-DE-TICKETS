<?php
session_start();
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $n_celular = trim($_POST["celular"]);
    $correo = trim($_POST["correo"]);
    $direccion = trim($_POST["direccion"]);
    $edad = trim($_POST["edad"]);
    
    $username = trim($_POST["username"]);
    $password = trim($_POST["contraRegistro"]);
    $confirm_password = trim($_POST["contraConfirmar"]);

    // Validar si los campos están vacíos
    if (empty($nombre) || empty($apellido) || empty($n_celular) ||
        empty($correo) || empty($direccion) || empty($edad) ||
        empty($username) || empty($password) || empty($confirm_password)) {
        echo json_encode(["status" => "warning", "message" => "Debe completar todos los campos."]);
        exit();
    }

    // Validar contraseñas
    if ($password != $confirm_password) {
        echo json_encode(["status" => "warning", "message" => "Las contraseñas no coinciden."]);
        exit();
    }

    // Verificar si el username ya existe
    $query_username = "SELECT * FROM usuario WHERE username_usu = '$username'";
    $result_username = mysqli_query($conn, $query_username);
    
    if (mysqli_num_rows($result_username) > 0) {
        // Si existe un usuario con el mismo username
        echo json_encode(["status" => "warning", "message" => "El nombre de usuario ya se encuentra registrado."]);
        exit();
    }

    // Verificar si el correo ya existe
    $query_email = "SELECT * FROM usuario WHERE correo_usu = '$correo'";
    $result_email = mysqli_query($conn, $query_email);
    
    if (mysqli_num_rows($result_email) > 0) {
        // Si existe un usuario con el mismo correo
        echo json_encode(["status" => "warning", "message" => "El correo ya se encuentra en uso."]);
        exit();
    }

    // Realizar la inserción del usuario en la base de datos
    $query_insert = "INSERT INTO usuario (nombre_usu, apellido_usu, edad_usu, direccion_usu, correo_usu, username_usu, clave_usu, id_rol) 
    VALUES ('$nombre', '$apellido', '$edad', '$direccion', '$correo', '$username', '$password', 3)";

    if (mysqli_query($conn, $query_insert)) {
        echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito."]);
        exit();
    } else {
        echo json_encode(["status" => "error", "message" => "Error al registrar el usuario."]);
        exit();
    }
}

?>