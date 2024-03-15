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
        $id = $this->findid($username);

        return [
            "status"=> "user registered",
            "id"=> $id,
            'username' => $this->readusername($id)
        ];



    }
    public function readusername($id){
        $sql = "SELECT username from users  WHERE id = '$id'" ;
        $stm = $this->db->query($sql);
        $stm->execute();
        $result = $stm->fetch();
        return $result['username'];
    }
    public function createnewtask(array $array){
        $sql = "INSERT INTO tasks (title,descriptions,Type_s,Task_status,due_date,initiator) VALUES (:title,:description,:type,:task_status,:due_date,:initiator)";
        $smt = $this->db->prepare($sql);
        // var_dump($array);
        
        if($array['title'] && $array['description'] != ''){
            //img,due_time
            $smt->bindvalue(":title",$array['title'],\PDO::PARAM_STR );
            $smt->bindvalue(":description",$array['description'],\PDO::PARAM_STR);
            $smt->bindvalue(":type",$array['type'],\PDO::PARAM_INT);
            $smt->bindvalue(":task_status",$array['status'],\PDO::PARAM_INT);
            // $smt->bindvalue(":img",$array[4]);
             $smt->bindvalue(":due_date",$array['due_date'],\PDO::PARAM_STR);
            $smt->bindvalue(":initiator",$array['creator'],\PDO::PARAM_INT);
            $smt->execute();
                  echo json_encode([
                "status"=> "new task has been sucessfully created"
            ]);
        }else{
            echo json_encode([
                "status"=> "Fill-in your title and description"
            ]);
        }

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