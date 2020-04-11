<?php

namespace Source\Lists;

class PaginasMenu{
    public static function Menu($active)
    {
        return array(
            array(
                "name"=>"Home",
                "link"=>ROUTE . "/adm/paginas/home",
                "active"=>$active == "home"
            ),
            array(
                "name"=>"Sobre",
                "link"=>ROUTE . "/adm/paginas/sobre",
                "active"=>$active == "sobre"
            ),
            array(
                "name"=>"Projetos",
                "link"=>ROUTE . "/adm/paginas/projetos",
                "active"=>$active == "projetos"
            ),
            array(
                "name"=>"Serviços",
                "link"=>ROUTE . "/adm/paginas/servicos",
                "active"=>$active == "servicos"
            ),
            array(
                "name"=>"Contato",
                "link"=>ROUTE . "/adm/paginas/contato",
                "active"=>$active == "contato"
            )
        );
    }
}

?>