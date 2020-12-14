<?php
session_start();
require('database.php');
$userid = $_POST['Kanaalid'];
$videoid = $_POST["VideoID"];
if(isset($userid)){
    $stmt = $conn->prepare("DELETE FROM `video` WHERE `VideoID` = ".$videoid);
    if($_SESSION['kanaalID'] == $userid){
    $stmt->execute();
    $stmt->close();
    header("location: ../kanaal.php");
    }
    else{
        header("location: ../kanaal.php?error=You are not the user who can delete this video.");
    }
}
else {
    header("location: ../kanaal.php?error=Video couldn't be deleted.");
}
?>