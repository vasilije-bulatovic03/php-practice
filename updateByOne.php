<?php
require_once 'config/db.php.';
require_once './lib/index.php';

$data = json_decode (file_get_contents("php://input"));

updateByOne($data,$conn);







?>