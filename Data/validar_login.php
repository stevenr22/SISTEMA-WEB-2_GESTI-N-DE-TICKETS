<?php
session_start();
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Validar si los campos están vacíos
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Debe completar todos los campos";
        header("Location: ../index.php");
        exit();
    }

    // Validar credenciales en la base de datos
    $query = "SELECT * FROM usuario WHERE nomb_usu = '$username' AND clave_usu = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["rol"] = "Administrador";
            header("Location: ../components/Home.php");
            exit();
        }
    }

    // Si las credenciales son incorrectas, mostrar mensaje de error
    $_SESSION['error_message'] = "Usuario o contraseña incorrectos";
    header("Location: ../index.php");
    exit();
}
?>
