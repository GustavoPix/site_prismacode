<?php
namespace Source\Sql\Models;

use Source\Sql\Sql;

class ProcessoCriacao{


    
    public static function GetProcessos()
    {

        $sql = new Sql();
        return $sql->select("SELECT * FROM processos ORDER BY id");
        
    }
    
}

?>