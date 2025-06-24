<?php
session_start();
include_once("../Data/VariablesGlobales.php");
variables();
global $nombre_pestañas;

$nom_completo = "";
foreach ($nombre_pestañas as $pestaña) {
    if ($pestaña == "Inicio") {
        $nom_completo_pestaña = $nombre_pestañas[0] . " | " . $pestaña;
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
    <?php include_once("../components/SourcesCss.php"); ?>
    <link rel="stylesheet" href="../css/Dashboard.css" />
    <title><?php echo $nom_completo_pestaña; ?></title>
</head>

<body>
    <div class="container">
        <header class="header">
            <img src="../public/sou.png" alt="sir" />
            <h2>Bienvenido señor <?php echo $nombre_completo ?></h2>
            <div class="icons">
                <p class="icon" id="bell-icon">
                    <i class="fas fa-bell"></i>
                </p>
                <p class="icon" id="perfil-icon">
                    <i class="fas fa-user"></i>
                </p>
                <p class="icon" id="cerrar-icon">
                    <i class="fas fa-sign-out-alt cerrar"></i>

                </p>





            </div>
        </header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../pages/Dashboard.php">Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">



                        <!--DROPDOW 1-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Usuarios
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user-tag"></i> Roles</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-users"></i> Actuales</a></li>
                            </ul>
                        </li>
                        <!--DROPDOW 2-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tablas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-table"></i> Roles</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-table"></i> Actuales</a></li>
                            </ul>
                        </li>


                        <!---------------------------------------------->
                    </ul>
                </div>
            </div>
        </nav>
        <!--CUERPO---------------------------------------------------------------------------->
        <main class="main container-fluid py-4">
            <!-- Tarjetas de Información -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Usuarios Registrados</div>
                        <div class="card-body">
                            <h5 class="card-title">1,250</h5>
                            <p class="card-text">Total de usuarios en la plataforma.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Ventas Totales</div>
                        <div class="card-body">
                            <h5 class="card-title">$50,000</h5>
                            <p class="card-text">Ingresos generados este mes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Pedidos Pendientes</div>
                        <div class="card-body">
                            <h5 class="card-title">120</h5>
                            <p class="card-text">Pedidos aún no procesados.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla Responsiva con DataTables -->
            <div class="card">
                <div class="card-header">
                    <h5>Lista de Usuarios</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaUsuarios" class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Steven Rojas</td>
                                    <td>steven@example.com</td>
                                    <td>Administrador</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Juan Pérez</td>
                                    <td>juan@example.com</td>
                                    <td>Usuario</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- Formulario de Registro -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Formulario de Registro</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Ingrese su email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Ingrese su contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </main>


        <!------------------------------------------------------------------------------------------------>
    </div>
    <?php include_once("../components/SourcesJs.php"); ?>




    <script>
        $(document).ready(function () {
            $("#tablaUsuarios").DataTable({
                responsive: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
                },
            });
        });
        //PREGUNTA SI DESEO CERRAR SESION
        const cerrar_sesion = document.getElementById("cerrar-icon");
        cerrar_sesion.addEventListener("click", function (event) {
            event.preventDefault();
            //PREGUNTAR CON SWEETALERT
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cerrar sesión',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../Data/CerrarSesion.php"; // URL de tu script de cierre de sesión
                }
            });
        });
    </script>
</body>

</html>