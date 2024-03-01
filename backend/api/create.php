<?php
namespace api;



class create{
    private \PDO $db;
    public function __construct($connection){
        $this->db = $connection; //establish and return the connection
         
    }

    public function createnewuser($username,$password){
        $sql = "INSERT INTO users (username, password) VALUES (:username,:password)";
        $smt = $this->db->prepare($sql);
        $smt->bindValue(":username",$username, \PDO::PARAM_STR);
        $smt->bindValue(":password" ,$password, \PDO::PARAM_STR);
        $smt->execute();

        return [
            "status"=> "user registered",
            "id"=> $this->findid($username),
        ];



    }
    public function createnewtask(array $array){
        $imp = implode(",",$array);
        $sql = "INSERT INTO tasks (title,descriptions,Type_s,Task_status,due_date,initiator) VALUES (:title,:description,:type,:task_status,:due_date,:initiator)";
        $smt = $this->db->prepare($sql);
        // var_dump($array);
        //img,due_time
        $smt->bindvalue(":title",$array['title'],\PDO::PARAM_STR );
        $smt->bindvalue(":description",$array['description'],\PDO::PARAM_STR);
        $smt->bindvalue(":type",$array['type'],\PDO::PARAM_INT);
        $smt->bindvalue(":task_status",$array['status'],\PDO::PARAM_INT);
        // $smt->bindvalue(":img",$array[4]);
         $smt->bindvalue(":due_date",$array['due date'],\PDO::PARAM_STR);
        $smt->bindvalue(":initiator",$array['creator'],\PDO::PARAM_INT);
        $smt->execute();

        return var_dump([
            "status"=> "new task has been sucessfully created"
        ]);
    }
    public function joingrouptask($id,$user){
        $sql = "INSERT INTO group_task (task,task_users) VALUES ($id,$user)";
        $smt = $this->db->prepare($sql);
        $smt->execute();
        echo "";
    }
    public function findid($user){
        $sql = "SELECT id from users WHERE username = '$user'";
        $smt = $this->db->prepare($sql);
        $smt->execute();
        $result = $smt->fetch(\PDO::FETCH_ASSOC);
        
        return $result['id'];
    }
}