<?php

require_once 'congig/db.php.';


$table = "Table created succsessfuly";
$table_error = "Error creating table";


$query = "CREATE TABLE `tests`(

    `id` INT(6) AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR (30) NOT NULL,
    `lastname` VARCHAR (30) NOT NULL,
    `nickname` VARCHAR (30) NOT NULL,
    `age` INT(0),
    `gender` VARCHAR (30) NOT NULL,
    `email` VARCHAR (30) NOT NULL,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 

)";

if ($conn->query($query)) {
echo json_encode (array("message"->$table));
}
else {
    echo json_encode (array("message"->$table_error.$conn -> error));
}

?>