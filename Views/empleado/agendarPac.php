<h4><?=$cita->getId_Cita() ? 'Editar' : 'Nuevo'?> Agendamiento </h4>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- esto va en cada tabla-->
    <link rel="stylesheet" href="Views/css/formularios.css">

<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<!-- esto va en cada tabla-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body>
    <div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=citas&a=index2">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?c=usuario&a=index">Pacientes</a></li>
        <li class="breadcrumb-item active">Agendar Pacientes</li>
    </ol>
</nav>
    </div>
       
    <title>Agenda</title>
</head>

    
<h1>Agenda cita </h1>

<section class="contact-box">
       <div class="row no-gutters bg-lithe">

           <div >
                <div class="container align-self-center p-9">
                    <h1 class=" text-dark font-weight-bold mb-3">Agenda</h1>
                    <div class="form-group">

                    </div>
<form action= "?c=citas&a=agendarPac&Id_Usuario=<?= $usuario->getId_Usuario() ?>" method ="post" id="agendar">

<input type="hidden" name="Id_Usuario" value="<?=$usuario->getId_Usuario() ?>">

<table class="table table-hover table-striped" id="tabla" class="display">
    <thead  class="table">
        <tr>
            <td>Documento</td>
            <td>Nombre </td>
            <td>Apellido </td>
            <td>Correo </td>
        </tr>    
    </thead>  

 
   
        <tr>
        <td> <?= $usuario->getDocumento_Identificacion()?> </td>
        <td> <?= $usuario->getNombres_Usuario()?> </td>
        <td> <?= $usuario->getApellidos_Usuario() ?> </td>
        <td> <?= $usuario->getCorreo_Electronico()?> </td> 
                        
        </a>
        

        </td>
    </tr>
   
</table>

<div class="form-row mb-2" >
<div class="form-group col-md-6" >


<label class=" text-dark font-weight-bold" for="Fecha_Cita"> Fecha: </label>

<input class="form-control" id="fecha" onMouseOut='fuera()' type="date" name="Fecha_Cita" >
<div id="info2"></div>
<script src='Views/js/evitaWeekends.js'></script>


</div>

<div  class="form-group col-md-6" >
<label class=" text-dark font-weight-bold" for="Hora_Cita"> Hora: </label>
<input class="form-control" id="hora"  type="time"  name="Hora_Cita" min='06:00:00' max='18:00:00' >
<div id="info"></div>
<script src='Views/js/hora.js'></script>
 


</div>
</div>

<div class="form-row mb-2" >
<div  class="form-group col-md-6" >
<label   class=" text-dark font-weight-bold" for="Id_Sucursal"> sucursal: </label>
<br>
<select  id="sucursal" name="Id_Sucursal" class="form-control">

<option></option>
<?php foreach($sucursales as $sucursal): ?>
    <option value="<?=$sucursal->getId_Sucursal()?>" <?=$sucursal->getId_Sucursal() == $cita->getId_Sucursal() ? 
    'selected' : ''?> >
     <?=$sucursal->getNombre_Sucursal()?> </option>
    <?php endforeach;?>
</select>

</div>
<br>
<div  class="form-group col-md-6" >
<label class=" text-dark font-weight-bold" for="Id_Examen"> examenes: </label>
<br>
<select  id="examenes" name="Id_Examen" class="form-control">
<option></option>
<?php foreach($examenes as $examen): ?>
    <option value="<?=$examen->getId_Examen()?>" <?=$examen->getId_Examen() == $cita->getId_Examen() ? 
    'selected' : ''?> >
     <?=$examen->getNombre_Examen()?> </option>
    <?php endforeach;?>
</select>

</div>
</div>
<div>
                       
                       <input class="btn btn-primary width-100" type="submit" onclick='return enviarFormulario();' id="login" class="btn solid" />
                       <div  class="error" id="error"></div>
                       <script src='Views/js/agendar.js'></script>
                       </div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                      
</body>
</html>
