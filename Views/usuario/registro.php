


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="Views/css/loginyregistro.css" />
<script src="https://kit.fontawesome.com/64d58efce2.js"
crossorigin="anonymous"></script>
<div class="home">
<div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <!--<form action="?c=usuario&a=validate" method="post"> -->
        
          <form action="?c=usuario&a=save" method="post" >
            <h2 class="title">Registrate</h2>
 
            <label  class="guia" for="">nombre</label>
            <div class="input-field">
            
              <i class="fas fa-user"></i>
              <input   name="Nombres_Usuario" type="text" required  />
            </div>


            <label class="guia" for="">apellido</label>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input  name="Apellidos_Usuario" type="text" required   />
            </div>

            <label class="guia"  for="">docuemnto</label>
            <div class="input-field">
            <i class="fas fa-id-card-alt"></i>
              <input name="Documento_Identificacion" type="number" required  />
            </div>


            <label  class="guia" for="">correo</label>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="Correo_Electronico" type="email" required  />
            </div>


            <label  class="guia" for="">telefono</label>
            <div class="input-field">
            <i class="fas fa-phone-alt"></i>
              <input name="Telefono_Usuario" type="number" required />
            </div>
            <label  class="guia" for="">Contraseña</label>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="Contrasena_Usuario" type="password" placeholder="contrasena" />
            </div>
            <label  class="guia" for="">Id_ROL</label>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="Id_Rol" type="number" placeholder="contrasena" />
            </div>
            <label  class="guia" for="">id_rh</label>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="Id_RH" type="number" placeholder="contrasena" />
            </div>
            <input type="submit"  class="btn solid" />
            <p class="social-text">siguenos en nuestras redes sociales</p>
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
            <h3>  ¿ ya tienes una cuenta ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a class="boton" id="sign-up-btn" href="./index.php?c=usuario&a=login">
              INICIA
             </a>
          </div>
          <img src="Views/multimedia/logo.png" class="image" alt="" />
        </div>
</div>
</div>
</form>



