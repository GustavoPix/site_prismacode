<?php
namespace Source\Sql\Models;

use Source\Sql\Sql;

class Trabalhos{


    
    public static function GetList($idActive = 0)
    {

        $sql = new Sql();
        $trabalhos = $sql->select("SELECT id,nome as name FROM projetos ORDER BY name");
        $result = array();
        foreach($trabalhos as $trabalho)
        {
            array_push($result,array(
                "name"=>$trabalho["name"],
                "link"=>ROUTE . "/adm/paginas/projetos/" . $trabalho["id"],
                "active"=>$idActive == $trabalho["id"]
            ));
        }

        return $result;
        
    }
    public static function GetTrabalho($idProjeto)
    {

        $sql = new Sql();
        return $sql->select("SELECT * FROM projetos WHERE id = :id",[
            "id"=>$idProjeto
        ]);
        
        
    }
    public static function GetTecnologias($idProjeto)
    {

        $sql = new Sql();
        return $sql->select("SELECT * FROM tecnologias_projeto WHERE projeto = :id",[
            "id"=>$idProjeto
        ]);
    }
    public static function GetImages($idProjeto)
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM image_projeto WHERE projeto = :id",[
            "id"=>$idProjeto
        ]);
        
        
    }

    
}

?>