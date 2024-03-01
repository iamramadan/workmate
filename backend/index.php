<?php


require "api/create.php";
require "api/read.php";
require "api/delete.php";
require "api/conn/connect.php";

use api\create;
use conn\connect;
use api\read;
use api\delete;

header("content_type:application/json");

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

$newconn = new connect();
$conn = $newconn->connect();
$read = new read($conn);

$create = new create($conn);
$delete = new delete($conn);
$parts = explode("/", $_SERVER["REQUEST_URI"]);
// echo $_SERVER['REQUEST_METHOD'];
$endpoint = end($parts);

switch ($endpoint) {
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
      $create->createnewtask([$data]);
    }
    # code...
    break;
  case 'findtask':
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $read->readalltask($_GET['id']);
  }
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
      $delete->deletetask(11);
    break;
    # code...
    default:
    http_response_code(404);
}


#$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
// $id = $created['id'];
//          echo json_encode(
//            $read->readalltask($id)
//          );