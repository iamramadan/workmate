<?php
namespace api;

class update{

    private \PDO $db;
    public function __construct($connection){
        $this->db = $connection; //establish and return the connection
         
    }

    public function updatetask($data,$id){
        
    }
   
}