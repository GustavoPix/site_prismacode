<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Source\Sql\Models\User;

$app->post('/api/login', function (Request $request, Response $response, array $args) use ($app) {

    if(!isset($_POST['email']) || !isset($_POST['password']))
    {
        echo json_encode([
            "success"=>false,
            "message"=>"Email ou senha incompletos"
        ]);
        die();
    }
    else
    {
        $parans = [
            "email"=>$_POST['email'],
            "password"=>$_POST['password']
        ];
    
        $result = User::getAll($parans);

        if(count($result) > 0)
        {
            echo json_encode([
                "success"=>true,
                "user"=>$result[0]
            ]);
        
        }
        else
        {
            echo json_encode([
                "success"=>false,
                "message"=>"Email ou senha incorretos"
            ]);
        }
    }

});

?>