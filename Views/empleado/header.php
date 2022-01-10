<!DOCTYPE html>
<html lang="en">
<head>


<!--blibiotecas -->

  <link rel="stylesheet" href="Views/css/menu.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

<!--jquery -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!--funciones para abrir url -->

    <title>Document</title>
    <style>
    </style>
   
<!--stilos -->
  
  <link rel="stylesheet" href="Views/css/style.css" />
    
 
    
</head>

<header> 


<div class="wrapper"> 
  

    <div class="section">

      <!--barra superior -->
      <div class="top_navbar">

      


          <div class="hamburger">
              <a href="#">
                  <i class="fas fa-bars"></i>
              </a>
          </div>

          <!--barra de busqueda -->

          <form autocomplete="on" class="buscar">
            <div>
              <input type="text" name="q" placeholder="Buscar">
            </div>
          </form>

           <!--logo -->
          <div class="logo_name">
            <img class="logo" src="Views/multimedia/logo.png" alt="" width="180" height="60" />

        </div>

      </div>

</header>


<body>


  <div class="wrapper"> 
  

    <div class="section">


      <!--barra lateral -->
   
      <div class="sidebar">
          <div class="profile">
             
            <i class='fas fa-user-cog' style='color:#fdfdfd' ></i>
            
            <h3>
                  Bienvenid@
                  <?=
                   $_SESSION['user']->getCorreo_Electronico();
                   
                 
                  ?>
                 
            </h3>
            
              <p> 
            Empleado
              </p> 
          </div>


<ul>
               <li id="inicio">
                <a href="../../inicio.php">
                    <span class="icon"> <i class='bx bx-grid-alt'></i> </span>
                    <span class="item">Inicio</span>
                </a>
            </li>
            <li id="perfil">
                <a href="#" >
                    <span class="icon"><i class='bx bx-user' ></i></span>
                    <span class="item">perfil</span>
                </a>
            </li>

            
            <li id="usuarios">
            <a href="?c=usuario&a=registroPac" >
                    <span class="icon"><i class='bx bx-band-aid'></i></span>
                    <span  class="item">Registrar Paciente</span>
                </a>
            </li>

            <li id="citas">
            <a href="?c=citas&a=viewAgendarPac" >
                    <span class="icon"><i class='bx bx-band-aid'></i></span>
                    <span  class="item">Agendar Cita</span>
                </a>
            </li>

            <li id="nuevo">
                <a href="?c=citas&a=resultadosPac" >
                    <span class="icon"><i class='bx bxs-calendar-check' ></i></span>
                    <span class="item">historial general</span>
                </a>
  

                <a href="?c=usuario&a=logout"  class="Cerrar_sesion">Cerrar sesión <i class="fas fa-sign-out-alt"></i> </a> </div>

           <!--contenido de la pagina -->

     

      

      

