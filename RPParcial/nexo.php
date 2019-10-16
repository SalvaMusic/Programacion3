<?php
    include "./Servicio.php";
    include "./Vehiculo.php";
    include "./guardar.php";
    include "./Turno.php";


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        switch($_POST['caso'])
        {  
            case ('cargarVehiculo'):
                $veh = new Vehiculo($_POST['marca'],$_POST['patente'], $_POST['kms']);
                
                if($veh->buscarpatente(Guardar::traerlistado("./vehiculos.txt")) == -1)
                {
                    Guardar::guardarArchivo($veh, "./vehiculos.txt");
                    echo "Vehiculo cargado con exito";
                }
                else 
                {
                    echo "Vehiculo repetido";
                }
                
                break;
            case ('cargarTipoServicio'):
                $flag = false;
                $serv = new Servicio($_POST['nombre'], $_POST['id'], $_POST['tipo'], $_POST['precio'], $_POST['demora']);
                if($serv->tipo == 10000 || $serv->tipo == 20000 ||$serv->tipo == 50000)
                {
                    if($serv->buscarId(Guardar::traerlistado("./tiposServicio.txt")) == -1  )
                    {
                        Guardar::guardarArchivo($serv, "./tiposServicio.txt");
                        echo "Servicio cargado!";
                    }else
                    {
                        echo "ID repetido";
                    }
                        
                }else {
                    echo "Tipo invalido!";
                }
                
                break;
            default:
                echo "caso erroneo";
        }
        
    }
    else if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        switch($_GET['caso'])
        {  
            case ('consultarVehiculo'):
                $aux = "";
                if (!empty($_GET['patente']));
                {
                    $aux = $_GET['patente'];
                    $veh = Guardar::retXPatente(Guardar::traerlistado("./vehiculos.txt"), $aux);
                } 
                if (!empty($_GET['marca']))
                {
                    $aux = $_GET['marca'];
                    $veh = Guardar::retXMarca(Guardar::traerlistado("./vehiculos.txt"), $aux);
                }
                
                if($veh != NULL)
                {
                    var_dump($veh);
                }else 
                {
                    echo "NO EXISTE ".$aux;
                }
                
                break;
            case ('sacarTurno'):
                $veh = Guardar::retXPatente(Guardar::traerlistado("./vehiculos.txt"), $_GET['patente']);
                if ($veh != NULL)
                {
                    if(Guardar::retXServicio(Guardar::traerlistado("./tiposServicio.txt"), $_GET['materia']))
                    {
                        $turno = new Turno($veh->patente,$_GET['precio'],$_GET['materia'], $_GET['fecha']);
                        if($turno->buscarCupo(Guardar::traerlistado("./turnos.txt")) == -1 )
                        {
                            Guardar::guardarArchivo($turno, "./turnos.txt");
                            echo "Turno Programado";
                        }else
                        {
                            echo "no hay cupo para esa fecha";
                        }
                            
                    }else{
                        echo "Servicio inexistente";
                    }
                }else
                {
                    echo "Patente inexistente";
                }
                
                break;
            case ('turno'):
                
                $veh = Guardar::traerlistado("./tiposServicio.txt");
                if($veh != NULL)
                {
                    var_dump($veh);
                }else{
                    echo "no hay turnos";
                }
                break;
            case ('servicio'):

                if (!empty($_GET['fecha']))
                {
                    $veh = Guardar::retXFecha(Guardar::traerlistado("./turnos.txt"));
                    
                    if ($veh != NULL)
                    {
                        var_dump($veh);
                    }else 
                    {
                        echo "Fecha sin turnos";
                    }
                } 
                if (!empty($_GET['servicio']));
                {
                    
                    $veh = Guardar::traerlistado("./tiposServicio.txt");
                    if ($veh != NULL)
                    {
                        var_dump($veh);
                    }else 
                    {
                        echo "sin servicios";
                    }
                } 
            break;
            default:
                echo "caso erroneo";
        }
        
    }
?>