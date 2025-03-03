<?php
session_start();
include_once("../Data/VariablesGlobales.php");
variables();
global $nombre_pestañas;

$nom_completo = "";
foreach ($nombre_pestañas as $pestaña) {
    if ($pestaña == "Registrarse") {
        $nom_completo = $nombre_pestañas[0] . " | " . $pestaña;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php include_once("../components/SourcesCss.php"); ?>

    <title><?php echo $nom_completo; ?></title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 100%; max-width: 800px;">
            <div class="card-body">
                <h2 class="text-center mb-4">Registro de Usuario</h2>

                <form class="form" method="POST" id="formRegistro">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input onkeypress="return validarLetras(event);" type="text"
                                class="form-control form-control-sm" id="nombre" name="nombre"
                                placeholder="Ingrese su nombre">
                        </div>
                        <div class="col-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input onkeypress="return validarLetras(event);" type="text"
                                class="form-control form-control-sm" id="apellido" name="apellido"
                                placeholder="Ingrese su apellido">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="celular" class="form-label">Número de Celular</label>
                            <input onkeypress="return validarNumCelular(event);" type="text"
                                class="form-control form-control-sm" id="celular" name="celular"
                                placeholder="Ingrese su número de celular">
                        </div>
                        <div class="col-6">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control form-control-sm" id="correo" name="correo"
                                placeholder="Ingrese su correo">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control form-control-sm" id="direccion" name="direccion"
                                placeholder="Ingrese su dirección">
                        </div>
                        <div class="col-6">
                            <label for="edad" class="form-label">Edad</label>
                            <input onkeypress="return validarEdad(event);" type="text"
                                class="form-control form-control-sm" id="edad" name="edad"
                                placeholder="Ingrese su edad">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="username" class="form-label">Usuario</label>
                            <input type="text" class="form-control form-control-sm" id="username" name="username"
                                placeholder="Ingrese su usuario">
                        </div>
                        <div class="col-6">
                            <label for="passwordReg" class="form-label">Contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="passwordReg"
                                name="passwordReg" placeholder="Ingrese su contraseña">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="passwordConfirm" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="passwordConfirm"
                                name="passwordConfirm" placeholder="Confirme su contraseña">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <input onchange="mostrarContraseña(['passwordReg','passwordConfirm'])" type="checkbox"
                                id="mostrar_contraseña">
                            <label for="mostrar_contraseña">Mostrar contraseña</label>
                        </div>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </form>

                <div class="text-center">
                    <p>¿Ya tienes cuenta? <a href="Login.php">Iniciar sesión</a></p>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("../components/SourcesJs.php"); ?>
</body>

</html>