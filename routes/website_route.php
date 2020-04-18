<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Source\Models\Page;
use Source\Sql\Models\Projeto;
use Source\Sql\Models\Blog;
use Source\Sql\Models\Content;
use Source\Sql\Sql;

$app->get('/', function (Request $request, Response $response, array $args) use ($app) {

    $contentHome = new Content("home");
    $contentContato = new Content("contato");
    $projects = Projeto::GetProjects(array(
        "limit"=>2,
        "type"=>"resume",
        "order"=>false
    ));
    
    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"home"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Softwares e Websites",
        "textoLines"=>[$contentHome->GetContent('titulo')]
    ]);
    $page->setTpl("tituloFrase1",[
        "titulo"=>"Softwares e Websites",
        "frase"=>$contentHome->GetContent('sobre')
    ]);
    $page->setTpl("listProjects",[
        "titulo"=>"Últimos projetos",
        "projects"=>$projects,
            "linkButton"=>"./projetos",
            "buttonTitle"=>"Todos os projetos"
    ]);
    $page->setTpl("solucoes",[
        "content"=>$contentHome
    ]);
    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
    
});
$app->get('/sobre', function (Request $request, Response $response, array $args) use ($app) {
    
    $page = new Page();
    $sql = new Sql();
    $contentSobre = new Content("sobre");
    $equipeSql = $sql->select("SELECT * FROM equipe");
    $processosSql = $sql->select("SELECT * FROM processos");
    $contentContato = new Content("contato");
    $equipe = array();
    $processos = array();

    foreach($equipeSql as $user)
    {
        array_push($equipe,array(
            "nome"=>$user['name'],
            "foto"=>$user['photo'],
            "frase"=>$user['sobre'],
            "social"=>[
                array(
                    "link"=>$user['linkedin'],
                    "image"=>"linkedin"
                ),
                array(
                    "link"=>$user['github'],
                    "image"=>"github"
                )
            ]
        ));
    }
    foreach($processosSql as $processo)
    {
        array_push($processos,array(
            "titulo"=>$processo['title'],
            "resumo"=>$processo['text']
        ));
    }

    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"sobre"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Sobre a Prismacode",
        "textoLines"=>[$contentSobre->GetContent('titulo')]
    ]);
    $page->setTpl("tituloFrase1",[
        "titulo"=>"Objetivos",
        "frase"=>$contentSobre->GetContent('objetivo')
    ]);
    $page->setTpl("equipe",[
        "equipe"=> $equipe
    ]);
    $page->setTpl("processos",[
        "etapas"=>$processos
    ]);
    $page->setTpl("duvidaSobre");
    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
    
});
$app->get('/projetos', function (Request $request, Response $response, array $args) use ($app) {
    
    $contentProjetos = new Content("projetos");
    $contentContato = new Content("contato");
    $projectsDestaque = Projeto::GetProjects(array(
        "limit"=>4,
        "type"=>"resume",
        "order"=>false
    ));

    $projectsAll = Projeto::GetProjects(array(
        "limit"=>1000,
        "type"=>"resume",
        "order"=>false
    ));

    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"projetos"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Projetos",
        "textoLines"=>[$contentProjetos->GetContent('titulo')]
    ]);
    $page->setTpl("tituloFrase1",[
        "titulo"=>"Conheça os projetos",
        "frase"=>$contentProjetos->GetContent('sobre')
    ]);
    $page->setTpl("listProjects",[
        "titulo"=>"Últimos projetos",
        "projects"=>$projectsDestaque
    ]);
    
    $page->setTpl("allProjects",[
        "projects"=>$projectsAll
    ]);
    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
    
});
$app->get('/projeto/{idProjeto}', function (Request $request, Response $response, array $args) use ($app) {
    
    $project = Projeto::GetProject($args['idProjeto']);
    $imagesProject = Projeto::GetImagesProject($args['idProjeto']);
    $tecnologiasProject = Projeto::GetTecnologiasProject($args['idProjeto']);
    $contentContato = new Content("contato");
    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"projetos"
    ]);
    $page->setTpl("banner",[
        "titulo"=>$project['tipo'],
        "textoLines"=>explode(' ',$project['nome'])
    ]);
    $page->setTpl("tituloFrase1",[
        "titulo"=>"O projeto",
        "frase"=>$project['projeto']
    ]);
    $page->setTpl("bannerPortifa",[
        "button"=>[
            "link"=>$project['site'],
            "text"=>"Visitar site"
        ],
        "image"=>$imagesProject[0]['url']
    ]);
    $page->setTpl("featuresPortifa",[
        "texto"=>$project['features'],
        "image1"=>$imagesProject[1]['url'],
        "image2"=>$imagesProject[2]['url']
    ]);
    $page->setTpl("solucaoPortifa",[
        "solucao"=>$project['solucao'],
        "image1"=>$imagesProject[3]['url'],
        "image2"=>$imagesProject[4]['url'],
        "image3"=>$imagesProject[5]['url'],
        "resultado"=>$project['resultado']
    ]);
    $page->setTpl("depoimentoPortifa",[
        "depoimento"=>$project['depoimento'],
        "nomeDepoente"=>$project['quote'],
        "tecnologias"=>$tecnologiasProject
    ]);


    
    
    
    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
});

$app->get('/servicos', function (Request $request, Response $response, array $args) use ($app) {
    
    $sql = new Sql();
    $page = new Page();
    $contentServicos = new Content("servicos");
    $contentWebsite = new Content("website");
    $contentSoftware = new Content("software");
    $processosSql = $sql->select("SELECT * FROM processos");
    $contentContato = new Content("contato");
    $processos = array();

    foreach($processosSql as $processo)
    {
        array_push($processos,array(
            "titulo"=>$processo['title'],
            "resumo"=>$processo['text']
        ));
    }

    $projects = Projeto::GetProjects(array(
        "limit"=>2,
        "type"=>"resume",
        "order"=>false
    ));
    
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"servicos"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Serviços",
        "textoLines"=>[$contentServicos->GetContent('titulo')]
    ]);
    
    $page->setTpl("servicosOferecidos",[
       "tecnologias"=>[
            "facebook",
            "github",
            "linkedin"
       ],
       "website"=>$contentWebsite,
       "software"=>$contentSoftware
    ]);
    $page->setTpl("listProjects",[
        "titulo"=>"Últimos projetos",
        "projects"=>$projects,
        "linkButton"=>"./projetos",
        "buttonTitle"=>"Todos os projetos"
    ]);
    $page->setTpl("processos",[
        "etapas"=>$processos
    ]);
    $page->setTpl("duvidaSobre");
    
    
    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
    
});

$app->get('/blog', function (Request $request, Response $response, array $args) use ($app) {
    
    $posts = Blog::GetPosts(array(
        "limit"=>2,
        "type"=>"resume",
        "order"=>false
    ));
    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"blog"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Blog",
        "textoLines"=>[
            "Conheça todas",
            "as nossas",
            "novidades"
        ]
    ]);
    
    $page->setTpl("listBlogs",[
        "titulo"=>"Últimos posts",
        "posts"=>$posts
    ]);
    $page->setTpl("newsletter");
    /*$page->setTpl("listBlogs",[
        "titulo"=>"Todos os posts",
        "posts"=>[
            array(
                "link"=>"52",
                "name"=>"Projeto52",
                "img"=>"banner1_1.png"
            ),
            array(
                "link"=>"52",
                "name"=>"Projeto52",
                "img"=>"banner1_1.png"
            ),
            array(
                "link"=>"52",
                "name"=>"Projeto52",
                "img"=>"banner1_1.png"
            ),
            array(
                "link"=>"52",
                "name"=>"Projeto52",
                "img"=>"banner1_1.png"
            ),
            array(
                "link"=>"52",
                "name"=>"Projeto52",
                "img"=>"banner1_1.png"
            ),
            array(
                "link"=>"52",
                "name"=>"Projeto52",
                "img"=>"banner1_1.png"
            )
            ],
            "buttonTitle"=>"Carregar mais"
    ]);*/

    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
    
});

$app->get('/blog/{id}', function (Request $request, Response $response, array $args) use ($app) {
    
    $post = Blog::GetPost($args['id']);
    $sectionspost = Blog::GetSectionsPost($args['id']);
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $date = date($post['created_at']);
    

    $posts = Blog::GetPosts(array(
        "limit"=>2,
        "type"=>"resume",
        "order"=>false
    ));

    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"blog"
    ]);
    $page->setTpl("banner",[
        "titulo"=>strftime('%d de %B de %Y', strtotime($post['created_at'])),
        "textoLines"=>explode(' ',$post['titulo'])
    ]);
    foreach($sectionspost as $section)
    {
        $page->setTpl("tituloFrase2",[
            "titulo"=>$section['titulo'],
            "image_inicio"=>$section['imagem_inicio'],
            "frase"=>$section['texto'],
            "image_final"=>$section['imagem_final']
        ]);
    }
    
    $page->setTpl("listBlogs",[
        "titulo"=>"Últimos posts",
        "posts"=>$posts
    ]);
    $page->setTpl("newsletter");

    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
    
});

$app->get('/contato', function (Request $request, Response $response, array $args) use ($app) {
    
    $page = new Page();
    $contentContato = new Content("contato");
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"contato"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Contato",
        "textoLines"=>[$contentContato->getContent('titulo')]
    ]);
    
    $page->setTpl("contato");

    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
    
});

$app->get('/politica_privacidade', function (Request $request, Response $response, array $args) use ($app) {
    
    $page = new Page();
    $contentContato = new Content("contato");
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"termos"
    ]);
    
    $page->setTpl("politica_privacidade");

    $page->setTpl("footer",[
        "contato"=>$contentContato
    ]);
    
});

?>