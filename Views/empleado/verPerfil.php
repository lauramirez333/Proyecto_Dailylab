

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- esto va en cada tabla-->
<link rel="stylesheet" href="Views/css/perfil.css">
<link rel="stylesheet" href="Views/css/tablas.css">
<link rel="stylesheet" href="Views\css\modal.css">
<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<!-- esto va en cada tabla-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Ver perfil</title>
        <h1>Mis Datos </h1>
    </head>
    <body>

    <div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=Menu">Inicio</a></li>
        <li class="breadcrumb-item active">Datos personales</li>
        <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="Views/multimedia/perfil.png" alt="img-avatar">
                  

                </div>

            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <center>
            <button class="agendar" id="open">Agenda una cita</button>
            </center>
<div id="modal_container" class="fondo">



  <div class="ventana">


    <h1>DAILYLAB </h1>
    <p  class=" text-dark font-weight-bold" >
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nisi dolor eveniet consequatur. Voluptate quasi nostrum voluptates ducimus vitae aliquam et inventore, accusamus repellendus. Doloremque quisquam consequuntur deserunt corrupti provident? Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores cum beatae consectetur et laboriosam modi in reiciendis laborum voluptatibus, doloribus provident accusamus officia architecto odio nam dolorum nesciunt eius explicabo!
                    </p>
    <input type="checkbox" id="cbox2" value="second_checkbox"> <label for="cbox2"  require >Acepto terminos y condiciones.</label>
    

    
    
    <button id="close">Aceptar</button>

    
  </div>


</div>

<script src='Views/js/modal.js'></script>


            </div>


            <div class="perfil-usuario-footer">
               
                <ul class="lista-datos">
                    <li><i class="icono fas fa-user-check""></i> Nombre :</li>
                    <li><i class="icono fas fa-user-check""></i> Apellido:</li>
                    <li><i class="icono fas fa-briefcase"></i> Correo:</li>
                    <li><i class="icono fas fa-phone-alt"></i> Telefono:</li>
                </ul>
                <ul class="lista-datos">
                    <li><i class=""></i> <?=$_SESSION['user']->getNombres_Usuario();?> </li>
                    <li><i class=""></i><?=$_SESSION['user']->getApellidos_Usuario();?></li>
                    <li><i class=""></i> <?=$_SESSION['user']->getCorreo_Electronico();?></li>
                    <li><i class=""></i> <?=$_SESSION['user']->getTelefono_Usuario();?></li>
                </ul>

            
               
                <ul class="lista-datos">
                    <li><i class="icono fas fa-user-check""></i> DOCUMENTO :</li>
                    <li><i class="icono fas fa-user-check""></i> Apellido:</li>
                    <li><i class="icono fas fa-briefcase"></i> Correo:</li>
                    <li><i class="icono fas fa-phone-alt"></i> Telefono:</li>
                </ul>
                <ul class="lista-datos">
                    <li><i class=""></i> <?=$_SESSION['user']->getDocumento_Identificacion();?> </li>
                    <li><i class=""></i><?=$_SESSION['user']->getApellidos_Usuario();?></li>
                    <li><i class=""></i> <?=$_SESSION['user']->getCorreo_Electronico();?></li>
                    <li><i class=""></i> <?=$_SESSION['user']->getTelefono_Usuario();?></li>
                </ul>
              
            </div>

        </div>
    </section>

<style>
.mensaje a {
    color: inherit;
    margin-right: .5rem;
    display: inline-block;
}
.mensaje a:hover {
    color: #309B76;
    transform: scale(1.4)
}
</style>





<div class="mis-redes" style="display: block;position: fixed;bottom: 1rem;left: 1rem; opacity: 0.5; z-index: 1000;">
    <p style="font-size: .75rem;">Apock graficos</p>

</div>
<!--====  End of tarjeta  ====-->

    </body>
    </html>