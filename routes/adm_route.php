<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Source\Models\Page;
use Source\Sql\Models\Projeto;
use Source\Sql\Models\Blog;

$app->get('/adm/paginas/home', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_home",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
    
});

?>