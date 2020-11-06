<?php session_start();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('components/head.php');?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Social Guys | Inlog</title>
</head>

<body>
    <!-- Layout -->
    <?php require('components/navigation.php');
    //require 'components/dashboard_student.php';
    // Serve Content
    if (!isset($_SESSION['loggedin'])) { // If user hasn't logged
        require('components/loginnormal.php');
    }
    require('components/footer.php'); 
    require('components/scripts.php');
    ?>
    
</body>

</html>