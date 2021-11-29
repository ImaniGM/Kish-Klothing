<?php

$conn = null;
try{
    $host = 'localhost';
    $username = 'owner';
    $password = 'password123';
    $dbname = 'kishklothing';
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
}catch(Exception $e){
    echo "Server Error: Failed to Execute Operation";
    die();
}

