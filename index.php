<?php
require_once 'db.php.';

$data = json_decode(file_get_contents("php://input"));


$sql = "INSERT INTO tests (firstname, lastname, nickname, age, gender, email)
	VALUES (
  		'$data->firstname', 
		'$data->lastname', 
		'$data->nickname', 
		'$data->age', 
		'$data->gender', 
		'$data->email'
		)";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>