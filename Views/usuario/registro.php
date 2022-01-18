<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="Views\css\loginyregistro.css">
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
<div class="home">
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!--<form action="?c=usuario&a=validate" method="post"> -->

        <form action="?c=usuario&a=save" id="registro" method="post">
          <h2 class="title">Registrate</h2>

          <label class="guia" for="Nombres_Usuario">Nombre*</label>
          <div class="input-field">

            <i class="fas fa-user"></i>
            <input name="Nombres_Usuario" id='Nombres_Usuario' type="text" required />
          </div>


          <label class="guia" for="Apellidos_Usuario">Apellido*</label>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input name="Apellidos_Usuario" id='Apellidos_Usuario' type="text" required />
          </div>

          <label class="guia" for="Documento_Identificacion">Documento*</label>
          <div class="input-field">
            <i class="fas fa-id-card-alt"></i>
            <input name="Documento_Identificacion" id='Documento_Identificacion' type="number" required />
          </div>

          <label class="guia" for="Telefono_Usuario">Telefono*</label>
          <div class="input-field">
            <i class="fas fa-phone-alt"></i>
            <input name="Telefono_Usuario" id='Telefono_Usuario' type="number" required />
          </div>
          <br>
          <div id="msg"></div>

          <label class="guia" for="Id_Rol">Selecciona tu rol*</label>
          <div class="col-md-12">
            <select name="Id_Rol" id="Id_Rol" class="form-select" aria-label="Default select example">
              <option>Seleccione Rol</option>
              <?php foreach ($roles as $rol) : ?>
                <option value="<?= $rol->getId_Rol() ?>" <?= $rol->getId_Rol() == $usuario->getId_Rol() ?
                                                          'selected' : '' ?>>
                  <?= $rol->getNombre_Rol() ?> </option>
              <?php endforeach; ?>
            </select>
          </div>
          <br>
          <label class="guia" for="Id_RH">Selecciona tu RH*</label>
          <div class="col-md-8">
            <select name="Id_RH" id="Id_RH" class="selectpicker show-tick">
              <option>Seleccione RH</option>
              <?php foreach ($RH as $RHS) : ?>
                <option value="<?= $RHS->getId_RH() ?>" <?= $RHS->getId_RH() == $usuario->getId_RH() ?
                                                        'selected' : '' ?>>
                  <?= $RHS->getTipo_RH() ?> </option>
              <?php endforeach; ?>
            </select>
          </div>
          <br>
          <label class="guia" for="Correo_Electronico">Correo*</label>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input name="Correo_Electronico" id="Correo_Electronico" type="email" required />
          </div>

          <label class="guia" for="Correo_Electronico2">Confirma tu correo*</label>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input id="Correo_Electronico2" type="email" required />
          </div>

          <label class="guia" for="Contrasena_Usuario">Contraseña*</label>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input name="Contrasena_Usuario" type="password" id="Contrasena_Usuario" placeholder="contrasena" required />
          </div>

          <label class="guia" for="Contrasena_Usuario2">Confirme Contraseña*</label>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="Contrasena_Usuario2" placeholder="contrasenaConfirm" required />
          </div>

          <input type="submit" onclick='return enviarFormulario();' id="login" class="btn solid" />
          <div id="error"></div>
          <script src='Views/js/registro.js'></script>
          <p class="social-text">Siguenos en nuestras redes sociales</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3> ¿Ya tienes una cuenta?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a class="boton" id="sign-up-btn" href="./index.php?c=usuario&a=login">
              Inicia sesion
            </a>
          </div>
          <img src="Views/multimedia/logo.png" class="image" alt="" />
        </div>
      </div>
    </div>
    </form>