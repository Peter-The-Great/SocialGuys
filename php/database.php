<?php
ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $user = 'root';
    $pass = '';
    $db = 'test';
    $host = '127.0.0.1';
    
    //Create connection
    $conn = new mysqli($host, $user, $pass, $db) or die("Unable to connect");
    
    //Check connection
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>
