<?php
session_start();
include_once("../Data/VariablesGlobales.php");
variables();
global $nombre_pestañas;

$nom_completo = "";
foreach ($nombre_pestañas as $pestaña) {
    if ($pestaña == "Iniciar Sesión") {
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
    <?php include_once("../components/SourcesCss.php"); ?>
    <title><?php echo $nom_completo; ?></title>
</head>

<body>



    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="text-center mb-4">Acceder al Sistema</h2>
                <form id="formLogin" class="form-group">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Ingrese su usuario" />
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contra" name="contra"
                            placeholder="Ingrese su contraseña" />
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-primary" type="submit">Acceder</button>
                    </div>


                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkPassword"
                            onchange="mostrarContraseña(['contra'])" />
                        <label for="mostrarContraseña" class="form-check-label">Mostrar contraseña</label>
                    </div>


                </form>
                <?php include_once("../components/Modales.php")?>
                <div class="text-center mt-3">
                    <p>¿No tienes cuenta? <a href="../components/Registro.php">Regístrate</a></p>

                    <p>¿Olvidaste tu contraseña? <a href="#" data-bs-toggle="modal"
                            data-bs-target="#recuperarContraseñaModal">Recupérala</a></p>
                   

                </div>
            </div>

        </div>

        <?php include_once("../components/SourcesJs.php"); ?>
</body>

</html>