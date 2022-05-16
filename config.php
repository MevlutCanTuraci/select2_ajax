<?php

try {

    $host     = "localhost";
    $database = "test1";
    $user     = "root";
    $pass     = "";
    
    $conn = new PDO("mysql:host=$host;dbname=$database","$user", "$pass");

} catch (\Throwable $th) {
    
    echo "Error database connection : $th";
    die();
    
}