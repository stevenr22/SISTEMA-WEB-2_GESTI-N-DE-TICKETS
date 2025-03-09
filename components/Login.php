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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include_once("SourcesCss.php"); ?>
  <link rel="stylesheet" href="../css/login.css" />
  <title><?php echo $nom_completo; ?></title>
</head>

<body>
  <div class="container">
    <div class="container-formulario">
      <!-- LOGO - TITULO -->
      <div class="container-logo">
        <img class="img" src="../public/user.png" alt="user" />
        <h2 class="titulo">Acceder al sistema</h2>
      </div>

      <form id="formLogin">
        <label for="usuario" class="form-label">Usuario:</label>
        <input type="text" placeholder="Ingrese su usuario" class="form-control" id="username" name="username" />
        <label for="contra" class="form-label">Contraseña:</label>
        <input type="password" id="contra" name="contra" class="form-control" placeholder="Ingrese su contraseña" />

        <div class="container-check">
          <input type="checkbox" class="form-check-input" id="checkPassword" onchange="mostrarContraseña(['contra'])" />
          <label class="form-check-label" for="mostrarContraseña">Mostrar contraseña</label>


        </div>




        <button type="submit" class="btn">Acceder</button>
        <div class="container-enlaces">
          <p>¿No tienes cuenta?</p>
          <a href="registro.php">Registrate.</a>
          <p>¿Olvidaste tu contraseña?</p>
          <a href="#">Recuperala.</a>
        </div>
      </form>
    </div>
  </div>
  <?php include_once("../components/SourcesJs.php"); ?>
</body>

</html>