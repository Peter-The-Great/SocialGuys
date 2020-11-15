<?php
session_start();
//if(isset($_SESSION["loggedin"])) {
//    header("Location: dashboard.php");
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('components/head.php'); ?>
    <title>Social Guys</title>
</head>

<body class="bg-back">
<?php require("components/navigation.php");?>
<?php require("components/scripts.php");?>
</body>

</html>