<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\ORM\cd;
use App\Models\ORM\cdApi;


include_once __DIR__ . '/../../src/app/modelORM/cd.php';
include_once __DIR__ . '/../../src/app/modelORM/cdControler.php';

return function (App $app) {
    $container = $app->getContainer();

     $app->group('/cdORM', function () {   
         
        $this->get('/', function ($request, $response, $args) {
          //return cd::all()->toJson();
          $todosLosCds=cd::all();
          $newResponse = $response->withJson($todosLosCds, 200);  
          return $newResponse;
        });

        $this->get('/{id}', function ($request, $response, $args) {
            //return cd::all()->toJson();
            $todosLosCds=cd::find($args['id']);
            $newResponse = $response->withJson($todosLosCds, 200);  
            return $newResponse;
        });
        
        $this->post('/cargarcd', function ( $request,  $response, $args) {

            $datos = $request->getParsedBody();

            $cd = new cd;
            $cd->titulo = $datos['titulo'];
            $cd->cantante = $datos['cantante'];
            $cd->año = $datos['año'];

            $cd->save();
            //$response->getbody()->write("Cd cargado con exito!");
            
        
            return $response;
        });
    });


     $app->group('/cdORM2', function () {   

        $this->get('/',cdApi::class . ':traerTodos');
   
    });

};