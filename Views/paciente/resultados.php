<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <h1>Mis Resultados </h1>
    <div class="container-fluid">
        <br>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="?=citas&a=index">Inicio</a></li>
            <li class="breadcrumb-item"><a class="active" href="#">Resultados</a></li>
        </ul>
        <br>
    </div>

    <title>Mis citas</title>
</head>

<body>



    <br>
    <div class="container">

    </div>
    <br>
    <div class="container">
        <br>
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <td>ID_Muestra</td>
                    <td>Ix_Examn </td>
                    <td>URL </td>
                    <td>Estado </td>

                </tr>
            </thead>

            <?php
            try {
                foreach ($muestra_examen as $mye) : ?>

                    <tr>
                        <td> <?= $muestra->getById($mye->getId_Muestra())->getReferencia() ?> </td>
                        <td> <?= $examen->getById($mye->getId_Examen())->getNombre_Examen() ?> </td>
                        <td> <a> <?= $mye->getURL_Resultado() ?> </a></td>
                        <td> <?= $mye->getEstado() ?> </td>

                        </td>
                    </tr>
            <?php endforeach;
            } catch (Exception $e) {
                die($e->getMessage());
                die("No se pudo listar");
            }
            ?>
        </table>

    </div>
</body>

</html>