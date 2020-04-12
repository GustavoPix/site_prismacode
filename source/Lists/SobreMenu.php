<?php

namespace Source\Lists;

class SobreMenu{
    public static function Menu($active)
    {
        return array(
            array(
                "name"=>"Principal",
                "link"=>ROUTE . "/adm/paginas/sobre/principal",
                "active"=>$active == "principal"
            )
        );
    }
}

?>