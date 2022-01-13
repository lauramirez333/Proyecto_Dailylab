<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Validación de Formulario con Javascript</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="Views/css/prueba.css">

</head>
<body>
	<main>
    <form action="" class="formulario" id="formulario">
			
			<!-- Grupo: Nombres_Usuario -->
            <div class="formulario__grupo" id="grupo__NombresUsuario">
				<label for="NombresUsuario" class="formulario__label">Nombres</label>
				<div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="Nombres_Usuario" id="NombresUsuario" placeholder="john123">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Digite sus nombres tal cual como aparecen en su documento de identificacion.</p>
			</div>

            <!-- Grupo: Apellidos_Usuario -->
            <div class="formulario__grupo" id="grupo__ApellidosUsuario">
                <label for="ApellidosUsuario" class="formulario__label">Apellidos</label>
				<div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="Apellidos_Usuario" id="ApellidosUsuario" placeholder="John Doe">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Digite sus nombres tal cual como aparecen en su documento de identificacion.</p>
			</div>

            <!-- Grupo: Documento_Identificacion -->
            <div class="formulario__grupo" id="grupo__DocumentoIdentificacion">
                <label for="DocumentoIdentificacion" class="formulario__label">Documento de identificacion</label>
				<div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="Documento_Identificacion" id="DocumentoIdentificacion" placeholder="4491234567">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Digite su numero de identificacion tal cual como aparecen en su documento.</p>
			</div>

            <!-- Grupo: Telefono_Usuario -->
            <div class="formulario__grupo" id="grupo__TelefonoUsuario">
            <label for="TelefonoUsuario" class="formulario__label">Teléfono</label>
            <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="Telefono_Usuario" id="TelefonoUsuario" placeholder="4491234567">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Su numero de telefono debe ser de 10 digitos.</p>
			</div>

            <!-- Grupo: Id_RH -->
            <div class="formulario__grupo" id="grupo__IdRH">
				<label for="IdRH" class="formulario__label">RH</label>
				<div class="formulario__grupo-input">
					<input type="" class="formulario__input" name="Id_RH" id="IdRH" placeholder="John Doe">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Su numero de telefono debe ser de 10 digitos.</p>
			</div>

            <!-- Grupo: Id_Rol -->
            <div class="formulario__grupo" id="grupo__IdRol">
				<label for="IdRol" class="formulario__label">Rol</label>
				<div class="formulario__grupo-input">
					<input type="" class="formulario__input" name="Id_Rol" id="IdRol" placeholder="John Doe">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Su numero de telefono debe ser de 10 digitos.</p>
			</div>

			<!-- Grupo: Correo_Electronico -->
            <div class="formulario__grupo" id="grupo__CorreoElectronico">
            <label for="CorreoElectronico" class="formulario__label">Correo Electrónico</label>
            <div class="formulario__grupo-input">
            <input type="email" class="formulario__input" name="Correo_Electronico" id="CorreoElectronico" placeholder="correo@correo.com">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>
 
            <!-- Grupo: Correo Electronico2 -->
			<div class="formulario__grupo" id="grupo__CorreoElectronico2">
            <label for="CorreoElectronico2" class="formulario__label">Correo Electrónico</label>
            <div class="formulario__grupo-input">
            <input type="email" class="formulario__input" name="Correo_Electronico2" id="CorreoElectronico2" placeholder="correo@correo.com">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>

            <!-- Grupo: Contrasena_Usuario -->
            <div class="formulario__grupo" id="grupo__ContrasenaUsuario">
            <label for="ContrasenaUsuario" class="formulario__label">Contraseña</label>
            <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="Contrasena_Usuario" id="ContrasenaUsuario">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
			</div>

			<!-- Grupo: Contraseña 2 -->
            <div class="formulario__grupo" id="grupo__ContrasenaUsuario2">
            <label for="ContrasenaUsuario2" class="formulario__label">Contraseña</label>
            <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="Contrasena_Usuario2" id="ContrasenaUsuario2">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Las contraseñas deben ser iguales.</p>
			</div>


			<!-- Grupo: Terminos y Condiciones -->
			<div class="formulario__grupo" id="grupo__terminos">
				<label class="formulario__label">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Enviar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
		</form>
	</main>


	<script src="Views/js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>