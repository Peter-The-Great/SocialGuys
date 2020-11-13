<?php
// session_start();
// if(isset($_SESSION["loggedin"])) {
//     header("Location: dashboard.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <?php require('components/head.php'); ?>
    <link rel="stylesheet" href="css/font.css">
    <title>Social Guys</title>
</head>

<body>
<?php
if (!isset($_SESSION['loggedin'])) { // If user hasn't logged
  require('components/login.php');
}
?>
    <?php require("components/scripts.php");?>
</body>

</html>