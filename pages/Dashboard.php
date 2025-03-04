<?php
session_start();
include_once("../Data/VariablesGlobales.php");
variables();
global $nombre_pestañas;

$nom_completo = "";
foreach ($nombre_pestañas as $pestaña) {
    if ($pestaña == "Inicio") {
        $nom_completo = $nombre_pestañas[0] . " | " . $pestaña;
        break;
    }
}

// VALIDAR CONTROL DE SESIONES, POR AHORA SERÁ ADMIN
if (!isset($_SESSION["username"])) {
    // Si no es un Administrador, redirige a la página de inicio
    $_SESSION['error_message'] = "Acceso restringido. Debe iniciar sesión.";
    header("Location: ../index.php");
    exit();
}

$nombre_rol = $_SESSION["rol"];
$username = $_SESSION["username"];
$nombre = $_SESSION["nombre"];
$apellido = $_SESSION["apellido"];
$nombre_completo = $nombre . " " . $apellido;  // Concatenación de nombre y apellido
$id_rol = $_SESSION["id_rol"];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard SysGi</title>
    <!-- Bootstrap 5 CSS -->
    <link
      href="../sources/bootstrap-5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link
      href="../sources/fontawesome/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/Dashboard.css">
    
  </head>

  <body>
    <!-- Encabezado -->
    <div class="container-fluid dashboard-header">
      <div class="row align-items-center">
        <div
          class="col-12 col-md-4 d-flex justify-content-start align-items-center"
        >
          <img src="../public/sou.png" alt="Logo SysGi" class="img-fluid" />
          <span class="ms-2 text-white">SysGi</span>
        </div>
        <div class="col-12 col-md-4 text-center">
          <h5>Bienvenido señor <?php echo $nombre_completo ?></h5>
        </div>
        <div class="col-12 col-md-4 text-end icon-container">
          <a href="#" class="me-3"><i class="fas fa-bell"></i></a>
          <a href="#"><i class="fas fa-sign-out-alt"></i></a>
        </div>
      </div>
    </div>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <!-- Ícono de Font Awesome para el menú de hamburguesa -->
          <i class="fas fa-bars text-white"></i>
        </button>
        <div
          class="collapse navbar-collapse justify-content-center"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Menu 1
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Opción 1</a></li>
                <li><a class="dropdown-item" href="#">Opción 2</a></li>
                <li><a class="dropdown-item" href="#">Opción 3</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown2"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Menu 2
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <li><a class="dropdown-item" href="#">Opción 1</a></li>
                <li><a class="dropdown-item" href="#">Opción 2</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-4 main-content">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header">
              <h5>Panel de Control</h5>
            </div>
            <div class="card-body">
              <p>
                Aquí puedes ver las estadísticas y controlar los aspectos clave
                de tu sistema.
              </p>
              <div class="row">
                <div class="col-md-4">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <h6>Estadística 1</h6>
                      <p>Resumen de información importante</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <h6>Estadística 2</h6>
                      <p>Detalles sobre el estado actual del sistema</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <h6>Estadística 3</h6>
                      <p>
                        Gráficos o detalles importantes para la toma de
                        decisiones
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="../sources/bootstrap-5.3.3/dist/js/bootstrap.min.js"></script>

  </body>
</html>
