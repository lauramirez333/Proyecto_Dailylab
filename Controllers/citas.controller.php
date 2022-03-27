<?php

require_once "Models/cita.php";
require_once "Models/usuario.php"; //
require_once "Models/sucursal.php";
require_once "Models/RH.php";
require_once "Models/examen.php";
require_once "Models/muestra.examen.php";
require_once "Models/muestra.php";
require_once "Models/tipo_muestra.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


class CitasController
{
  private $model;

  function __CONSTRUCT()
  {
    $this->model = new Cita();
  }

  // function index() // este es el index que ve el paciente
  // {

  //   require "Views/paciente/header.php";
  //   require "Views/paciente/indexPac.php";
  //   // require "Views/footer.php";
  // }

 
  function recordCita()// aparentemente todo esta bien pero no envia nada
  {
    $Id_Usuario = $_GET['Id_Usuario'];
    $usuario=New Usuario(); 
    $Correo_Electronico= $usuario->buscarCorreo($Id_Usuario);
      $Fecha_Cita= $_POST['Fecha_Cita'];
      $Hora_Cita= $_POST['Hora_Cita'];
      $Id_Examen = $_POST['Id_Examen'];
      $Id_Sucursal = $_POST['Id_Sucursal'];
      
      
  

      $usuario = new Usuario(); //?
  
       if($Correo_Electronico)
      {
  
          $mail = new PHPMailer(true);
  
          try {
          
              $mail->SMTPDebug=0; 
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true; 
              $mail->Username   = 'dailylabt@gmail.com';                     //SMTP username
              $mail->Password   = '2184573.Dailylab';                               //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          
          
              $text_message    = "Hola $Correo_Electronico, <br /><br /> Estas recibiendo este correo porque acabas de agendar una cita de toma de muestra en Dailylab";      
             
             
             // HTML email starts here
             
             $message  = "<html><body>";
             
             $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
             
             $message .= "<tr><td>";
             
             $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
              
             $message .= "<thead>
                <tr height='80'>
                 <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Bienvenido a Dailylab</th>
                </tr>
                </thead>";
              
             $message .= "<tbody>
          
                <tr>
                 <td colspan='4' style='padding:15px;'>
                  <p style='font-size:20px;'>Hola ".$Correo_Electronico.",</p>
                  <hr />
                  <p style='font-size:25px;'>Te recordamos los detalles de tu cita: ".$Fecha_Cita.$Hora_Cita.$Id_Examen.$Id_Sucursal.", no olvides que si deseas cancelar la cita, debes hacerlo minimo 3 horas antes.</p>
                  <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$text_message.".</p>
                 </td>
                </tr>
                
                </tbody>";
              
             $message .= "</table>";
             
             $message .= "</td></tr>";
             $message .= "</table>";
             
             $message .= "</body></html>";
             
             // HTML email ends here
                  //Recipients
                  $mail->setFrom('dailylabt@gmail.com', 'Dailylab');
                  $mail->addAddress($Correo_Electronico, 'Mailer');     //Add a recipient
                  $mail->isHTML(true);
                  $mail->Subject = 'Restablecimiento de contraseña';
                  $mail->Body    = $message;
                  $mail->AltBody    = $message;
                   
          
                  
                  $mail->send();
              echo 'Message has been sent';
              echo "<script>alert('Revisa tu correo para encontrar la nueva contraseña');</script>";
              header("location:?c=usuario&a=login"); 
          }catch(Exception $exception){
              echo 'algo salio mal', $exception->getMessage();
              echo "<script>alert('No se pudo mandar correo');</script>";
             
          
          }
  
      }else{
          echo "<script>alert('Tu correo no esta registrado');</script>";
         
         
      }
      
  
  }

  function resulEnf()
  {
  
    $cita = new Cita(); //?
    $cital = $this->model->listAnalisis(); //lista de los que les tiene que subir resultado

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();

    require "Views/Enfermero/header.php";
    require "Views/Enfermero/menu.php";
    // require "Views/footer.php";
  }

  function subirResult()
  {
    $cita = new Cita();
   // $cital = $this->model->listAsist();
   $Id_Cita= $_GET['Id_Cita'];
    $cital = $this->model->list1($Id_Cita);
    $muestra_examen = new Muestra_Examen();
    $muestra_examen->list();
    $muestra = new Muestra();
    $usuario = new Usuario();
    $usuario->list();

    //
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examen->list();
    if (isset($_GET['Id_Usuario'])) {
      $usuario = $usuario->getById($_GET['Id_Usuario']);
    }
    ///////////////////
    //primero llenamos la tabla muestra para ahi si llenar muestra_examen
    $referencia=mt_rand(1,10000000);
   /* echo $passAlea ;
    var_dump($passAlea);*/ //para ver que # esta sacando
    echo "<script>alert($Id_Cita);</script>";
   
    if($this->model->buscarReferencia($Id_Cita)){
      echo "<script>alert('ya hay una muestra asociada');</script>";
      header ("location:?c=citas&a=resulEnf");
    }else{
    $muestra->setReferencia($referencia);
    $muestra->setId_Cita($_GET['Id_Cita']);
    $muestra->insert();
    echo "<script>alert('ya se lleno muestra');</script>";
    /////////////////////////
    require "Views/Enfermero/header.php";
    require "Views/Enfermero/subirResult.php";
    // require "Views/footer.php";
    }
  }

  function guardarResult()
  {
    $cita = new Cita(); 
    $muestra_examen= new Muestra_Examen();
    $muestra= new Muestra();
    $Id_Cita=$_GET['Id_Cita'];
    $muestra -> traerReferencia($Id_Cita);



    //$Id_Muestra= $muestra_examen->list2($Id_Cita);
    $Id_Examen=$muestra_examen->list3($Id_Cita);
    //echo "<script>alert('ID MUESTRA ES'+(int)$Id_Muestra+' y ID EXAMEN ES'+(int)$Id_Examen)';</script>";
 
    
    $muestra_examen->setURL_Resultado($_POST['URL_Resultado']);
    $muestra_examen->setId_Muestra($_GET['Id_Muestra']);
    $muestra_examen->setEstado(1);
    $muestra_examen->setId_Examen((int)$Id_Examen);
    $muestra_examen->setId_Usuario($_GET['Id_Usuario']);
    $muestra_examen->insert();

    echo "<script>alert('ya se inserto el url');</script>";

    header("location:?c=citas&a=resulEnf");
   

  }

  function TomasEnf() // lista de las citas de hoy que ve la enfermera
  {
    $cita = new Cita(); //?
    $citas = $this->model->listEnf(); //lista de los que les tiene que tomar muestra hoy

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();

    require "Views/Enfermero/header.php";
    require "Views/Enfermero/tomasEnf.php";
    // require "Views/footer.php";
  }

  function Menu() // este es el menu de citas que ve el paciente
  {
    $cita = new Cita(); //?
    $cital = $this->model->listUnic(); //objet de tipo list

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();
    //  $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba

    require "Views/paciente/header.php";
    require "Views/paciente/menu.php";
    // require "Views/footer.php";
  }


  function index2() // // este es el index que ve el empleado
  {
    $cita = new Cita(); //?
    $citas = $this->model->list(); //objet de tipo list

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();

    require "Views/empleado/header.php";
    require "Views/empleado/listCitas.php";
    // require "Views/footer.php";
  }

  function viewHistorial()
  {
    $cita = new Cita();
    $citas = $this->model->listHistorialEnf();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();
    $muestra_examen = new Muestra_Examen();
    $citas = $muestra_examen ->listHistorialEnf();

    require "Views/enfermero/header.php";
    require "Views/enfermero/viewHistorial.php";
    // require "Views/footer.php";
  }

  function viewHistorialEmp()
  {
    $cita = new Cita();
    $citas = $this->model->listHistorial();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();
    $muestra_examen = new Muestra_Examen();
   

    require "Views/empleado/header.php";
    require "Views/empleado/viewHistorial.php";
    // require "Views/footer.php";
  }

  function viewHistRolPac()
  { //esta es la vista del historial que se ve en rol paciente
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();
    //$Id_Usuario = $_SESSION['user']->getId_Usuario(); //prueba

    if (isset($_GET['Id_Usuario'])) {
      $citas = $cita->listHistorialPac($_GET['Id_Usuario']);
    }
    require "Views/paciente/header.php";
    require "Views/paciente/historial.php";
    // require "Views/footer.php";
  }
  function viewHistorialPac()
  {
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();
    if (isset($_GET['Id_Usuario'])) {
      $citas = $cita->listHistorialPac2($_GET['Id_Usuario']);
    }
    require "Views/empleado/header.php";
    require "Views/empleado/viewHistorialPac.php";
    // require "Views/footer.php";
  }



  public function viewAgendar()
  { //vista de agendar que ve paciente
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    if (isset($_GET['Id_Cita'])) {
      $cita = $cita->getById($_GET['Id_Cita']);
    }
    require "Views/paciente/header.php";
    require "Views/paciente/agendar.php";
    // require "Views/footer.php";
  }

  public function viewAgendarPac()
  {
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();
    if (isset($_GET['Id_Usuario'])) {
      $usuario = $usuario->getById($_GET['Id_Usuario']);
    } else {
      echo "<script>alert('No se encontro id')</script>";
    }
    require "Views/empleado/header.php";
    require "Views/empleado/agendarPac.php";
    // require "Views/footer.php";
  }

  /*public function saveAgendar(){ //revisal aqui, hay un error y nose a que corresppnde esto
    $cita = new Cita();
      /*  $Id_Cita = intval($_POST['Id_Cita']);
        if($Id_Cita){
            $cita = $cita->getById($Id_Cita);
        }*/

  /*        $cita->setFecha_Cita($_POST['Fecha_Cita']);
        $cita->setHora_Cita($_POST['Hora_Cita']);
        $cita->setEstado_Cita($_POST['Estado_Cita']);
        $cita->setId_Sucursal($_POST['Id_Sucursal']);
        $cita->setId_Examen($_POST['Id_Examen']);

        $cita->insert();

       // var_dump($product->insert());
        header('location:?c=citas');
}*/

  function agendar() //del metodo save
  {

    $cita = new Cita();
    /*$Id_Cita = intval($_POST['Id_Cita']);
    if($Id_Cita)
    {
        $cita= $cita->getById($Id_Cita);
    }  */

    $cita->setFecha_Cita($_POST['Fecha_Cita']);
    $cita->setHora_Cita($_POST['Hora_Cita']);
    $cita->setEstado_Cita(1);
    $cita->setId_Sucursal($_POST['Id_Sucursal']);
    $cita->setId_Examen($_POST['Id_Examen']);
    $cita->setId_Usuario($_SESSION['user']->getId_Usuario());

    $cita->agendarUnic();

    header("location:?c=citas");
  }

  function agendarPac() //proviene del metodo save
  {

    $Id_Examen = $_POST['Id_Examen'];
    $Id_Usuario = $_GET['Id_Usuario'];
    $Fecha_Cita = $_POST['Fecha_Cita'];
    $Id_Sucursal = $_POST['Id_Sucursal'];
    $Id_Examen = $_POST['Id_Examen'];  
    $Hora_Cita = $_POST['Hora_Cita'];

    $cita = new Cita();
    $hoy = date("d/m/Y");

    if ($this->model->dupliCitas($Id_Examen, $_GET['Id_Usuario'])) //esto evita que se pidan 2 citas de la misma especialidad si 1 de ella no se ha vencido todavia 
    {
      echo "<script>alert('ya existe esta cita');</script>";
      header('location:?c=usuario&a=registroPac');

    }else if ($this->model->ValidacionCitas($Fecha_Cita, $Id_Sucursal,$Id_Examen,$Hora_Cita) >= 5 ){ //esto hace que no se puedan agendar mas de 5 citas del mismo examen para la misma fecha y hora y para la misma sucursal
      $var = "Por favor selecciona otra fecha u otra hora por favor";
     
     // header("Refresh:20");
      header('location:?c=citas&a=viewAgendarPac&Id_Usuario='.$Id_Usuario.'');
     echo "<script> alert('".$var."'); </script>";
     // header('location:?c=citas&error');

   
    
    //echo date('H:i:s Y-m-d');
    
    
    } else {
      
      $usuario = new Usuario();

      $Id_Usuario = intval($_POST['Id_Usuario']);
      if ($Id_Usuario) {
        $usuario = $usuario->getById($Id_Usuario);
      }


      $cita->setFecha_Cita($_POST['Fecha_Cita']);
      $cita->setHora_Cita($_POST['Hora_Cita']);
      $cita->setEstado_Cita(1);
      $cita->setId_Sucursal($_POST['Id_Sucursal']);
      $cita->setId_Examen($_POST['Id_Examen']);
      $cita->setId_Usuario($Id_Usuario);
      $cita->agendarUnicPac();

      header("location:?c=citas&a=index2");

    
    }
    }
   


  public function deleteCita()
  {
    $cita = new Cita();
    $cita = $cita->getById($_GET['Id_Cita']);
    $cita->deleteCita();
    header('location:?c=citas');
  }

  function resultados() // arreglar, no sirve
  {
    $cita = new Cita(); //?
    $cital = $this->model->listUnic(); //esta linea no sirve, este mal

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();
    $Id_Usuario = $_SESSION['user']->getId_Usuario(); //prueba

    require "Views/paciente/header.php";
    require "Views/paciente/menu.php";
    // require "Views/footer.php";

    /*  
    $muestra_examen = new Muestra_Examen(); //?
    $muestra_examen->listResult()();
  //  $muestra_examen = $this->model->listResult();//objet de tipo list
    
    $muestra = new Muestra();
    $muestra->list();
    $examen = new Examen();//
    $examen->list();
    $usuario = new Usuario();
    $usuario->list();

    $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba
    
    require "Views/paciente/header.php";
    require "Views/paciente/resultados.php";
    // require "Views/footer.php";
 */
  }
  function changeState()
  {
    date_default_timezone_set("America/Bogota");
    $ahora= date('h:i');
   // echo $ahora;
    
   $Hora_Cita= $_GET['Hora_Cita'];
   $Fecha_Cita= $_GET['Fecha_Cita'];
   $Id_Cita= $_GET['Id_Cita'];

   $ahora = time();
$unDiaEnSegundos = 24 * 60 * 60;
$ahoraLegible = date("Y-m-d", $ahora);
 
if($Fecha_Cita >= $ahoraLegible){ //no esta funcionando

header('location:?c=citas&a=index2');
echo "<script>alert('Ya no la puedes cancelar')
console.log('Ya no la puedes cancelar');</script>";

// } else if($Fecha_Cita == $ahoraLegible){
// if($Hora_Cita >= $ahora){
//   return false; 
//   header('location:?c=citas&a=index2');
//   echo "<script>alert('Ya no la puedes cancelar')
// console.log('Ya no la puedes cancelar');</script>";
// }
//   }else{
    $cita = $this->model->getById($_GET['Id_Cita']);

    $cita->updateState();
    header('location:?c=citas&a=index2');
    //header("?c=citas&a=index2");
  
  }
}
  function asistido()
  {

    $cita = $this->model->getById($_GET['Id_Cita']);
    $cita->asistido();
    // header("Refresh:10");
    header('location:?c=citas&a=TomasEnf');
  
  }
  function noAsistido()
  {

    $cita = $this->model->getById($_GET['Id_Cita']);
    $cita->noAsistido();
    //header("Refresh"); 
    header('location:?c=citas&a=TomasEnf');
  
  }
}