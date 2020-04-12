<?php

namespace Source\Lists;

class ServicosMenu{
    public static function Menu($active)
    {
        return array(
            array(
                "name"=>"Principal",
                "link"=>ROUTE . "/adm/paginas/servicos/principal",
                "active"=>$active == "principal"
            ),
            array(
                "name"=>"Website",
                "link"=>ROUTE . "/adm/paginas/servicos/website",
                "active"=>$active == "website"
            ),
            array(
                "name"=>"Software",
                "link"=>ROUTE . "/adm/paginas/servicos/software",
                "active"=>$active == "software"
            ),
            array(
                "name"=>"Processo de Criação",
                "link"=>ROUTE . "/adm/paginas/servicos/processocriacao",
                "active"=>$active == "processocriacao"
            )
        );
    }
}

?>