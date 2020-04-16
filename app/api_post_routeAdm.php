<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Source\Models\Page;
use Source\Sql\Models\Projeto;
use Source\Sql\Models\Blog;
use Source\Sql\Models\Message;
use Source\Sql\Sql;


$app->post('/api/adm/updateContent', function (Request $request, Response $response, array $args) use ($app) {

    if(true)
    {
        $sql = new Sql();

        $sql->select("UPDATE conteudo_pagina SET text = :text WHERE name = :name and pagina = :pagina",[
            ":name"=>isset($_POST["name"]) ? $_POST["name"] : "",
            ":pagina"=>isset($_POST["pagina"]) ? $_POST["pagina"] : "",
            ":text"=>isset($_POST["text"]) ? $_POST["text"] : ""
        ]);
    }

});
$app->post('/api/adm/updateUser', function (Request $request, Response $response, array $args) use ($app) {

    if(true)
    {

        $sql = new Sql();

        $sql->select("UPDATE equipe SET name = :name, sobre = :sobre, linkedin = :linkedin, github = :github WHERE id = :id",[
            ":name"=>isset($_POST["name"]) ? $_POST["name"] : "",
            ":sobre"=>isset($_POST["sobre"]) ? $_POST["sobre"] : "",
            ":linkedin"=>isset($_POST["linkedin"]) ? $_POST["linkedin"] : "",
            ":github"=>isset($_POST["github"]) ? $_POST["github"] : "",
            ":id"=>isset($_POST["id"]) ? $_POST["id"] : ""
        ]);
    }

});
$app->post('/api/adm/addUser', function (Request $request, Response $response, array $args) use ($app) {

    if(true)
    {

        $sql = new Sql();

        $sql->select("INSERT INTO equipe(name,sobre,linkedin,github) VALUES(:name,:sobre,:linkedin,:github)",[
            ":name"=>isset($_POST["name"]) ? $_POST["name"] : "",
            ":sobre"=>isset($_POST["sobre"]) ? $_POST["sobre"] : "",
            ":linkedin"=>isset($_POST["linkedin"]) ? $_POST["linkedin"] : "",
            ":github"=>isset($_POST["github"]) ? $_POST["github"] : ""
        ]);
    }

});


?>