
<link rel="stylesheet" href="Views\css\loginyregistro.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Registro de usuarios</title>
    </head>
    <body>

<h1>Registro de usuarios </h1>



<ul class="breadcrumb">
  <li class="breadcrumb-item"><a href="?=usuario&a=index">Inicio</a></li>
  <li class="breadcrumb-item"><a class="active"href="#">Registro</a></li>
</ul>

<div class="home">
<br>
<br>
<br>  
<br>
<br>
<br>  
<div class="containerL">
 
      <div class="forms-container"> 
        <div class="signin-signup">

        <!--<form action="?c=usuario&a=validate" method="post"> -->

          <form action="?c=usuario&a=savePac" id="registro" method="post" onsubmit="verificarPasswords();" >
          <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>        <br>
<br>
<br>        <br>
<br>
<br>
          <h2 class="title">Registro</h2>
 <br>
            <label  class="guia" for="">Nombre</label>
            <div class="input-field">
            
              <i class="fas fa-user"></i>
              <input   name="Nombres_Usuario" type="text" required  />
            </div>


            <label class="guia" for="">Apellido</label>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input  name="Apellidos_Usuario" type="text" required   />
            </div>

            <label class="guia"  for="">Documento</label>
            <div class="input-field">
            <i class="fas fa-id-card-alt"></i>
              <input name="Documento_Identificacion" type="number" required  />
            </div>


            <label  class="guia" for="">Correo</label>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="Correo_Electronico" type="email" required  />
            </div>

            <label  class="guia" for="">Confirma tu correo</label>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="Correo_Electronico2" type="email" required  />
            </div>

            <label  class="guia" for="">Telefono</label>
            <div class="input-field">
            <i class="fas fa-phone-alt"></i>
              <input name="Telefono_Usuario" type="number" required />
            </div>

<br>
<label  class="guia" for="pass" >Contraseña</label>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="Contrasena_Usuario" type="password" id="password" placeholder="contrasena" required/>
            </div>
            <div id="msg"></div>

<label  class="guia" for="RH" > RH</label>
<div class="col-md-6">
            <select  name="Id_RH" class="form-select">
<option>Seleccione RH</option>
<?php foreach($RH as $RHS): ?>
    <option value="<?=$RHS->getId_RH()?>" <?=$RHS->getId_RH() == $usuario->getId_RH() ? 
    'selected' : ''?> >
     <?=$RHS->getTipo_RH()?> </option>
    <?php endforeach;?>
</select>
</div>
<br>
            <input type="submit"  id="login" class="btn solid" />
            <span id="error2"></span>
