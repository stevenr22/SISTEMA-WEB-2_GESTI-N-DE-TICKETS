// FUNCIÓN AJAX PARA REALIZAR EL PROCESO DE validar_login
function formLogin() {
  // Instancia de Notyf.js
  const notyf = new Notyf({
    position: {
      x: 'rigth',   // Posición horizontal (izquierda)
      y: 'top'     // Posición vertical (arriba)
  },
  ripple: true
  }); 

  $("#formLogin").submit(function (event) {
    event.preventDefault(); // Evita el envío tradicional del formulario
    

    $.ajax({
      url: "../Data/validar_login.php",
      type: "POST",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.success) {
          notyf.success("Inicio de sesión exitoso. Redirigiendo...");
          setTimeout(() => {
            window.location.href = "../components/Home.php"; // Redirigir si el login es exitoso
          }, 1000);
        } else {
          notyf.error(response.message); // Mensaje de error con Notyf.js
        }
      },
      error: function () {
        notyf.error("Error en el servidor. Inténtalo de nuevo.");
      },
    });
  });
}

$(document).ready(function () {
  formLogin();
});




// FUNCIÓN AJAX PARA REALIZAR EL PROCESO DE validar_registro
function formRegistro() {
  const notyf = new Notyf(); // Instancia de Notyf.js

  $("#formRegistro").submit(function (event) {
    event.preventDefault(); // Evita el envío tradicional del formulario
    console.log("FORMULARIO REGISTRO ENVIADO");

    $.ajax({
      url: "../Data/validar_register.php",
      type: "POST",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        console.log("Respuesta del servidor:", response); // Muestra la respuesta JSON en consola

        if (response.success) {
          notyf.success("Registro exitoso. Redirigiendo...");
          setTimeout(() => {
            window.location.href = "../components/Login.php"; // Redirigir si el registro es exitoso
          }, 1000);
        } else {
          notyf.error(response.message); // Mensaje de error con Notyf.js
        }
      },
      error: function () {
        notyf.error("Error en el servidor. Inténtalo de nuevo.");
      },
    });
  });
}

$(document).ready(function () {
  formRegistro();
});
