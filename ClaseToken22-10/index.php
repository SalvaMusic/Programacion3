<?php
    require 'vendor/autoload.php';

    use \Firebase\JWT\JWT;

    $app = new \Slim\App();

    $app->group('/auth', function()
    {
        $this->post('/login', function ( $request,  $response, $args) {

            $body = $request->getParsedBody();

            $key = "example_key";
            $token = array(
                "iss" => "http://example.org",
                "aud" => "http://example.com",
                "iat" => 1356999524,
                "nbf" => 1357000000,
                "user" => $body["user"]
           
            );

            $jwt = JWT::encode($token, $key);

            $newResponse = $response->withJson($jwt, 200);
            return $newResponse;

        });

        $this->get('[/]', function ( $request,  $response, $args) {
            
            $key = "example_key";

            try
            {
                $jwt = $request->getHeader("token")[0];
                $decoded = JWT::decode($jwt, $key, array('HS256'));
                $newResponse = $response->withJson($decoded, 200);
                
            }
            catch (Exception $e) 
            {
                $newResponse = $e->message();          
            }
            
            return $newResponse;
            
        });

    
    });
    

    $app->run();

?>