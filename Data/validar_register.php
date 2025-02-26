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
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Validar si los campos están vacíos
    if (empty($nombre) || empty($apellido) || empty($n_celular) ||
        empty($correo) || empty($direccion) || empty($edad) ||
        empty($username) || empty($password) || empty($confirm_password)) {
        
        $_SESSION['error_message'] = "Debe completar todos los campos.";
        header("Location: ../components/Registro.php");  // Redirige a Register.php
        exit();
    }

    // Validar contraseñas
    if ($password != $confirm_password) {
        $_SESSION['error_message'] = "Las contraseñas no coinciden.";
        header("Location: ../components/Registro.php");  // Redirige a Register.php
        exit();
    }

    // Verificar si el username o el correo ya existen
    $query = "SELECT * FROM usuario WHERE username_usu = '$username' OR correo_usu = '$correo'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // Si existe un usuario con el mismo username o correo
        $_SESSION['error_message'] = "El nombre de usuario o correo electrónico ya está registrado.";
        header("Location: ../components/Registro.php");  // Redirige a Register.php
        exit();
    } else {
        // Realizar la inserción del usuario en la base de datos (sin consultas preparadas)
        $query_insert = "INSERT INTO usuario (nombre_usu, apellido_usu, edad_usu, direccion_usu, correo_usu, username_usu, clave_usu, id_rol) 
        VALUES ('$nombre', '$apellido', '$edad', '$direccion', '$correo', '$username', '$password', 3)";

        if (mysqli_query($conn, $query_insert)) {
            $_SESSION['success_message'] = "Usuario registrado correctamente.";
            // Limpiar el mensaje de éxito antes de redirigir
            header("Location: ../components/Login.php");  // Redirige a Login.php
            exit();
        } else {
            $_SESSION['error_message'] = "Error al registrar el usuario.";
            header("Location: ../components/Registro.php");  // Redirige a Register.php
            exit();
        }
    }
}
?>
