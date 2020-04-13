<?php

namespace Source\Lists;

class MensagensMenu{
    public static function Menu($active)
    {
        return array(
            array(
                "name"=>"Mensagens",
                "link"=>ROUTE . "/adm/mensagens/mensagens/1",
                "active"=>$active == "mensagens"
            ),
            array(
                "name"=>"Projetos",
                "link"=>ROUTE . "/adm/mensagens/projetos/1",
                "active"=>$active == "projetos"
            )
        );
    }
}

?>