<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=TomasEnf">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="c=citas&a=resulEnf">Resultados</a></li>
        <li class="breadcrumb-item active">Subir resultados</li>
        
    </ol>
</nav>
    </div>
    <title>Subir resultado</title>
</head>

<body>

    <h1>Subir resultado </h1>

    <div class="container">
        <form action="?c=citas&a=guardarResult&Id_Usuario=<?= $usuario->getId_Usuario()?>&Id_Cita=<?= $cita = $_GET['Id_Cita'] ?>&Id_Muestra=<?= $muestra->getId_Muestra() ?>&Id_Examen=<?= $examen->getId_Examen() ?>" 
        method="post">

            <input type="" name="Id_Usuario" value="<?= $usuario->getId_Usuario() ?>">
            <input type="" name="Id_Cita" value="<?= $cita = $_GET['Id_Cita'] ?>">
            <input type="" name="Id_Muestra" value="<?= $muestra->getId_Muestra() ?>">
 
       
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <td>Documento</td>
                        <td>Nombre </td>
                        <td>Apellido </td>
                        <td>Examen </td>
                        <td>Tipo muestra </td>
                        <td>Referencia </td>
                        <td>Id_Cita </td>
                        <td>Fecha </td>
                    </tr>
                </thead>



                <tr>
                    <td> <?= $usuario->getDocumento_Identificacion() ?> </td>
                    <td> <?= $usuario->getNombres_Usuario() ?> </td>
                    <td> <?= $usuario->getApellidos_Usuario() ?> </td>
                    <!-- <td> <?//= $examen->getById($muestra_examen->getId_Examen())-> getNombre_Examen() ?> </td> -->
                    <?php
                    try {
                        foreach ($cital as $cita) : ?>

                            <td> <?= $examen->getById($cita->getId_Examen())->getNombre_Examen() ?> </td>
                    <?php endforeach;
                    } catch (Exception $e) {
                        die($e->getMessage());
                        die("No se pudo listar");
                    }
                    ?>

<?php
                    try {
                        foreach ($muestra_examen as $muestra_examen) : ?>

                            <td> <?= $muestra_examen->getById($cita->getId_Examen())->getNombre_Examen() ?> </td>
                    <?php endforeach;
                    } catch (Exception $e) {
                        die($e->getMessage());
                        die("No se pudo listar");
                    }
                    ?>


                    <td>Tipo muestra </td>
                    <td> <?= $muestra->getReferencia() ?> </td>
                    <td>id_Cita </td>
                    <td>Fecha </td>
                    </a>


                    </td>
                </tr>

            </table>

            <label class="izq" for="URL_Resultado">Ingresa el link de resultado</label>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input name="URL_Resultado" type="link" placeholder="Usuario" />
            </div>
            <br>
            <button type="submit"  class= "btn btn-primary "> Guardar</button>
            <br>
            <br>
            
  <div class="card-header">
    En caso de tener algún problema con la muestra, por favor llena este espacio con la descripcion del error.<br>
     Esta sera notificada al paciente.Si es necesario tomar la muestra de nuevo por favor especificar. 
  </div>
  <form action="?c=usuario&a=reportarError" method="post">
  <div class="card-body">
    <textarea class="card-title" rows="10" cols="60" name="error"></textarea>
    
    <input class= "btn btn-primary btn-block" type="submit" value="Reportar error" />
                      
    
    </form>
  </div>
</div>

        </form>
    </div>
</body>

</html>