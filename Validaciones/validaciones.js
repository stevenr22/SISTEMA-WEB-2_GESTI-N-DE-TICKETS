function mostrarContra() {
    var contraseña = document.getElementById("password");
    var confirm_contraseña = document.getElementById("confirm_password");

    if (contraseña.type === "password" && confirm_contraseña.type === "password") {
        contraseña.type = "text";
        confirm_contraseña.type = "text";
    } else {
        contraseña.type = "password";
        confirm_contraseña.type = "password";
    }
}


//validar nombre y ape
function validarLetras(e){
    var codi_char = e.keyCode;
    if(codi_char == 13 || codi_char == 8 || codi_char == 32){
        return true;
    }
    var tipo = String.fromCharCode(codi_char);
    var expresion = /^[a-zA-Z]+$/;
    if (expresion.test(tipo)) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }

}

//validar numero de celular 
function validarNumCelular(e){
    var n_celu = document.getElementById("celular").value;
    var cod = e.keyCode;
    if (cod == 13 || cod == 8) {
        return true;
        
    }
    var tipo = String.fromCharCode(cod);
    var expresion = /\d/;
    if (expresion.test(tipo) && n_celu.length < 10) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}
// Validar edad
function validarEdad(e) {
    var inputEdad = document.getElementById("edad").value;
    var codi_char = e.keyCode;
    
    // Crear instancia de Notyf solo si no existe
    if (!window.notyf) {
        window.notyf = new Notyf({
            position: {
                x: 'right', // Posición horizontal (izquierda)
                y: 'top'  // Posición vertical (arriba)
            },
            ripple: true
        });
    }
    
    if (codi_char == 13 || codi_char == 8) {
        return true;
    }
    
    var tipo = String.fromCharCode(codi_char);
    var expresion = /\d/;
    
    if (expresion.test(tipo)) {
        var edad_entera = parseInt(inputEdad + tipo, 10);
        if (edad_entera > 100) {
            e.preventDefault();
            document.getElementById("edad").value = "";
            window.notyf.error("LA EDAD NO DEBE DE SER MAYOR A 100");
        }
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}
