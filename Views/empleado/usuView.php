

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

<title>Pacientes</title>
    </head>
    <body>

<h1>Pacientes </h1>

<div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=index2">Inicio</a></li>
        <li class="breadcrumb-item active">Pacientes</li>
    </ol>
</nav>
    </div>

    
<div class="container"> 

</div> 

<div class="contact-box">  
<br>
<table class="table table-hover table-striped" id="tabla" class="display">
    <thead class="table">
    <tr>
    <th>Documento Identificación 
                <div class="float-right"> <i class="fas fa-arrow-up"></i> 
            <i class="fas fa-arrow-down"></i>
</div>
                    </th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Telefono</th>
		<th>Correo Electrónico</th>
		<th colspan="2">Acciones</th>
	</tr>
	


    </thead>  

    <?php 
    try{
        foreach($usuarios as $usuario): ?> 

        <tr>
            
        <td> <?= $usuario->getDocumento_Identificacion() ?> </td>
        <td> <?= $usuario->getNombres_Usuario() ?> </td>
        <td> <?= $usuario->getApellidos_Usuario() ?> </td>
        <td> <?= $usuario->getTelefono_Usuario() ?> </td>
        <td> <?= $usuario->getCorreo_Electronico() ?> </td>
 
        <td> <a href="?c=citas&a=viewAgendarPac&Id_Usuario=<?= $usuario->getId_Usuario() ?>" class= "btn btn-primary">Agendar Cita</a> </td>        
        <td> <a href="?c=citas&a=viewHistorialPac&Id_Usuario=<?= $usuario->getId_Usuario() ?>" class= "btn btn-secondary">Ver Historial</a> </td>        
                          
        </a>
        

        </td>
    </tr>
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>
    </tbody>
</table>

    </div>
    <script src='Views/js/dataTable.js'></script>
    </body>
    </html>