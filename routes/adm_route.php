<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Source\Models\Page;
use Source\Sql\Models\Projeto;
use Source\Sql\Models\Blog;
use Source\Lists\MainMenu;
use Source\Lists\PaginasMenu;
use Source\Lists\MensagensMenu;
use Source\Lists\SobreMenu;
use Source\Lists\ProjetosMenu;
use Source\Lists\ServicosMenu;
use Source\Sql\Models\Mensagens;
use Source\Sql\Models\Projetos;
use Source\Sql\Models\Content;
use Source\Sql\Models\Equipe;
use Source\Sql\Models\Trabalhos;
use Source\Sql\Models\ProcessoCriacao;

$app->get('/adm/paginas/home', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $content = new Content("home");
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_home",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("home"),
        "content"=>$content
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});

$app->get('/adm/paginas/sobre/principal', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $content = new Content("sobre");
    $page->setTpl("adm_header",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("sobre"),
        "thirMenu"=>SobreMenu::Menu("principal"),
        "equipe"=>Equipe::GetList(),
        "content"=>$content
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
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("sobre"),
        "thirMenu"=>SobreMenu::Menu(""),
        "equipe"=>Equipe::GetList($args["idUser"]),
        "novoUser"=>true
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/sobre/usuario/{idUser}', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_sobre_usuario",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("sobre"),
        "thirMenu"=>SobreMenu::Menu(""),
        "equipe"=>Equipe::GetList($args["idUser"]),
        "user"=>Equipe::GetUser($args["idUser"])[0],
        "novoUser"=>false
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/projetos/principal', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $content = new Content("projetos");
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_projetos_principal",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("projetos"),
        "thirMenu"=>ProjetosMenu::Menu("principal"),
        "trabalhos"=>Trabalhos::GetList(),
        "content"=>$content,
        "novoTrabalho"=>false
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/projetos/novo', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_projetos_trabalho",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("projetos"),
        "thirMenu"=>ProjetosMenu::Menu("principal"),
        "content"=>$content,
        "novoTrabalho"=>true
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/projetos/{idProject}', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_projetos_trabalho",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("projetos"),
        "thirMenu"=>ProjetosMenu::Menu("principal"),
        "trabalhos"=>Trabalhos::GetList($args["idProject"]),
        "trabalho"=>Trabalhos::GetTrabalho($args["idProject"])[0],
        "tecnologias"=>Trabalhos::GetTecnologias($args["idProject"]),
        "imagens"=>Trabalhos::GetImages($args["idProject"]),
        "novoTrabalho"=>false
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/servicos/principal', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $content = new Content("servicos");
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_servicos_principal",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("servicos"),
        "thirMenu"=>ServicosMenu::Menu("principal"),
        "content"=>$content,
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/servicos/website', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $content = new Content("website");
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_servicos_website",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("servicos"),
        "thirMenu"=>ServicosMenu::Menu("website"),
        "content"=>$content,
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/servicos/software', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $content = new Content("software");
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_servicos_software",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("servicos"),
        "thirMenu"=>ServicosMenu::Menu("software"),
        "content"=>$content
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/servicos/processocriacao', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_servicos_processocriacao",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("servicos"),
        "thirMenu"=>ServicosMenu::Menu("processocriacao"),
        "processos"=>ProcessoCriacao::GetProcessos(),
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/paginas/contato', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $content = new Content("contato");
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_paginas_contato",[
        "mainMenu"=>MainMenu::Menu("paginas"),
        "secondMenu"=>PaginasMenu::Menu("contato"),
        "content"=>$content,
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/mensagens/mensagens/{idMensagem}', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_mensagens_mensagens",[
        "mainMenu"=>MainMenu::Menu("mensagens"),
        "secondMenu"=>MensagensMenu::Menu("mensagens"),
        "mensagensNovas"=>Mensagens::GetListNovas($args["idMensagem"]),
        "mensagensLidas"=>Mensagens::GetListLidas($args["idMensagem"]),
        "mensagem"=>Mensagens::GetMensagem($args["idMensagem"])[0]
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});
$app->get('/adm/mensagens/projetos/{idMensagem}', function (Request $request, Response $response, array $args) use ($app) {

    $page = new Page();
    $page->setTpl("adm_header",[
        
    ]);
    $page->setTpl("adm_mensagens_projetos",[
        "mainMenu"=>MainMenu::Menu("mensagens"),
        "secondMenu"=>MensagensMenu::Menu("projetos"),
        "mensagensNovas"=>Projetos::GetListNovas($args["idMensagem"]),
        "mensagensLidas"=>Projetos::GetListLidas($args["idMensagem"]),
        "mensagem"=>Projetos::GetMensagem($args["idMensagem"])[0]
    ]);
    $page->setTpl("adm_footer",[
        
    ]);
    
});

?>