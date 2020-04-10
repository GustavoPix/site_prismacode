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

$app->get('/adm/paginas/sobre/principal', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_sobre_principal",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/sobre/usuario/novo', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_sobre_usuario",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/sobre/usuario/{idUser}', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_sobre_usuario",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/projetos/principal', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_projetos_principal",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/projetos/{idProject}', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_projetos_trabalho",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/servicos/principal', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_servicos_principal",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/servicos/website', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_servicos_website",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/servicos/software', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_servicos_software",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/servicos/processocriacao', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_servicos_processocriacao",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/contato', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_contato",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/mensagens/mensagens/{idMensagem}', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_mensagens_mensagens",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/mensagens/projetos/{idMensagem}', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_mensagens_projetos",[
        
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});

?>