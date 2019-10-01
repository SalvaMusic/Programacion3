<?php
    require './vendor/autoload.php';
    require './vehiculo.php';
    require './guardar.php';

    $app = new \Slim\App();

    $app->group('/vehiculos', function()
    {
        $this->post('/cargarVehiculo', function ( $request,  $response, $args) {

            $datos = $request->getParsedBody();

            $veh = new Vehiculo($datos['marca'],$datos['modelo'], $datos['patente'], $datos['precio']);

            if(!Guardar::guardarArchivoValidar($veh, "./vehiculos.txt"))
            {
                $response->getbody()->write("Vehiculo cargado con exito!");
            }
        
            return $response;
        });
        
        //ejercicios/PParcial/vehiculos/consultarVehiculo/Fiat
        $this->get('/consultarVehiculo/{marca}', function ( $request,  $response, $args)  {
            $datos = $args['marca'];

            Guardar::consultarVehiculo($datos, "./vehiculos.txt");
               
            return $response;
        });
        
        /*$this->get('/consultarVehiculo', function ( $request,  $response, $args) {
            $datos = $request->getParsedBody();

            $veh = new Vehiculo($datos['marca'],$datos['modelo'], $datos['patente'], $datos['precio']);

            if($datos['marca'] =! NULL)
            {
                var_dump($veh);
                if(Guardar::consultarVehiculo($veh->marca, "./vehiculos.txt"))
                {
                    $veh->mostrar();
                }

            }else if ($datos['modelo'] != NULL)
            {

            }else if ($datos['patente']!= NULL)
            {

            }

            return $response;
        });*/


        $this->post('/cargarTipoServicio', function ( $request,  $response, $args) {

            $datos = $request->getParsedBody();
            
            return $response;
        });

        $this->get('/sacarTurno', function ( $request,  $response, $args) {

            return $response;
        });

        $this->get('/turnos', function ( $request,  $response, $args) {

            return $response;
        });

        $this->get('/inscripciones', function ( $request,  $response, $args) {

            return $response;
        });

        $this->post('/modificarVehiculo', function ( $request,  $response, $args) {

            $datos = $request->getParsedBody();
            
            return $response;
        });

        $this->get('/vehiculos', function ( $request,  $response, $args) {

            return $response;
        });
    });

    $app->run();


?>