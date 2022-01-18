
<?php

require_once "Models/usuario.php";
require_once "Models/barrio.php";
require_once "Models/rol.php";
require_once "Models/RH.php";
require_once "Models/cita.php";


class UsuarioController
{
private $model;

function __CONSTRUCT()
{
    $this->model = new Usuario(); 
}

function index()// 
{
    $usuario = new Usuario(); //?
    $rol = new Rol();//empleado es role
    $cita = new Cita();
    $usuarios=$this->model->list();//$usuarios = $usuario->list();//objet de tipo list
    require "Views/empleado/header.php";
    require "Views/empleado/usuView.php";
    require "Views/footer.php";
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
    require "Views/footer.php";
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
function save()
{
    $Correo_Electronico= $_POST['Correo_Electronico'];
    $Documento_Identificacion= $_POST['Documento_Identificacion'];

     if($this->model-> dupli($Correo_Electronico,$Documento_Identificacion))
    {

            header('location:?c=usuario&a=login');
            die("ya existes en la base de datos, logueate"); 

    }else{ 
       
    $usuario = new Usuario();
    $Id_Usuario=intval($_POST['Id_Usuario']);   
    if($Id_Usuario)
    {
        $usuario= $usuario->getById($Id_Usuario);
    }  
    $usuario->setCorreo_Electronico($_POST['Correo_Electronico']);
    $usuario->setContrasena_Usuario($_POST['Contrasena_Usuario']);//(password_hash($_POST['Contrasena_Usuario'],PASSWORD_BCRYPT));//ciframos el id
    $usuario->setDocumento_Identificacion($_POST['Documento_Identificacion']);
    $usuario->setTelefono_Usuario($_POST['Telefono_Usuario']);
    $usuario->setId_RH($_POST['Id_RH']);
    $usuario->setNombres_Usuario($_POST['Nombres_Usuario']);
    $usuario->setApellidos_Usuario($_POST['Apellidos_Usuario']);
    $usuario->setId_Rol($_POST['Id_Rol']);
    $Id_Usuario?$usuario->update(): $usuario->insert();
    header("location:?c=usuario&a=login");
    die("registro exitoso");

}
}

function savePac()
{
    $Correo_Electronico= $_POST['Correo_Electronico'];
    $Documento_Identificacion= $_POST['Documento_Identificacion'];

     if($this->model-> dupli($Correo_Electronico,$Documento_Identificacion))
    {

            header('location:?c=usuario&a=registroPac');
            
            die("ya existe este usuario en la base de datos"); 
           
    }else{ 
       
    $usuario = new Usuario();
    $Id_Usuario=intval($_POST['Id_Usuario']);   
    if($Id_Usuario)
    {
        $usuario= $usuario->getById($Id_Usuario);
    }  
    $usuario->setCorreo_Electronico($_POST['Correo_Electronico']);
    $usuario->setContrasena_Usuario($_POST['Contrasena_Usuario']);//(password_hash($_POST['Contrasena_Usuario'],PASSWORD_BCRYPT));//ciframos el id
    $usuario->setDocumento_Identificacion($_POST['Documento_Identificacion']);
    $usuario->setTelefono_Usuario($_POST['Telefono_Usuario']);
    $usuario->setId_RH($_POST['Id_RH']);
    $usuario->setNombres_Usuario($_POST['Nombres_Usuario']);
    $usuario->setApellidos_Usuario($_POST['Apellidos_Usuario']);
    $usuario->setId_Rol(3);
    $Id_Usuario?$usuario->update(): $usuario->insertPac();
    header("location:?c=usuario&a=login");

   
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
    require "Views/footer.php";


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
            header('location: ?c=citas&a=index');
        }
        if($Id_Rol == 3)
        {
            header('location: ?c=citas&a=index');
        }

    }else{ 
        header('location: index.php?error');
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

