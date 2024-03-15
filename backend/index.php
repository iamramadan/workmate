<?php


require "api/create.php";
require "api/read.php";
require "api/delete.php";
require "api/conn/connect.php";
require "api/update.php";

use api\create;
use conn\connect;
use api\read;
use api\delete;
use api\update;
header("content_type:application/json");

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

$newconn = new connect();
$conn = $newconn->connect();
$read = new read($conn);
$update = new update($conn);
$create = new create($conn);
$delete = new delete($conn);
$parts = explode("/", $_SERVER["REQUEST_URI"]);
// echo $_SERVER['REQUEST_METHOD'];
$endpoint = end($parts);
$exp = explode("?",$endpoint);

$points = $exp[0];

switch ($points) {
  case "createuser":
    # code...
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        # code...
       # $data = (array) json_decode(file_get_contents("php://input"), true);
        $data = $_POST;
        // var_dump($_POST);
         $created = $create->createnewuser($data['username'],password_hash($data['password'],PASSWORD_BCRYPT));
          echo json_encode($created);
         
      }
    break;
  case "createtask":
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $data = $_POST;
      $create->createnewtask($data);
    }
    # code...
    break;
  case 'jointask':
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $create->joingrouptask(1,13);
    }

  break;
  case 'userlogin':
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $data = $_POST;
      $read->user_login($data['username'],$data['password']);
    }

  break;
  case "deletetask":
    if($_GET['id']){

      $delete->deletetask($_GET['id']);
    }else{
      echo json_encode( [
        'status' => 'insert the task id'
      ]);
    }
    break;
    case "completetask":
      if($_GET['id']){

        $update->completeTask($_GET['id']);
      }else{
        echo json_encode( [
          'status' => 'insert the task id'
        ]);
      }
      break;
    case "processtask":
      if($_GET['id']){

        $update->processTask($_GET['id']);
      }else{
        echo json_encode( [
          'status' => 'insert the task id'
        ]);
      }
      break;
    # code...
    default:
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      echo $read->readalltask($_GET['id']);
    }
}


#$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
// $id = $created['id'];
//          echo json_encode(
//            $read->readalltask($id)
//          );