<?php
require_once 'db.php.';

$data =  json_decode(file_get_contents("php://input"));


$sql = "DELETE FROM tests where id = $data->id";


if ($conn->query($sql)===TRUE) {
    echo "Successfuly deleted";
}

else {
    echo "Error deleting user";
}



?>