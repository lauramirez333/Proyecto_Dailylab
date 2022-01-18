<?php

require_once "Models/cita.php";
require_once "Models/usuario.php";//
require_once "Models/sucursal.php";
require_once "Models/RH.php";
require_once "Models/examen.php";
require_once "Models/muestra.examen.php";


class CitasController
{
private $model;

function __CONSTRUCT()
{
    $this->model = new Cita(); 
}

function index()// este es el index que ve el paciente
{
    
    require "Views/paciente/header.php";
    require "Views/paciente/indexPac.php";
    require "Views/footer.php";
    

}

function Menu()// este es el menu de citas que ve el paciente
{
    $cita = new Cita(); //?
    $cital = $this->model->listUnic();//objet de tipo list
    
    $sucursal = new Sucursal();
    $usuario = new Usuario();//
    $RH = new RH();
    $examen = new Examen();
  //  $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba
    
    require "Views/paciente/header.php";
    require "Views/paciente/menu.php";
    require "Views/footer.php";
    

}


function index2()// // este es el index que ve el empleado
{
    $cita = new Cita(); //?
    $citas = $this->model->list();//objet de tipo list
    
    $sucursal = new Sucursal();
    $usuario = new Usuario();//
    $RH = new RH();
    $examen = new Examen();

    require "Views/empleado/header.php";
    require "Views/empleado/listCitas.php";
    require "Views/footer.php";
    

}
 
function viewHistorial(){
  $cita = new Cita();
  $citas = $this->model->listHistorial();
  $sucursal = new Sucursal();
  $sucursales=$sucursal->list();
  $examen = new Examen();
  $examenes=$examen->list();
  $usuario = new Usuario();
  $usuarios=$usuario->list();

  require "Views/empleado/header.php";
  require "Views/empleado/viewHistorial.php";
  require "Views/footer.php";
}

function viewHistRolPac(){ //esta es la vista del historial que se ve en rol paciente
  $cita = new Cita();
  $sucursal = new Sucursal();
  $sucursales=$sucursal->list();
  $examen = new Examen();
  $examenes=$examen->list();
  $usuario = new Usuario();
  $usuarios=$usuario->list();
  $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba
    
  if(isset($_GET['Id_Usuario'])){
      $citas = $cita->listHistorialPac($_GET['Id_Usuario']); 
  }
  require "Views/paciente/header.php";
  require "Views/paciente/historial.php";
  require "Views/footer.php";

}
function viewHistorialPac(){
  $cita = new Cita();
  $sucursal = new Sucursal();
  $sucursales=$sucursal->list();
  $examen = new Examen();
  $examenes=$examen->list();
  $usuario = new Usuario();
  $usuarios=$usuario->list();
  if(isset($_GET['Id_Usuario'])){
      $citas = $cita->listHistorialPac($_GET['Id_Usuario']); 
  }
  require "Views/empleado/header.php";
  require "Views/empleado/viewHistorialPac.php";
  require "Views/footer.php";
}



public function viewAgendar(){ //vista de agendar que ve paciente
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales=$sucursal->list();
    $examen = new Examen();
    $examenes=$examen->list();
    $usuario = new Usuario();
    if(isset($_GET['Id_Cita'])){
        $cita = $cita ->getById($_GET['Id_Cita']); 
    }
    require "Views/paciente/header.php";
    require "Views/paciente/agendar.php";
    require "Views/footer.php";
}

public function viewAgendarPac(){
  $cita = new Cita();
  $sucursal = new Sucursal();
  $sucursales=$sucursal->list();
  $examen = new Examen();
  $examenes=$examen->list();
  $usuario = new Usuario();
  $usuarios=$usuario->list();
  if(isset($_GET['Id_Usuario'])){
      $usuario = $usuario->getById($_GET['Id_Usuario']); 
  }
  require "Views/empleado/header.php";
  require "Views/empleado/agendarPac.php";
  require "Views/footer.php";
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

function agendar()//del metodo save
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

function agendarPac()//del metodo save
{

    $cita = new Cita();
    $usuario = new Usuario();

    $Id_Usuario = intval($_POST['Id_Usuario']);
        if($Id_Usuario){
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
public function deleteCita(){
    $cita = new Cita();
    $cita=$cita->getById($_GET['Id_Cita']);
    $cita->deleteCita();
   header('location:?c=citas');
}

function resultados()// arreglar, no sirve
{
    $cita = new Cita(); //?
    $cital = $this->model->listUnic();//esta linea no sirve, este mal
    
    $sucursal = new Sucursal();
    $usuario = new Usuario();//
    $RH = new RH();
    $examen = new Examen();
    $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba
    
    require "Views/paciente/header.php";
    require "Views/paciente/menu.php";
    require "Views/footer.php";
  
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
    require "Views/footer.php";
 */   

}
function resultadosPac()// arreglar, no sirve
{
    $cita = new Cita(); //?
    $cital = $this->model->listUnic();//esta linea no sirve, este mal
    
    $sucursal = new Sucursal();
    $usuario = new Usuario();//
    $RH = new RH();
    $examen = new Examen();
    $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba
    
    require "Views/empleado/header.php";
    require "Views/empleado/resultados.php";
    require "Views/footer.php";
}
function changeState(){
    
  $cita = $this->model->getById($_GET['Id_Cita']);
  $cita->updateState();
  header("location:?c=citas");
}

}