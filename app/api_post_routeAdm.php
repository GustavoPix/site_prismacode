<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Source\Models\Page;
use Source\Sql\Models\Projeto;
use Source\Sql\Models\Blog;
use Source\Sql\Models\Message;
use Source\Sql\Sql;
use Source\Sql\Models\User;


$app->post('/api/adm/updateContent', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
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

    if(User::ValidateUser())
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

    if(User::ValidateUser())
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
$app->post('/api/adm/updateTrabalho', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();

        $sql->select("UPDATE projetos SET nome = :nome, tipo = :tipo, site = :site, projeto = :projeto, features = :features, solucao = :solucao, resultado = :resultado WHERE id = :id",[
            ":nome"=>isset($_POST["name"]) ? $_POST["name"] : "",
            ":tipo"=>isset($_POST["tipo"]) ? $_POST["tipo"] : "",
            ":site"=>isset($_POST["site"]) ? $_POST["site"] : "",
            ":projeto"=>isset($_POST["projeto"]) ? $_POST["projeto"] : "",
            ":features"=>isset($_POST["features"]) ? $_POST["features"] : "",
            ":solucao"=>isset($_POST["solucao"]) ? $_POST["solucao"] : "",
            ":resultado"=>isset($_POST["resultado"]) ? $_POST["resultado"] : "",
            ":id"=>isset($_POST["id"]) ? $_POST["id"] : ""
        ]);
    }

});
$app->post('/api/adm/trabalho', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();

        $sql->select("INSERT INTO projetos(nome,tipo,site,projeto,features,solucao,resultado) VALUES(:nome,:tipo,:site,:projeto,:features,:solucao,:resultado)",[
            ":nome"=>isset($_POST["name"]) ? $_POST["name"] : "",
            ":tipo"=>isset($_POST["tipo"]) ? $_POST["tipo"] : "",
            ":site"=>isset($_POST["site"]) ? $_POST["site"] : "",
            ":projeto"=>isset($_POST["projeto"]) ? $_POST["projeto"] : "",
            ":features"=>isset($_POST["features"]) ? $_POST["features"] : "",
            ":solucao"=>isset($_POST["solucao"]) ? $_POST["solucao"] : "",
            ":resultado"=>isset($_POST["resultado"]) ? $_POST["resultado"] : ""
        ]);

        echo json_encode($sql->select("SELECT id,nome FROM projetos WHERE nome = :nome",[
            ":nome"=>isset($_POST["name"]) ? $_POST["name"] : "",
        ]));
    }

});
$app->post('/api/adm/tecnologiaTrabalho', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();
        $sql->select("INSERT INTO tecnologias_projeto(name,projeto) VALUES(:name,:projeto)",[
            ":name"=>isset($_POST["name"]) ? $_POST["name"] : "",
            ":projeto"=>isset($_POST["projeto"]) ? $_POST["projeto"] : ""
        ]);
       
    }

});
$app->post('/api/adm/tecnologiaTrabalho/delete', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();
        $sql->select("DELETE FROM tecnologias_projeto WHERE id = :id",[
            ":id"=>isset($_POST["id"]) ? $_POST["id"] : ""
        ]);
       
    }

});
$app->post('/api/adm/updateProcesso', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();

        $sql->select("UPDATE processos SET title = :title, text = :text WHERE id = :id",[
            ":title"=>isset($_POST["title"]) ? $_POST["title"] : "",
            ":text"=>isset($_POST["text"]) ? $_POST["text"] : "",
            ":id"=>isset($_POST["id"]) ? $_POST["id"] : ""
        ]);
    }

});
$app->post('/api/adm/processo', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();
        $sql->select("INSERT INTO processos(title,text) VALUES(:title,:text)",[
            ":title"=>isset($_POST["title"]) ? $_POST["title"] : "",
            ":text"=>isset($_POST["text"]) ? $_POST["text"] : ""
        ]);
       
    }

});
$app->post('/api/adm/processo/delete', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();
        $sql->select("DELETE FROM processos WHERE id = :id",[
            ":id"=>isset($_POST["id"]) ? $_POST["id"] : ""
        ]);
       
    }

});
$app->post('/api/adm/mensagem/marcarlida', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();
        $sql->select("UPDATE mensagem SET answered_in = now() WHERE id = :id",[
            ":id"=>isset($_POST["id"]) ? $_POST["id"] : ""
        ]);
       
    }

});
$app->post('/api/adm/projeto/marcarlida', function (Request $request, Response $response, array $args) use ($app) {

    if(User::ValidateUser())
    {

        $sql = new Sql();
        $sql->select("UPDATE mensagem_projeto SET answered_in = now() WHERE id = :id",[
            ":id"=>isset($_POST["id"]) ? $_POST["id"] : ""
        ]);
       
    }

});

?>