<?php

namespace Source\Lists;

class ProjetosMenu{
    public static function Menu($active)
    {
        return array(
            array(
                "name"=>"Principal",
                "link"=>ROUTE . "/adm/paginas/projetos/principal",
                "active"=>$active == "principal"
            )
        );
    }
}

?>