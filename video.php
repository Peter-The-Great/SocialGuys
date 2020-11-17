<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('components/head.php'); ?>
    <title>Social Guys</title>
</head>

<body class="bg-back">
	<div class="d-flex">
  <?php require("components/sidebar.php"); ?>
<div id="page-content-wrapper">
<?php require("components/navigation.php");?>
</div>
</div>
<?php require("components/scripts.php");?>
</body>
</html>