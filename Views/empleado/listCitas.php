
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Citas</title>
<h1> Citas </h1>

<ul class="breadcrumb">
  <li class="breadcrumb-item"><a class="active"href="#">Inicio-Citas</a></li>
</ul>
</div>

<div class="container"> 

</div> 

<div class="container">  
<br>
<table class="table table-hover table-striped"> 
    <thead class="table-dark">
        <tr>
            <td>Fecha  </td>
            <td>Hora</td>
            <td>Estado</td>
            <td>Examen</td>
            <td>Usuario</td>
            <td> </td>
            <td>Documento</td>
            <td>Sucursal</td>
            <td>Editar</td>

</tr>    
</thead>  
<tbody>
    <?php foreach($citas as $cita): ?>
        <tr>
        <td> <?= $cita->getFecha_Cita() ?> </td>
        <td> <?= $cita->getHora_Cita() ?></td>
        <td> <?= $cita->getEstado_Cita() ?></td>
        <td> <?= $examen->getById($cita->getId_Examen())->getNombre_Examen() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getNombres_Usuario() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getApellidos_Usuario() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getDocumento_Identificacion() ?></td>
        <td> <?= $sucursal->getById($cita->getId_Sucursal())->getNombre_Sucursal() ?></td>
       <td>
        <a href="?c=product&a=form&id=<?= $usuario->getId_Usuario() ?>" class= "btn btn-warning">Cancelar cita</a>

        
    </td>
    </tr>
    <?php endforeach; ?>

</table>


    </div>
    </body>
    </html>