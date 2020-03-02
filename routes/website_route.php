<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Source\Models\Page;
use Source\Sql\Models\Projeto;
use Source\Sql\Models\Blog;

$app->get('/', function (Request $request, Response $response, array $args) use ($app) {

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
        "textoLines"=>[
            "Criatividade,",
            "Velocidade e",
            "Experiencia de usuário"
        ]
    ]);
    $page->setTpl("tituloFrase1",[
        "titulo"=>"Softwares e Websites",
        "frase"=>"Somos uma empresa focada na criação de websites e sistemas integrados focados no design do produto. Acreditamos que toda a experiencia do usuário começa em um design simples, criativo e rápido"
    ]);
    $page->setTpl("listProjects",[
        "titulo"=>"Últimos projetos",
        "projects"=>$projects,
            "linkButton"=>"./projetos",
            "buttonTitle"=>"Todos os projetos"
    ]);
    $page->setTpl("solucoes");
    $page->setTpl("footer",[]);
    
});
$app->get('/sobre', function (Request $request, Response $response, array $args) use ($app) {
    
    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"sobre"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Sobre a Prismacode",
        "textoLines"=>[
            "Conheça um",
            "pouco sobre",
            "a Prismacode"
        ]
    ]);
    $page->setTpl("tituloFrase1",[
        "titulo"=>"Objetivos",
        "frase"=>"Acreditamos em um mundo mais digital, integrado e com relações duradouras, procuramos oferecer uma relação duradoura e amigável com nossos parceiros, focando em preço, qualidade e design."
    ]);
    $page->setTpl("equipe",[
        "equipe"=> [
            array(
                "nome"=>"Gustavo Carvalho",
                "foto"=>"gustavo_carvalho.jpg",
                "frase"=>"Fundador da Prismacode, apaixonado por jogos, programação e design, busca oferecer o melhor serviço na criação de sites e sistemas, transformando-os em produtos criativos, divertidos e cativantes como nos jogos.",
                "social"=>[
                    array(
                        "link"=>"https://www.linkedin.com/in/gustavolcarvalho/",
                        "image"=>"linkedin"
                    ),
                    array(
                        "link"=>"https://github.com/GustavoPix",
                        "image"=>"github"
                    )
                ]
            )
        ]
    ]);
    $page->setTpl("processos",[
        "etapas"=>[
            array(
                "titulo"=>"O projeto",
                "resumo"=>"Ao recebermos um novo projeto, procuramos entender as necessidades do nosso cliente e coletar o máximo de informações possíveis sobre o projeto."
            ),
            array(
                "titulo"=>"Projetando",
                "resumo"=>"Projetamos as funcionalidades e a atuação do projeto, separamos as etapas e ferramentas necessárias para a conclusão do projeto. Apresentamos o projeto criado para a aprovação de nosso cliente."
            ),
            array(
                "titulo"=>"Blocagem",
                "resumo"=>"Criamos neste momento um pequeno simulador do que seria o projeto, assim podemos analizar as posições de botões, paginas e etc. Apresentamos ao cliente onde já pode ter uma idéia de como ficará o projeto."
            ),
            array(
                "titulo"=>"Cores!",
                "resumo"=>"Com um layout pré definido, é hora de escolhes as cores, imagens e textos, damos vida a blocagem e podemos fazer os ajustes finais do layout e funcionalidades."
            ),
            array(
                "titulo"=>"Criação",
                "resumo"=>"Layout definido, cores definidas e processos definidos, esta é a hora de dar vida ao projeto! Este é o processo mais divertido do projeto, pois é quando estamos finalmente dando vida a ele."
            ),
            array(
                "titulo"=>"Testes e entrega",
                "resumo"=>"Projeto finalizado, é hora de testar, corrigir bugs e entrega-lo ao mundo!"
            )
        ]
    ]);
    $page->setTpl("duvidaSobre");
    $page->setTpl("footer",[]);
    
});
$app->get('/projetos', function (Request $request, Response $response, array $args) use ($app) {
    

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
        "textoLines"=>[
            "Veja os",
            "projetos que",
            "demos vida"
        ]
    ]);
    $page->setTpl("tituloFrase1",[
        "titulo"=>"Conheça os projetos",
        "frase"=>"Temos orgulho de mostra os projetos que criamos junto com nossos parceiros, conheça um pouco sobre os últimos projetos que realizamos."
    ]);
    $page->setTpl("listProjects",[
        "titulo"=>"Últimos projetos",
        "projects"=>$projectsDestaque
    ]);
    
    $page->setTpl("allProjects",[
        "projects"=>$projectsAll
    ]);
    $page->setTpl("footer",[]);
    
});
$app->get('/projeto/{idProjeto}', function (Request $request, Response $response, array $args) use ($app) {
    
    $project = Projeto::GetProject($args['idProjeto']);
    $imagesProject = Projeto::GetImagesProject($args['idProjeto']);
    $tecnologiasProject = Projeto::GetTecnologiasProject($args['idProjeto']);
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


    
    
    
    $page->setTpl("footer",[]);
    
});

$app->get('/servicos', function (Request $request, Response $response, array $args) use ($app) {
    
    $projects = Projeto::GetProjects(array(
        "limit"=>2,
        "type"=>"resume",
        "order"=>false
    ));
    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"servicos"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Serviços",
        "textoLines"=>[
            "Conheça os",
            "serviços que",
            "trabalhamos"
        ]
    ]);
    
    $page->setTpl("servicosOferecidos",[
        "depoimento"=>"Um depoimento de alguem da empresa",
        "nomeDepoente"=>"Gustavo Carvalho",
        "tecnologias"=>[
            "facebook",
            "github",
            "linkedin"
        ]
    ]);
    $page->setTpl("listProjects",[
        "titulo"=>"Últimos projetos",
        "projects"=>$projects,
        "linkButton"=>"./projetos",
        "buttonTitle"=>"Todos os projetos"
    ]);
    $page->setTpl("processos",[
        "etapas"=>[
            array(
                "titulo"=>"O projeto",
                "resumo"=>"Ao recebermos um novo projeto, procuramos entender as necessidades do nosso cliente e coletar o máximo de informações possíveis sobre o projeto."
            ),
            array(
                "titulo"=>"Projetando",
                "resumo"=>"Projetamos as funcionalidades e a atuação do projeto, separamos as etapas e ferramentas necessárias para a conclusão do projeto. Apresentamos o projeto criado para a aprovação de nosso cliente."
            ),
            array(
                "titulo"=>"Blocagem",
                "resumo"=>"Criamos neste momento um pequeno simulador do que seria o projeto, assim podemos analizar as posições de botões, paginas e etc. Apresentamos ao cliente onde já pode ter uma idéia de como ficará o projeto."
            ),
            array(
                "titulo"=>"Cores!",
                "resumo"=>"Com um layout pré definido, é hora de escolhes as cores, imagens e textos, damos vida a blocagem e podemos fazer os ajustes finais do layout e funcionalidades."
            ),
            array(
                "titulo"=>"Criação",
                "resumo"=>"Layout definido, cores definidas e processos definidos, esta é a hora de dar vida ao projeto! Este é o processo mais divertido do projeto, pois é quando estamos finalmente dando vida a ele."
            ),
            array(
                "titulo"=>"Testes e entrega",
                "resumo"=>"Projeto finalizado, é hora de testar, corrigir bugs e entrega-lo ao mundo!"
            )
        ]
    ]);
    $page->setTpl("duvidaSobre");
    
    
    $page->setTpl("footer",[]);
    
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

    $page->setTpl("footer",[]);
    
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

    $page->setTpl("footer",[]);
    
});

$app->get('/contato', function (Request $request, Response $response, array $args) use ($app) {
    
    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"contato"
    ]);
    $page->setTpl("banner",[
        "titulo"=>"Contato",
        "textoLines"=>[
            "Vamos começar",
            "um projeto",
            "juntos"
        ]
    ]);
    
    $page->setTpl("contato");

    $page->setTpl("footer",[]);
    
});

$app->get('/politica_privacidade', function (Request $request, Response $response, array $args) use ($app) {
    
    $page = new Page();
    $page->setTpl("header",[
        "logo"=>"logo",
        "local"=>"termos"
    ]);
    
    $page->setTpl("politica_privacidade");

    $page->setTpl("footer",[]);
    
});

?>