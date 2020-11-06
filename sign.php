<?php session_start();
if (isset($_SESSION['rol'])) {
    $rol = $_SESSION['rol'];
} else {
}   $rol = "leeg";
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('components/head.php');?>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Social Guys | Sign Up</title>
</head>

<body>
    <!-- Layout -->
    <?php 
    require('components/navigation.php');
    require('components/sign.php');
    require('components/footer.php'); 
    require('components/scripts.php');
    ?>
    
</body>

</html>