<?php

namespace Source\Lists;

class MainMenu{
    public static function Menu($active)
    {
        return array(
            array(
                "name"=>"Páginas",
                "link"=>ROUTE . "/adm/paginas/home",
                "active"=>$active == "paginas"
            ),
            array(
                "name"=>"Mensagens",
                "link"=>ROUTE . "/adm/paginas/home",
                "active"=>$active == "mensagens"
            )
        );
    }
}

?>