
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <input type="hidden" name="Id_Usuario" value="<?=$usuario->getId_Usuario() ?>"> <!--esto no esta mostrando el id que es, el metodo esta "confuncido" con el id y por eso no muestra lo que es-->
        
        <h1>Historial</h1>
        <div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=citas&a=index2">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?c=usuario&a=index">Pacientes</a></li>
        <li class="breadcrumb-item active">Historial</li>
    </ol>
</nav>
    </div>
<br>
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

        
    </td>
    </tr>
    <?php endforeach; ?>

</table>


    </div>
    </body>
    </html>