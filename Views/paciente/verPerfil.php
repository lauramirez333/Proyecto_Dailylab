

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Ver perfil</title>
    </head>
    <body>
    <div class= "container-fluid">
<br>

<ol class= "breadcrumb">
<li><a href="?c=citas&a=index">Inicio  </a> >> </li> 
    <li class="active"> Mis Datos  </li>     
</ol>   
</div>
        
<!--<a href="?c=product&a=form&id=<//?= $product->getId() ?>" class= "btn btn-warning">Editar</a> -->
<a href="?c=usuario&a=editarUnique&Id_Usuario=<?= $usuario->getId_Usuario() ?>">Editar</a>
<h1>Mis Datos </h1>

<br>
<div class="container"> 

</div> 
<br>
<div class="container">  
<br>
<table class="table table-hover table-striped"> 
    <thead class="table-dark">
        <tr>
            <td>ID</td>
            <td>Nombres </td>
            <td>Apellidos </td>
            <td>Rol </td>
            <td>Documento Identificacion </td>
            <td>Correo </td>
            <td>Telefono </td>
            <td>RH</td>
            
        </tr>    
    </thead>  
<tbody>
    <?php 
    echo (var_dump($usuarios));
  //  try{
        foreach($usuarios as $usuario): ?> 

        <tr>
        <td> <?= $usuario->getId_Usuario() ?> </td>
        <td> <?= $usuario->getNombres_Usuario() ?> </td>
        <td> <?= $usuario->getApellidos_Usuario() ?> </td>
        <td> <?= $Rol->getById($usuario->getId_Rol())->getNombre_Rol() ?> </td>
        <td> <?= $usuario->getDocumento_Identificacion() ?> </td>
        <td> <?= $usuario->getCorreo_Electronico() ?> </td>
        <td> <?= $usuario->getTelefono_Usuario() ?> </td>
        <td> <?= $RH->getById($usuario->getId_RH())->getTipo_RH() ?> </td>
     
<a href="?c=citas&a=delete&Id_Cita=<?= $cita->getId_Cita() ?>" class= "btn btn-danger">Cancelar</a>
        </td>
    </tr>
    <?php endforeach; 

   // }catch(Exception $e){
   //     die($e->getMessage());
    //    die("No se pudo listar");
  //  }
    ?>
    </tbody>
</table>
    </div>
    </body>
    </html>