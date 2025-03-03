$(document).ready(function() {
    $("#formLogin").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "../Data/validar_login.php",  // El archivo PHP que procesará el login
            data: $(this).serialize(),
            dataType: "json",  // Esperamos una respuesta JSON
            success: function(response) {
                // Verificamos el tipo de respuesta (error o éxito)
                if (response.status === "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                } else if (response.status === "warning") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Advertencia',
                        text: response.message
                    });
                
                    
                } else if (response.status === "success") {
                    // Redirigir directamente a la página Home.php 
                    window.location.href = "../pages/Dashboard.php"; 
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "Hubo un problema al procesar la solicitud. Intenta nuevamente."
                });
            }
        });
    });
});

//AJAX PARA REGISTRO

$(document).ready(function() {
    $("#formRegistro").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "../Data/validar_registro.php",  // El archivo PHP que procesará el registro
            data: $(this).serialize(),
            dataType: "json",  // Esperamos una respuesta JSON
            success: function(response) {
                // Verificamos el tipo de respuesta (error, success o warning)
                if (response.status === "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                } else if (response.status === "success") {
                    // Mostrar SweetAlert y redirigir después de que el usuario cierre la alerta
                    Swal.fire({
                        icon: 'success',
                        title: 'Registrado',
                        text: response.message
                    }).then(function() {
                        window.location.href = "../components/Login.php"; 
                    });
                } else if (response.status === "warning") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Advertencia',
                        text: response.message
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "Hubo un problema al procesar la solicitud. Intenta nuevamente."
                });
            }
        });
    });
});
