<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="Views/css/style.css" />
    <title>login</title>
  </head>
  <body>
    <div class="containers">
      <div class="forms-container">
        <div class="signin-signup">


          <form  action="?c=usuario&a=validate" method="post" class="sign-in-form">
          
            <div class="container-fluid">
          <div  style="width: 30rem; margin:auto">
          <div class="card-body">
            <center>
          <h2 class="title">Iniciar sesión</h2>
         
          </center>
                          
                          <div class="col">
                         
                      <label for="">correo </label>
               
                      <input name="Correo_Electronico" type="text" placeholder="Correo" maxlength="40" oninput="maxlengthNumber(this);"  class="form-control" required/>
                      <br>
                      
                  
                    <label for="">Contraseña</label>
                  
                    <input  name="Contrasena_Usuario" id="Contrasena_Usuario3" type="password" placeholder="contrasena" maxlength="11" oninput="maxlengthNumber(this);" class="form-control" required/>
                    
                  </div>
             <br>     
   

 

    <style>
       
          
       input[type=checkbox] {
           vertical-align: middle;
           position: relative;
           bottom: 1px;
       }
         
       label {
           display: block;
       }
   </style>
   <center>
 <div>
       <label><input class ="" type="checkbox"  id="exampleCheck1"  onclick="mostrar3()" value="ver"> Ver contraseña</label>
   </div>
   </center>

              
              
             


              <!-- con esto se ve el ojito de la contraseña -->
              <script  type="text/javascript">
              function mostrar3(){
                  var tipo = document.getElementById("Contrasena_Usuario3");
              
                  if( tipo.type== 'password'){
                      tipo.type='text';
                  } else{
                      tipo.type ='password';
              
              
                  }
                }
              </script>
                          <!-- esto evita el desbordamiento de datos-->
                          <script> 
                          function maxlengthNumber(obj) {
                            if (obj.value.length > obj.maxLength) {
                              obj.value = obj.value.slice(0, obj.maxLength);
                            }
                          }
                        </script>

                                    <!-- esto evita el desbordamiento de datos-->

            <center>
              <a  id="" href="?c=usuario&a=recuperarPass&Start=1">
              
              Recuperar contraseña
             </a>
             </center>

             <br>
<center>
            <input type="submit" value="Ingresa" class="btn solid" />
            </center>


</div>
</div>
</div>



            
          </form>


   
          <form action="?c=usuario&a=save" id="registro" class="sign-up-form" method="post" >
        
          <div class="container-fluid">
          <div  style="width: 40rem; margin:auto">
          <div class="card-body">

<center>
            <h2 class="title">Registrate</h2>
            </center>


            <div class="form-row">
           
          <div class="col">
          
      <label for="">nombre</label>
      
      <input name="Nombres_Usuario" id='Nombres_Usuario' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="form-control" placeholder="Nombres">
      
    </div>
    <div class="col">
     
    <label for="">apellidos</label>
  
    <input name="Apellidos_Usuario" id='Apellidos_Usuario' type="text" maxlength="25"  oninput="maxlengthNumber(this);"  class="form-control" placeholder="Apellidos" >
    </div>
  </div>


  <div class="form-row">
           
           <div class="col">
          
       <label for="">Documento</label>
      
       <input name="Documento_Identificacion" id='Documento_Identificacion' type="number" maxlength="10" oninput="maxlengthNumber(this);"  class="form-control" placeholder="Documento">
       
     </div>
     <div class="col">
   
     <label for="">Telefono</label>
  
     <input name="Telefono_Usuario" id='Telefono_Usuario' type="number" maxlength="10" oninput="maxlengthNumber(this);"  class="form-control"  placeholder="Telefono">
     </div>
   </div>




   <div class="form-row">
           
           <div class="col">
        
       <label for="">RH</label>
    

                           
                            
                              <select   class="form-control" name="Id_RH" id="Id_RH" class="selectpicker show-tick" p>
                                <option  class="font-weight-bold" > </option>
                                <?php foreach ($RH as $RH) : ?>
                                  <option value="<?= $RH->getId_RH() ?>" <?= $RH->getId_RH() == $usuario->getId_RH() ?
                                                                          'selected' : '' ?>>
                                    <?= $RH->getTipo_RH() ?> </option>
                                <?php endforeach; ?>
                              </select>

       
     </div>
     <div class="col">
      
     <label for="">ID empleado</label>
    
     <input name="Id_Area" id='Id_Area' type="number" maxlength="4" oninput="maxlengthNumber(this);"  class="form-control"  placeholder="ID empleado" />
     </div>
   </div>


   <div class="form-row">
           
           <div class="col">
         
       <label for="">correo </label>
      
       <input name="Correo_Electronico" id="Correo_Electronico" type="email" maxlength="40" oninput="maxlengthNumber(this);"  class="form-control"  placeholder="Corro electronico">
       
     </div>
     <div class="col">
    
     <label for="">Confirmar</label>
   
     <input id="Correo_Electronico2" type="email" maxlength="40" oninput="maxlengthNumber(this);"  class="form-control" placeholder="Confirma tu correo">
     </div>
   </div>


   <div class="form-row">
           
           <div class="col">
         
       <label for="">Contraseña </label>
       
       <input name="Contrasena_Usuario" type="password" id="Contrasena_Usuario"  maxlength="13" oninput="maxlengthNumber(this);"  class="form-control" placeholder="Contraseña" >
       
     </div>
     <div class="col">
    
     <label for="">Confirmar</label>
     </center>
     <input type="password" name="Contrasena_Usuario2" id="Contrasena_Usuario2" maxlength="13"  oninput="maxlengthNumber(this);"  class="form-control" placeholder="Confirmar contraseña" >
     </div>
   </div>








   <div>





  <div class="icon"  > 
 
  
  <style>
       
          
        input[type=checkbox] {
            vertical-align: middle;
            position: relative;
            bottom: 1px;
        }
          
        label {
            display: block;
        }
    </style>
  <div>
        <label><input class ="" type="checkbox"  id="exampleCheck1" onclick="mostrar2()" value="ver contraseña"> Ver contraseña</label>
    </div>

    

  
  






    </div>
</div>

</div>



  
  </div>


  </div>




<center>
<span class="mensaje" id="mensaje">insegura</span>
</center>



<center>
<input  type="submit" onclick='return enviarFormulario();' id="submit" class="btn" />
</center>
<div  >
  <center>
    <span class="error" id="error" >    </span>
    </center>

  

</div>











          




<script  type="text/javascript">
  function mostrar2(){
var tipo = document.getElementById("Contrasena_Usuario2");

if( tipo.type== 'password'){
tipo.type='text';
} else{
tipo.type ='password';


}

var tipo = document.getElementById("Contrasena_Usuario");

if( tipo.type== 'password'){
tipo.type='text';
} else{
tipo.type ='password';


}


}


</script>

          </form>
        </div>
      </div>

      <div class="panels-containers">
        <div class="panel left-panel">
          <div class="content">
           
            <h3>¿No tienes cuenta?</h3>
  <br>
            <button class="btn transparent" id="sign-up-btn">
              Registrar
            </button>
          </div>
          <img src="Views/multimedia/logo.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>¿Ya tienes una cuenta?</h3>
           
            <button class="btn transparent" id="sign-in-btn">
              Ingresa
            </button>
          </div>
          <img src="Views/multimedia/logo.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="Views/js/app.js"></script>
    <script src="Views/js/registro.js"></script>
    
  </body>
</html>