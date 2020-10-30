<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $user = 'root';
    $pass = '';
    $db = 'social guys';
    $host = 'localhost:8080';
    
    //Create connection
    $conn = new mysqli($host, $user, $pass, $db) or die("Unable to connect");
    
    //Check connection
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>
