<?php

require_once 'config.php';
// load .env variable
$connect = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $ENV['DB_NAME']);

if (!$connect) {
    die('connection failed:' . mysqli_connect_error());
}
?>