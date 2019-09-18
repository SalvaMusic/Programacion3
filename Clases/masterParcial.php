<?php

    include "./Alumno.php";
    include "./guardar.php";


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        switch($_POST['caso'])
        {  
            case ('alta'):
                $per = new Alumno($_POST['nombre'],$_POST['apellido'], $_POST['legajo']);
                Guardar::guardarArchivo($per, "./arch.txt");
                Guardar::guardarFotos("foto",$_POST['legajo']);
                break;
            default:
                echo "caso erroneo";
        }
        
    }
    else if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        switch($_GET['caso'])
        {  
            case ('leerListado'):
                Guardar::traerListado("./arch.txt");
                break;
            case ('leer'):

                break;
            default:
                echo "caso erroneo";
        }
        
    }
?>