<?php

require_once 'db.php.';

$data = json_decode(file_get_contents("php://input"));

$lastname = $data->lastname;

$sql = "SELECT * FROM tests WHERE  lastname = '$lastname' ";
$result = $conn ->query($sql);


$response = array();

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    
        $fetchedData = array(
            "firstname" => $row["firstname"],
            "lastname" => $row["lastname"],
            "nickname" => $row["nickname"],
            "age" => $row["age"],
            "gender" => $row["gender"],
            "email" => $row["email"]
        );

        $response[] = $fetchedData;
        echo json_encode($response);
    }
} else {
    echo "erro";
    echo json_encode( array(
        "message" => "Nema trazenih rezultata",
        "status" => 401
    ));
}

$conn->close();

?>