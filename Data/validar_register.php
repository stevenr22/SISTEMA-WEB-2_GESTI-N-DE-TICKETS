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
    $password = trim($_POST["passwordReg"]);
    $confirm_password = trim($_POST["passwordConfirm"]);

    // Guardar los valores de los campos en variables de sesión
    $_SESSION['form_data'] = [
        'nombre' => $nombre,
        'apellido' => $apellido,
        'n_celular' => $n_celular,
        'correo' => $correo,
        'direccion' => $direccion,
        'edad' => $edad,
        'username' => $username,
        'password' => $password,
        'confirm_password' => $confirm_password
    ];
       

    
    // Validar si los campos están vacíos
    if (empty($nombre) || empty($apellido) || empty($n_celular) ||
        empty($correo) || empty($direccion) || empty($edad) ||
        empty($username) || empty($password) || empty($confirm_password)) {
        
        $_SESSION['error_message'] = "Debe completar todos los campos.";
        header("Location: ../components/Registro.php");
        exit();
    }

    // Validar contraseñas
    if ($password != $confirm_password) {
        $_SESSION['error_message'] = "Las contraseñas no coinciden.";
        header("Location: ../components/Registro.php");
        exit();
    }

    // Verificar si el username ya existe
    $query_username = "SELECT * FROM usuario WHERE username_usu = '$username'";
    $result_username = mysqli_query($conn, $query_username);
    
    if (mysqli_num_rows($result_username) > 0) {
        // Si existe un usuario con el mismo username
        $_SESSION['error_message'] = "El nombre de usuario ya está registrado.";
        header("Location: ../components/Registro.php");
        exit();
    }

    // Verificar si el correo ya existe
    $query_email = "SELECT * FROM usuario WHERE correo_usu = '$correo'";
    $result_email = mysqli_query($conn, $query_email);
    
    if (mysqli_num_rows($result_email) > 0) {
        // Si existe un usuario con el mismo correo
        $_SESSION['error_message'] = "El correo electrónico ya está registrado.";
        header("Location: ../components/Registro.php");
        exit();
    }

    // Realizar la inserción del usuario en la base de datos (sin consultas preparadas)
    $query_insert = "INSERT INTO usuario (nombre_usu, apellido_usu, edad_usu, direccion_usu, correo_usu, username_usu, clave_usu, id_rol) 
    VALUES ('$nombre', '$apellido', '$edad', '$direccion', '$correo', '$username', '$password', 3)";

    if (mysqli_query($conn, $query_insert)) {
        $_SESSION['success_message'] = "Usuario registrado correctamente.";
        header("Location: ../components/Login.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error al registrar el usuario.";
        header("Location: ../components/Registro.php");
        exit();
    }
}
?>