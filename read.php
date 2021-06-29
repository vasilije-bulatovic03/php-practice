<?php
require_once 'db.php.';

$sql = "SELECT id,firstname,lastname,nickname,age,gender,email FROM tests";
$result = $conn ->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $podaci = array(
            "id" => $row ["id"],
            "firstname"=> $row ["firstname"],
            "lastname" => $row ["lastname"],
            "nickname" => $row ["nickname"],
            "age" => $row ["age"],
            "gender" => $row ["gender"],
            "email" => $row ["email"]
        ) ;
        echo json_encode($podaci);
    }
} else {
    echo "0 results";
}

$conn->close();


?>