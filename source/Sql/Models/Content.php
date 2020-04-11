<?php
namespace Source\Sql\Models;

use Source\Sql\Sql;

class Content{

    public static function GetContent($name,$page)
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM conteudo_pagina WHERE name = :name and pagina = :pagina",[
            ":name"=>$name,
            ":pagina"=>$page
        ]);
    } 

}

?>