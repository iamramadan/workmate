<?php
namespace api;

class delete{
    private \PDO $db;
    public function __construct($connection){
        $this->db = $connection; //establish and return the connection
         
    }
    public function deletetask($id){
       $sql = "DELETE from tasks WHERE id=$id";
       $smt = $this->db->prepare($sql);
       $smt->execute();
        
       echo json_encode( [
        "status"=>"task deleted",
       ]);
    }
}