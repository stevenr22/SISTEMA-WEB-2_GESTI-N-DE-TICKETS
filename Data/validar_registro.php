<?php
require_once("../Clases/patronResult.php");
require_once("conexion.php");



// funcion validar campos
function validarCampos(array $datos): Resultado{
     //CAMPOS VACIOS
    foreach($datos as $campo => $valor){
        if(trim($valor) === ""){
            return Resultado::fallo("Debe completar todos los campos.");
        }
    }
    if($datos["password"] !== $datos["confirm_password"]){
        return Resultado::fallo("Contraseñas deben de ser iguales.");
    }
    return Resultado::exito("Validación exitosa");
}


//FUNCION VALIDAR USUARIO Y CONTRASEÑA EXISTNTES
function verificarUsuarioExistente(mysqli $conn, string $username): Resultado{
    $query = "SELECT * FROM Usuarios WHERE UserNameUsu = '$username'";
    $resultado = mysqli_query($conn, $query);
    if(!$resultado){
        return Resultado::fallo("Error al consultar la base de datos.");
    }
    if(mysqli_num_rows($resultado) > 0){
        return Resultado::fallo("El nombre de usuario ya está registrado.");

    }
     return Resultado::exito("Usuario disponible");
}

//FUNCION REGISTRAR USUARIO
function registrarUsuario(mysqli $conn, array $datos): Resultado{
    $sql = "INSERT INTO Usuarios (NomUsu, ApeUsu, EdadUsu, DirUsu, CorreoUsu, UserNameUsu, ContraUsu, IdRol)
            VALUES (
                '{$datos["nombre"]}',
                '{$datos["apellido"]}',
                '{$datos["edad"]}',
                '{$datos["direccion"]}',
                '{$datos["correo"]}',
                '{$datos["username"]}',
                '{$datos["password"]}',
                2
            )";

    $res = mysqli_query($conn, $sql);

    if (!$res) {
        return Resultado::fallo("Error al registrar el usuario.");
    }

    return Resultado::exito("Usuario registrado con éxito.");
}


//--------------------------------------------------------------------------------------------------------

//PROCESO PRINCIPAL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CREO ARRAY DE LOS DATOS ENVIADOS POR POST
    $datos = [
        "nombre" => $_POST["nombre"] ?? '',
        "apellido" => $_POST["apellido"] ?? '',
        "n_celular" => $_POST["celular"] ?? '',
        "correo" => $_POST["correo"] ?? '',
        "direccion" => $_POST["direccion"] ?? '',
        "edad" => $_POST["edad"] ?? '',
        "username" => $_POST["username"] ?? '',
        "password" => $_POST["contraRegistro"] ?? '',
        "confirm_password" => $_POST["contraConfirmar"] ?? ''
    ];
   

    // CREAR VARIABLE QUE RECIVE EL VALOR DE TRUE O FALSE DE LA FUNCION VALIDAR CAMPOS
    $campos_Vacios = validarCampos($datos);
    if($campos_Vacios->esFallo()){
        echo json_encode(["status" => "warning", "message" => $campos_Vacios->error]);
        exit;
    }


    //CREAR VARIABLE existe, para ingresar la respuesta de la funcion como tal
    $existe = verificarUsuarioExistente($conn, $datos["username"]);
    if($existe->esFallo()){
        echo json_encode(["status" => "warning", "message" => $existe->error]);
        exit();
    }


    // Registrar el usuario
    $registro = registrarUsuario($conn, $datos);
    if ($registro->esExitoso) {
        echo json_encode(["status" => "success", "message" => $registro->valor]);
    } else {
        echo json_encode(["status" => "error", "message" => $registro->error]);
    }
    exit();



}
?>
