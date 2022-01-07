function verificarPasswords() {
 /*
    // Ontenemos los valores de los campos de contraseñas 
    pass1 = document.getElementById('pass');
    pass2 = document.getElementById('passConfir');
 
    // Verificamos si las constraseñas no coinciden 
    if (pass1.value != pass2.value) {
 
        // Si las constraseñas no coinciden mostramos un mensaje 
        document.getElementById("error").classList.add("mostrar");
        header('location: ?c=usuario&a=login');
 
        return false;
    } else {
 
        // Si las contraseñas coinciden ocultamos el mensaje de error
        document.getElementById("error").classList.remove("mostrar");
 
        // Mostramos un mensaje mencionando que las Contraseñas coinciden 
        document.getElementById("ok").classList.remove("ocultar");
 
        // Desabilitamos el botón de login 
        document.getElementById("login").disabled = true;
 
        // Refrescamos la página (Simulación de envío del formulario) 
        setTimeout(function() {
            location.reload();
        }, 3000);
 
        return true;
    }
 */
    $(document).ready(function(){
 
        $('#pass2').keyup(function(){
        var pass = $('#pass').val();
        var passConfir = $('#passConfir').val();
    
        if ( pass == passConfir ) {
            $('#error2').text("Coinciden!").css("color","green");
            alert("Enviando el formulario");
            formulario.submit();
            return true;
        } else {
            $('#error2').text("No coinnciden!").css("color","red");
            alert("No coinciden");
            return false;
        }
        if ( passConfir == " "){
            $('#error2').text("No se puede dejar en blanco!").css("color","red");
            alert("No se puede dejar en blanco el formulario");
            return false;
        }
    });
    
    });
}