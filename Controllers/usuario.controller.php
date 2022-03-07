
<?php

require_once "Models/usuario.php";
require_once "Models/barrio.php";
require_once "Models/rol.php";
require_once "Models/RH.php";
require_once "Models/cita.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require '../vendor/autoload.php';
require 'vendor/autoload.php';


class UsuarioController
{
private $model;

function __CONSTRUCT()
{
    $this->model = new Usuario(); 
}

function recuPass()// aparentemente todo esta bien pero no envia nada
{
    $Correo_Electronico= $_POST['Correo_Electronico'];

    $usuario = new Usuario(); //?

     if($this->model->recuPass($Correo_Electronico))
    {
        $passAlea=mt_rand(1,1000000);

//CON ESTE SE HACEN CADENAS STRING ALEATORIAS EN VEZ DE NUMEROS  
// $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
// // Output: 54esmdr0qf
// echo substr(str_shuffle($permitted_chars), 0, 10);

        $this->model->updatePass($passAlea,$Correo_Electronico);

        $mail = new PHPMailer(true);

        try {
        
            $mail->SMTPDebug=0; 
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true; 
            $mail->Username   = 'dailylabt@gmail.com';                     //SMTP username
            $mail->Password   = '2184573Dailylab';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        
            $text_message    = "Hola $Correo_Electronico, <br /><br /> Estas recibiendo este correo porque acabas de registrarte en www.dailylab.com";      
           
           
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
                <p style='font-size:20px;'>Hola' ".$Correo_Electronico.",</p>
                <hr />
                <p style='font-size:25px;'>Estamos muy felices de que ahora seas parte de dailylab. A continuacion, te recordamos tu contraseña: ".$passAlea.", no olvides guardarla en un lugar seguro y no compartirla con nadie</p>
                <img src='https://4.bp.blogspot.com/-rt_1MYMOzTs/VrXIUlYgaqI/AAAAAAAAAaI/c0zaPtl060I/s1600/Image-Upload-Insert-Update-Delete-PHP-MySQL.png' alt='Sending HTML eMail using PHPMailer in PHP' title='Sending HTML eMail using PHPMailer in PHP' style='height:auto; width:100%; max-width:100%;' />
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
                $mail->setFrom('dailylabt@gmail.com', 'Mailer');
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

function index()// 
{
    $usuario = new Usuario(); //?
    $rol = new Rol();//empleado es role
    $cita = new Cita();
    $usuarios=$this->model->list();//$usuarios = $usuario->list();//objet de tipo list
    require "Views/empleado/header.php";
    require "Views/empleado/usuView.php";
    // require "Views/footer.php";
}

function recuperarPass(){
    require "Views/usuario/recuperarPass.php"; 
  //  require "Views/usuario/emailPass.php"; 
}

function verPerfil()// 
{

    $usuario = new Usuario(); //?
    $rol = new Rol();//empleado es role
    $RH = new RH();
    $usuarios= $this->model->verPerfil();//$usuarios = $usuario->list();//objet de tipo list
    
    $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba
    
    require "Views/paciente/header.php";
    require "Views/paciente/verPerfil.php";
    
    // require "Views/footer.php";
}



public function agendar(){
    require "Views/paciente/agendar.php";
}

/*
public function editarUnique(){
    $usuario = new Usuario();
    
    $brands=$brand->list();
    if(isset($_GET['id'])){
        $product = $product->getById($_GET['id']); 
    }
    require "views/product/form.php";
}
*/
function envioMail($Correo_Electronico,$Contrasena_Usuario){
    
    //$Correo_Electronico= $_POST['Correo_Electronico'];
    $mail = new PHPMailer(true);
    
    try {
    
        $mail->SMTPDebug=0; 
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; 
        $mail->Username   = 'dailylabt@gmail.com';                     //SMTP username
        $mail->Password   = '2184573Dailylab';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        
    
        $text_message    = "Hola $Correo_Electronico, <br /><br /> Estas recibiendo este correo porque acabas de registrarte en www.dailylab.com";      
       
       
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
            <p style='font-size:20px;'>Hola' ".$Correo_Electronico.",</p>
            <hr />
            <p style='font-size:25px;'>Estamos muy felices de que ahora seas parte de dailylab. A continuacion, te recordamos tu contraseña: $Contrasena_Usuario, no olvides guardarla en un lugar seguro y no compartirla con nadie</p>
            <img src='https://4.bp.blogspot.com/-rt_1MYMOzTs/VrXIUlYgaqI/AAAAAAAAAaI/c0zaPtl060I/s1600/Image-Upload-Insert-Update-Delete-PHP-MySQL.png' alt='Sending HTML eMail using PHPMailer in PHP' title='Sending HTML eMail using PHPMailer in PHP' style='height:auto; width:100%; max-width:100%;' />
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
            $mail->setFrom('dailylabt@gmail.com', 'Mailer');
            $mail->addAddress($Correo_Electronico, 'Mailer');     //Add a recipient
            $mail->isHTML(true);
            $mail->Subject = 'Bienvenido a dailylab';
            $mail->Body    = $message;
            $mail->AltBody    = $message;
             
            $mail->send();
        echo 'Message has been sent';
        header("location:?c=usuario&a=login");
    }catch(Exception $exception){
        echo 'algo salio mal', $exception->getMessage();
    
    }
    
    }
    function save()//aqui se insertan los datos del registro
{
    $Correo_Electronico= $_POST['Correo_Electronico'];
    $Contrasena_Usuario= $_POST['Contrasena_Usuario'];
    $Documento_Identificacion= $_POST['Documento_Identificacion'];

     if($this->model-> dupli($Correo_Electronico,$Documento_Identificacion))
    {
        header('location:?c=usuario&a=login');
        die("ya existes en la base de datos, logueate");
        echo ' '; 
        echo "<script>alert('ya existe este usuario en la base de datos');</script>";
       
       // require "Views/usuario/registro.php";
        require "Views/alertas/registro.php";
           

    }else{ 
    $usuario = new Usuario();
 /*   $Id_Usuario=intval($_POST['Id_Usuario']);   
    if($Id_Usuario)
    {
        $usuario= $usuario->getById($Id_Usuario);
    }  */
    $usuario->setCorreo_Electronico($_POST['Correo_Electronico']);
    $usuario->setContrasena_Usuario($_POST['Contrasena_Usuario']);//(password_hash($_POST['Contrasena_Usuario'],PASSWORD_BCRYPT));//ciframos el id
    $usuario->setDocumento_Identificacion($_POST['Documento_Identificacion']);
    $usuario->setTelefono_Usuario($_POST['Telefono_Usuario']);
    $usuario->setId_RH($_POST['Id_RH']);
    $usuario->setNombres_Usuario($_POST['Nombres_Usuario']);
    $usuario->setApellidos_Usuario($_POST['Apellidos_Usuario']);
    if($_POST['Id_Area'] == 1234){//para empleado
        $usuario->setId_Rol(2);       
    }else{
        if($_POST['Id_Area'] == 5678){//para enfermero
            $usuario->setId_Rol(5);
        }else{
            $usuario->setId_Rol(3);//para paciente
        }
    }
  //  $usuario->setId_Rol($_POST['Id_Area']);
    $usuario->insert();
    //$this->envioMail();
    $this->envioMail($Correo_Electronico,$Contrasena_Usuario);

    header("location:?c=usuario&a=login");
    die("registro exitoso");

   // require "Views/usuario/registro.php";
    require "Views/alertas/registro.php";
    

}
}

function savePac()
{
    $Correo_Electronico= $_POST['Correo_Electronico'];
    $Documento_Identificacion= $_POST['Documento_Identificacion'];

     if($this->model-> dupli($Correo_Electronico,$Documento_Identificacion))
    {

            header('location:?c=usuario&a=registroPac');
            echo "<script>alert('ya existe este usuario en la base de datos');</script>";
           
            die("ya existe este usuario en la base de datos"); 
           
    }else{ 
       
    $usuario = new Usuario();
    $Id_Usuario=intval($_POST['Id_Usuario']);   
    if($Id_Usuario)
    {
        $usuario= $usuario->getById($Id_Usuario);
    }  

    $passAlea=mt_rand(1,1000000);
    echo $passAlea ;
    var_dump($passAlea);

    $usuario->setCorreo_Electronico($_POST['Correo_Electronico']);
    $usuario->setContrasena_Usuario($passAlea);//$usuario->setContrasena_Usuario($_POST['Contrasena_Usuario']);//(password_hash($_POST['Contrasena_Usuario'],PASSWORD_BCRYPT));//ciframos el id
    $usuario->setDocumento_Identificacion($_POST['Documento_Identificacion']);
    $usuario->setTelefono_Usuario($_POST['Telefono_Usuario']);
    $usuario->setId_RH($_POST['Id_RH']);
    $usuario->setNombres_Usuario($_POST['Nombres_Usuario']);
    $usuario->setApellidos_Usuario($_POST['Apellidos_Usuario']);
    $usuario->setId_Rol(3);
    $Id_Usuario?$usuario->update(): $usuario->insertPac();
    header("location:?c=usuario&a=registroPac");

    echo "<script>alert('Registro exitoso');</script>";
    die("registro exitoso"); 
   

}
}

function registro()
{
    $usuario = new Usuario();
    $rol = new Rol();
    $RH = new RH();
    $barrio=new Barrio();
    $usuarios=$usuario->list();
    $RH=$RH->list();
    $roles=$rol->list();
    if(isset($_GET['Id_Usuario'])){
        $usuario = $usuario->getById($_GET['Id_Usuario']); 
    }
    
    require "Views/usuario/registro.php";
  //  require "Views/usuario/registroPrueba.php";

}

function registroPac()
{
    $usuario = new Usuario();
    $rol = new Rol();
    $RH = new RH();
    $barrio=new Barrio();
    $usuarios=$usuario->list();
    $RH=$RH->list();
    $roles=$rol->list();
    if(isset($_GET['Id_Usuario'])){
        $usuario = $usuario->getById($_GET['Id_Usuario']); 
    }
    require "Views/empleado/header.php";
    require "Views/empleado/registroPac.php";
    // require "Views/footer.php";


}

function login()
{
    require "Views/usuario/login.php";
}

function validate()
{
    $Correo_Electronico= $_POST['Correo_Electronico'];
    $Contrasena_Usuario= $_POST['Contrasena_Usuario'];

 
     if($this->model->login($Correo_Electronico,$Contrasena_Usuario))
    {
      //en esto me ayudo el profe
        $Id_Rol=$_SESSION['user']->getId_Rol();
      //  die(var_dump($Id_Rol));
        if($Id_Rol == 1 || $Id_Rol == 2)

        
        {   
            header('location: ?c=citas&a=index2');
            
           
        }
        if($Id_Rol == 4 || $Id_Rol == 5)
        {
             header('location: ?c=citas&a=TomasEnf');
        }
        if($Id_Rol == 3)
        {
            header('location: ?c=citas&a=Menu');
        }

    }else{ 
       // header('location: index.php?error');
        require "Views/alertas/nousuario.php";
        require "Views/usuario/login.php";
        ?> 
<script type="text/javascript">
  jsFunction();
</script>
<?php

       

    }
}

function logout()
{
    session_destroy();
    header('location:?c=home&a=index');
  //  header('location:?c=home&a=index');  //header('location: index.php');

}

/*function changeState(){
    
    $user = $this->model->getById($_GET['id']);
    $user->updateState();
    header("location:?c=user");
}*/

}