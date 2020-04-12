<?php
namespace Source\Sql\Models;

use Source\Sql\Sql;

class Equipe{


    
    public static function GetList($idActive = 0)
    {

        $sql = new Sql();
        $equipe = $sql->select("SELECT id,name FROM equipe ORDER BY name");
        $result = array();
        foreach($equipe as $user)
        {
            array_push($result,array(
                "name"=>$user["name"],
                "link"=>ROUTE . "/adm/paginas/sobre/usuario/" . $user["id"],
                "active"=>$idActive == $user["id"]
            ));
        }

        return $result;
        
    }
    public static function GetUser($idUser)
    {

        $sql = new Sql();
        return $sql->select("SELECT * FROM equipe WHERE id = :id",[
            "id"=>$idUser
        ]);
        
        
    }

    
}

?>