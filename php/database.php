<?php
ini_set('display_errors', 1);
//upload_max_filesize = 1000M;
//post_max_size = 1000M;
ini_set('upload_max_filesize', 100);
ini_set('post_max_size', 100);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $user = 'root';
    $pass = '';
    $db = 'MijnDatabase';
    $host = 'localhost';
    
    //Create connection
    $conn = new mysqli($host, $user, $pass, $db) or die("Unable to connect");
    
    //Check connection
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>
