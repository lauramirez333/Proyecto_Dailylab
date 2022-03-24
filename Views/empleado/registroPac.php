

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

<title>Registro de usuarios</title>
</head>

<body>

  <h1>Registro de usuarios </h1>

  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=index2">Inicio</a></li>
        <li class="breadcrumb-item active"><b>Registrar Pacientes</b></li>
      </ol>
    </nav>
  </div>

  

  <form action="?c=usuario&a=savePac" id="registro" method="post">
                 

          <!--<form action="?c=usuario&a=validate" method="post"> -->
          <div class="container-fluid">

            <div class="card" style="width: 40rem; margin:auto">
              <div class="card-body">


                <div class="container">
 
<div class="container">
  <div class="form-row">


    <div class="col-md-6">
    

    <label class="guia" for="Nombres_Usuario"><b>Nombre*</b></label>

<input  class="form-control" name="Nombres_Usuario" id="Nombres_Usuario" type="text" maxlength="25" oninput="maxlengthNumber(this);" required />



    </div>
    <div class="col-md-6">

    <label class="guia" for="Apellidos_Usuario"><b>Apellido*</b></label>

<input  class="form-control" name="Apellidos_Usuario" id="Apellidos_Usuario" type="text" maxlength="25" oninput="maxlengthNumber(this);" required />


    </div>

  </div>

  <div class="form-row">

  
<div class="col-md-6">



            <label class="guia" for=""><b>Documento*</b></label>

              <input  class="form-control" name="Documento_Identificacion" id="Documento_Identificacion" type="number" maxlength="10" oninput="maxlengthNumber(this);" required />
        


</div>
<div class="col-md-6">

<label class="guia" for=""><b>Telefono*</b></label>

<input  class="form-control" name="Telefono_Usuario" id="Telefono_Usuario" type="number" maxlength="10" oninput="maxlengthNumber(this);" required />


</div>

</div>


<script>
              function maxlengthNumber(obj) {
                if (obj.value.length > obj.maxLength) {
                  obj.value = obj.value.slice(0, obj.maxLength);
                }
              }
            </script>
<div class="form-row">

  
<div class="col-md-6">


<label  for="Id_RH" id="Id_RH"><b>RH*</b></label>
           
              <select class="form-control" name="Id_RH" id="Id_RH" class="form-select">
                <option>Seleccione RH</option>
                <?php foreach ($RH as $RHS) : ?>
                  <option value="<?= $RHS->getId_RH() ?>" <?= $RHS->getId_RH() == $usuario->getId_RH() ?
                                                            'selected' : '' ?>>
                    <?= $RHS->getTipo_RH() ?> </option>
                <?php endforeach; ?>
              </select>
           


</div>
<div class="col-md-6">

<label class="guia" for=""><b>Correo*</b></label>

<input class="form-control" name="Correo_Electronico" id="Correo_Electronico" type="email" maxlength="40" oninput="maxlengthNumber(this);" required />


</div>

</div>


<div class="form-row">

  
<div class="col-md-6">

<label class="guia" for=""><b>Confirma tu correo*</b></label>
 
 <input  class="form-control" name="Correo_Electronico2" id="Correo_Electronico2" type="email" maxlength="40" oninput="maxlengthNumber(this);" required />



</div>
<div class="col-md-6">



</div>

</div>


<div class="form-row">

<input type="submit" onclick='return enviarFormulario();' id="login" class="btn solid" />
            </form>
            <div id="error"></div>
            <script src='Views/js/registroPac.js'></script>

</div>







</div>



          </div>

        </div>
      </div>