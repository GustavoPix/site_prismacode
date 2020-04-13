<?php
namespace Source\Sql\Models;

use Source\Sql\Sql;

class Projetos{

    public static function GetListNovas($idActive = 0)
    {

        $sql = new Sql();
        $trabalhos = $sql->select("SELECT id,nome as name FROM mensagem_projeto WHERE answered_in < '2000' ORDER BY name");
        $result = array();
        foreach($trabalhos as $trabalho)
        {
            array_push($result,array(
                "name"=>$trabalho["name"],
                "link"=>ROUTE . "/adm/mensagens/projetos/" . $trabalho["id"],
                "active"=>$idActive == $trabalho["id"]
            ));
        }

        return $result;
        
    }
    public static function GetListLidas($idActive = 0)
    {

        $sql = new Sql();
        $trabalhos = $sql->select("SELECT id,nome as name FROM mensagem_projeto WHERE answered_in > '2000' ORDER BY name");
        $result = array();
        foreach($trabalhos as $trabalho)
        {
            array_push($result,array(
                "name"=>$trabalho["name"],
                "link"=>ROUTE . "/adm/mensagens/projetos/" . $trabalho["id"],
                "active"=>$idActive == $trabalho["id"]
            ));
        }

        return $result;
        
    }
    public static function GetMensagem($idMensagem)
    {

        $sql = new Sql();
        return $sql->select("SELECT * FROM mensagem_projeto WHERE id = :id",[
            "id"=>$idMensagem
        ]);
        
        
    }
    

    
}

?>