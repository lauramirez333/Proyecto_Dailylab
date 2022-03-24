<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- esto va en cada tabla-->
<link rel="stylesheet" href="Views/css/tablas.css">
        <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<!-- esto va en cada tabla-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Historial</title>
    </head>
    <body>

<h1>Historial general </h1>
<div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=index2">Inicio</a></li>
        <li class="breadcrumb-item active">Historial general</li>
    </ol>
</nav>
    </div>

<div class="container"> 

</div> 
<br>
<div class="contact-box">  
<br>



<table class="table table-hover table-striped" id="tabla" class="display">
    <thead class="table">
        <tr>
            <td>Id_Muestra
                <div class="float-right"> <i class="fas fa-arrow-up"></i> 
            <i class="fas fa-arrow-down"></i>
</div>
                    </td>
            <td>Id_Examen</td>
            <td>URL_Resultado</td>
            <td>Estado</td>
            <td>Id_Usuario</td>
            <td>Examen</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Documento de identificacion</td>
            <td> </td>


</tr>    
</thead>  
<tbody>
    <?php foreach($citas as $cita): ?>
        <tr>
        <td> <?= $cita->getId_Muestra() ?> </td>
        <td> <?= $cita->getId_Examen() ?></td>
        <td><a href="<?= $cita->getURL_Resultado() ?>" target="_blank" ><?= $cita->getURL_Resultado() ?> </a> </td>
        <td> <?= $cita->getEstado() ?></td>
        <td> <?= $cita->getId_Usuario() ?></td>
        
        <td> <?= $examen->getById($cita->getId_Examen())->getNombre_Examen() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getNombres_Usuario() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getApellidos_Usuario() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getDocumento_Identificacion() ?></td>

    </tr>
    <?php endforeach; ?>
</tbody>
  
</table>

    </div>
    <script src='Views/js/dataTable.js'></script>

    </body>
    
    </html>