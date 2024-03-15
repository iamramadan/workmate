<?php
namespace api;

class update{

    private \PDO $db;
    public function __construct($connection){
        $this->db = $connection; //establish and return the connection
         
    }
   
    public function completeTask($id){
        $sql = "UPDATE tasks set Task_status=1 WHERE id = $id";
        $smt = $this->db->prepare($sql);
       $smt->execute();
        
       echo json_encode( [
        "status"=>"task completed",
       ]);
    }
    public function processTask($id){
        $sql = "UPDATE tasks set Task_status=3 WHERE id = $id";
        $smt = $this->db->prepare($sql);
       $smt->execute();
        
       echo json_encode( [
        "status"=>"task ongoing",
       ]);
    }
   
}