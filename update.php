<?php
require_once 'config/db.php.';
require_once './lib/index.php';

$data = json_decode(file_get_contents("php://input"));

$mesagge = "Successfuly updated";
$error = "Error updating";

$result = updateUser($data, $conn);
    

if ($result){
    echo json_encode (array ("message" => $mesagge));
}
else {
    echo json_encode (array("message" => $error));
}



?>