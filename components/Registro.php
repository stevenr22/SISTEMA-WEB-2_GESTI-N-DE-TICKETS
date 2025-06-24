<?php
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include_once("SourcesCss.php"); ?>
  <link rel="stylesheet" href="../css/registro.css" />
  <title><?php echo $nom_completo ?></title>
</head>

<body>
  <div class="container">
    <div class="container-formulario">
      <!-- LOGO - TITULO -->
      <div class="container-logo">
        <img class="img" src="../public/user.png" alt="user" />
        <h2 class="titulo">Registrate al sistema</h2>
      </div>
      <form id="formRegistro">
        <div class="row">
          <div class="col">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" onkeypress="return validarLetras(event);" id="nombre" name="nombre"
              placeholder="Ingrese su nombre" />
          </div>
          <div class="col">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" onkeypress="return validarLetras(event);" id="apellido"
              name="apellido" placeholder="Ingrese su apellido" />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="correo" class="form-label">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo" />
          </div>
          <div class="col">
            <label for="celular" class="form-label">N° de celular:</label>
            <input type="text" class="form-control" onkeypress="return validarNumCelular(event);" id="celular"
              name="celular" placeholder="Ingrese su celular" />
          </div>
        </div>
        <!-- RO3 -->
        <div class="row">
          <!-- edad -->
          <div class="col">
            <label for="edad" class="form-label">Edad:</label>
            <input type="text" class="form-control" onkeypress="return validarEdad(event);" id="edad" name="edad"
              placeholder="Ingrese su edad" />
          </div>
          <div class="col">
            <!-- direccion -->
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion"
              placeholder="Ingrese su dirección" />
          </div>
        </div>
        <!-- -------------------------------------- -->
        <!-- RO4 -->
        <div class="row">
          <!-- usuario -->
          <div class="col">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario" />
          </div>
          <div class="col">
            <!-- contraseña -->
            <label for="contra" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="contraRegistro" name="contraRegistro"
              placeholder="Ingrese su contra" />
          </div>

        </div>
        <!-- -------------------------------------- -->
        <div class="row">
          <div class="col">
            <label for="contra2" class="form-label">Confirmar contraseña:</label>
            <input type="password" class="form-control" id="contraConfirmar" name="contraConfirmar"
              placeholder="Confirme su contraseña" />
          </div>
        </div>
        <!-- -------------------------------------- -->
       
        <div class="container-check">
          <input type="checkbox" class="form-check-input" id="checkPassword"
            onchange="mostrarContraseña(['contraRegistro','contraConfirmar'])" />
          <label class="form-check-label" for="mostrarContraseña">Mostrar contraseña</label>


        </div>

         <div class="container-btn">
          <button type="submit" class="btn">Registrar</button>
        </div>

        <div class="container-enlaces">
          <div class="enlace-acciones">
            <p>¿Ya tienes cuenta?</p>
            <a href="../index.php">Inicia sesión</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php include_once("../components/SourcesJs.php"); ?>
</body>

</html>