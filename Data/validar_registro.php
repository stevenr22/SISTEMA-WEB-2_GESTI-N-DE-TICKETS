<?php
session_start();
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Captura y limpieza de datos
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $n_celular = trim($_POST["celular"]);
    $correo = trim($_POST["correo"]);
    $direccion = trim($_POST["direccion"]);
    $edad = trim($_POST["edad"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["contraRegistro"]);
    $confirm_password = trim($_POST["contraConfirmar"]);

    // Validar campos vacíos
    if (
        !$nombre || !$apellido || !$n_celular || !$correo || !$direccion ||
        !$edad || !$username || !$password || !$confirm_password
    ) {
        echo json_encode(["status" => "warning", "message" => "Debe completar todos los campos."]);
        exit();
    }

    // Validar contraseña
    if ($password !== $confirm_password) {
        echo json_encode(["status" => "warning", "message" => "Las contraseñas no coinciden."]);
        exit();
    }

    // Validar existencia de username
    $query1 = "SELECT * FROM Usuarios WHERE UserNameUsu = '$username'";
    $res1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($res1) > 0) {
        echo json_encode(["status" => "warning", "message" => "El nombre de usuario ya se encuentra registrado."]);
        exit();
    } elseif(){

    }

    

    // Insertar usuario
    $query_insert = "INSERT INTO Usuarios (NomUsu, ApeUsu, EdadUsu, DirUsu, CorreoUsu, UserNameUsu, ContraUsu, IdRol)
                     VALUES ('$nombre','$apellido','$edad','$direccion','$correo','$username','$password', 2)";
    $insertado = mysqli_query($conn, $query_insert);

    if ($insertado) {
        echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al registrar el usuario."]);
    }
    exit();
}
?>
