<?php
require_once 'db.php.';

$data = json_decode(file_get_contents("php://input"));

$sql = "UPDATE tests SET 
            firstname= '$data->firstname', 
            lastname= '$data->lastname',
            nickname= '$data->nickname', 
            age= '$data->age',  
            gender= '$data->gender',  
            email= '$data->email' 
        WHERE id=$data->id ";

if ($conn->query($sql)===TRUE){
    echo "Successfuly updated";
}
else {
    echo "Error updating";
}



?>