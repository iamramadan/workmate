<?php
namespace api;
class read{
    private \PDO $db;
    public function __construct($connect){
        $this->db = $connect; //establish and return the connection
         
    }

   
    public function readalltask($id){
        $sql = "SELECT * from tasks as ts , users as us where '$id' = ts.initiator";
        $stm = $this->db->query($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return json_encode($result); 


    }
    public function readsingletask($taskname , $creator){
        $sql = "SELECT * from tasks  WHERE title = '$taskname' and initiator = $creator";
        $stm = $this->db->query($sql);
        $stm->execute();
        $result = $stm->fetch();
        return $result;

    }
    public function user_login($username,$password){
        $sql =  "SELECT id , username , password FROM users where username='$username' limit 1";
        $stm = $this->db->query($sql);
        $stm->execute();
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        if($result){
            if (password_verify($password,$result['password']) === false){
                echo json_encode([
                    'status'=>'Invalid username hh or password'
                ]);
                return;
            }
            $pop = array_pop($result);//removes the password from the result array;
        echo json_encode([
            "user_info"=>$result,
            "tasks"=>$this->readalltask($result["id"]),
            "status"=>"Login sucessful"
        ]);
        }else{
            echo json_encode([
                'status'=>'Invalid username or password'
            ]);
        }
    }
}