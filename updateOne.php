<?php
require_once 'db.php.';

$data = json_decode (file_get_contents("php://input"));

$field = $data->fieldName;
$value = $data->fieldValue;
$id = $data->id;




if($field === "age" && gettype($value) === "integer") {
    $isTypeGood = true;

}else if ($field === "firstname" && gettype($value) === "string") {
    $isTypeGood = true;   
}else if ($field === "lastname" && gettype($value) === "string") {
    $isTypeGood = true;   
}else if ($field === "nickname" && gettype($value) === "string") {
    $isTypeGood = true;   
}else if ($field === "gender" && gettype($value) === "string") {
    $isTypeGood = true;   
}else if ($field === "email" && gettype($value) === "string") {
    $isTypeGood = true;   
}else {
    $isTypeGood = false;
    $message = "Los tip podata poslat";
}


if($isTypeGood) {
    
    $sql = "UPDATE tests SET $field = '$value' WHERE id=$id ";

    if ($conn->query($sql)===TRUE){
        echo "Record updated successfuly";
    }
    else {
        echo  "Error updating record";
    }



    $sql = "UPDATE ";
}else {
    echo json_encode(array(
        "message" => $message
    ));
}







?>