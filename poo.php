<?php
    session_start();
    //session_destroy();
    include "./clases/alumno.php";
    include "./clases/alumnoDAO.php";
    // $per = new Alumno($_GET['nombre'],$_GET['apellido']);
    // $per->mostrar();
    // ----------------------------
    // $cant = $_POST['cantidad'];    
    // $array = array($cant);
    // $i=0;

    // while($i < $cant)
    // {
    //     $array[$i] = new Alumno('persona_Nombre'.$i,'persona_Apellido'.$i);
    //     $array[$i]->mostrar();
    //     $i++;
    // }
    //-----------------------------
    
    // if(!isset($_SESSION["alumnos"]))
    // {
    //     $_SESSION["alumnos"] = array();
    // }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        switch($_POST['caso'])
        {  
            case ('alumno'):
                $per = new Alumno($_POST['nombre'],$_POST['apellido']);
                alumnoDAO::guardar($per);
                break;
            default:
                echo "caso erroneo";
        }
        
    }
    else if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        switch($_GET['caso'])
        {  
            case ('alumno'):
                alumnoDAO::traerListado();
                break;
            default:
                echo "caso erroneo";
        }
        
    }
?>