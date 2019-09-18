<?php
    require 'vendor/autoload.php';
    require '../Clases/guardar.php';
    require '../Clases/Alumno.php';

    $app = new \Slim\App();

    $app->group('/alumnos', function()
    {
        $this->get('/mostrar', function ( $request,  $response, $args) {
            
            $response->getbody()->write("ALUMNOS:\n".Guardar::traerListado("./alumnos.txt"));

            return $response;
        });

        $this->post('/agregar', function ( $request,  $response, $args) {

            $per = new Alumno($_POST['nombre'],$_POST['apellido'], $_POST['legajo']);

            Guardar::guardarArchivo($per, "./alumnos.txt", "a");
            Guardar::guardarFotos("foto",$_POST['legajo']);
            
            $response->getbody()->write("Alumno guardado con exito!");

            return $response;
        });

        $this->put('/modificar', function ( $request,  $response, $args) {

            $arrayP = $request->getParsedBody();
            $per = new Alumno($arrayP['nombre'],$arrayP['apellido'], $arrayP['legajo']);

            Guardar::modificar($per, "./alumnos.txt");
           // Guardar::guardarFotos("foto",$arrayP['legajo']);
            
            $response->getbody()->write("Alumno guardado con exito!");

            return $response;
        });

        $this->delete('/borrar', function ( $request,  $response, $args) {

            $arrayP = $request->getParsedBody();
            $per = new Alumno($arrayP['legajo']);

            Guardar::borrar($arrayP['legajo']);
            
            $response->getbody()->write("Alumno eliminado!");

            return $response;
        });
    });
    

    $app->run();

?>