<?php
require_once 'config/db.php.';
require_once './lib/index.php';

readUsers($conn);

$conn->close();


?>