<?php
    //inicio sesion 
    session_start();
    // creo la sesion "id", si no está creada 
    if(!isset($_SESSION["id"]))
    {
        $_SESSION["id"] = 1;
    }
    
    require_once './vendor/autoload.php';
    require_once './Pizza.php';
    require_once './guardar.php';
 
    $app = new \Slim\App();

    $app->post('/pizzas', function ( $request,  $response, $args) {

            $datos = $request->getParsedBody();
  
            $pizza = new Pizza($datos['tipo'], $datos['cantidad'], $datos['sabor'], $datos['precio']);
            var_dump($pizza);

            Guardar::guardarArchivo($pizza,"./Pizza.txt");
            //Guardar::guardarFotos($datos['foto1'],$datos['foto2'], $pizza->id);
            //Guardar::guardarFotos('foto1','foto2');
            
            return $response;
        });

    $app->run();


?>