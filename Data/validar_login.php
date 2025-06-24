<?php
session_start();
require_once("conexion.php");
require_once("../Clases/patronResult.php");

// Validar campos vacíos
function validarCampos(array $datos): Resultado {
    foreach ($datos as $campo => $valor) {
        if (trim($valor) === "") {
            return Resultado::fallo("Debe completar todos los campos.");
        }
    }
    return Resultado::exito("Validación exitosa");
}

// Validar contraseña como texto plano
function validarContra(string $contraBD, string $contraIngresada): Resultado {
    if ($contraBD !== $contraIngresada) {
        return Resultado::fallo("Contraseña incorrecta, inténtelo de nuevo.");
    }
    return Resultado::exito("Contraseña correcta");
}

// Login
function Login(mysqli $conn, array $datos): Resultado {
    $username = $conn->real_escape_string($datos['username']);

    $query = "SELECT u.UserNameUsu, u.NomUsu, u.ApeUsu, u.ContraUsu, r.NomRol, r.IdRol 
              FROM Roles AS r 
              JOIN Usuarios AS u ON r.IdRol = u.IdRol 
              WHERE u.EstadoUsu = 1 AND u.UserNameUsu = '$username'";

    $resultado = mysqli_query($conn, $query);

    if (!$resultado) {
        return Resultado::fallo("Error al consultar la base de datos.");
    }

    if ($row = mysqli_fetch_assoc($resultado)) {
        $validacion = validarContra($row['ContraUsu'], $datos['password']);
        if ($validacion->esFallo()) {
            return $validacion;
        }

        // Guardar datos en la sesión
        $_SESSION["rol"] = $row["NomRol"];
        $_SESSION["username"] = $row["UserNameUsu"];
        $_SESSION["nombre"] = $row["NomUsu"];
        $_SESSION["apellido"] = $row["ApeUsu"];
        $_SESSION["id_rol"] = $row["IdRol"];

        return Resultado::exito("Inicio de sesión exitoso.");
    } else {
        return Resultado::fallo("Usuario no encontrado o deshabilitado.");
    }
}

// -------------------- PROGRAMA PRINCIPAL --------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = [
        "username" => $_POST["username"] ?? '',
        "password" => $_POST["contra"] ?? ''
    ];

    $r_campos = validarCampos($datos);
    if ($r_campos->esFallo()) {
        echo json_encode(["status" => "warning", "message" => $r_campos->error]);
        exit;
    }

    $r_login = Login($conn, $datos);
    if ($r_login->esFallo()) {
        echo json_encode(["status" => "error", "message" => $r_login->error]);
    } else {
        echo json_encode(["status" => "success", "message" => $r_login->valor]);
    }
    exit;
}
?>
