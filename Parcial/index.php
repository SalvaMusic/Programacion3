<?php
    require './vendor/autoload.php';
    require './Pizza.php';
    require './guardar.php';

    $app = new \Slim\App();

    $app->post('/pizzas', function ( $request,  $response, $args) {

            $datos = $request->getParsedBody();
  
            $pizza = new Pizza($datos['tipo'], $datos['cantidad'], $datos['sabor'], $datos['precio'],$datos['id']);
            var_dump($pizza);

            Guardar::guardarArchivo($pizza,"./Pizza.txt");
            //Guardar::guardarFotos($datos['foto1'],$datos['foto2'], $pizza->id);
            Guardar::guardarFotos('foto1','foto2',$pizza->id);
            
            return $response;
        });

    $app->run();


?>