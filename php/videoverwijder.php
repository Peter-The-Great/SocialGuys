<?php
session_start();
require('database.php');

$videoid = $_POST["VideoID"];
if(isset($userid)){
    $stmt = $conn->prepare("DELETE FROM `video` WHERE `VideoID` = ".$videoid);
    $stmt->execute();
    $stmt->close();
    header("location: ../kanaal.php");
}
else {
    header("location: ../kanaal.php?error=Video couldn't be deleted.");
}
?>