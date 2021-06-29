<?php

require_once 'db.php.';


$query = "CREATE TABLE `tests`(

    `id` INT(6) AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR (30) NOT NULL,
    `lastname` VARCHAR (30) NOT NULL,
    `nickname` VARCHAR (30) NOT NULL,
    `age` INT(0),
    `gender` VARCHAR (30) NOT NULL,
    `email` VARCHAR (30) NOT NULL,
    `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 

)";

if ($conn->query($query) === TRUE ) {
echo ("Table Users created succsessfully");
}
else {
    echo ("Error creating table".$conn -> error);
}

?>