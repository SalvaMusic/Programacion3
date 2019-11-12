<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;


include_once __DIR__ . '/../../src/app/modelAlumno/alumno.php';
include_once __DIR__ . '/../../src/app/modelAlumno/guardar.php';

return function (App $app) {
    $container = $app->getContainer();

		
    $app->group('/alumnos', function()
    {
        $this->get('/mostrar', function ( $request,  $response, $args) {
            
            $response->getbody()->write("ALUMNOS:\n".var_dump(Guardar::traerListado("./alumnos.txt")));
            echo 'Mostrar';

            return $response;
        });

        $this->post('/agregar[/]', function ( $request,  $response, $args) {

			echo 'Agregar';

			$per = new Alumno($_POST['nombre'],$_POST['apellido'], $_POST['legajo']);

			var_dump($per);
            Guardar::guardarArchivo($per, "./alumnos.txt", "a");
            //Guardar::guardarFotos("foto",$_POST['legajo']);
            
            $response->getbody()->write("Alumno guardado con exito!");

            return $response;
        });


    });

};
