<?php 
session_start();

if (!isset($_SESSION['username']))
{
    header('location:index.php');
}
else
{
  $_SESSION['kanaalID'];
  $_SESSION['username'];
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php require('components/head.php'); ?>
    <title>Livestream</title>
    
  </head>
  <body class="bg-back">
      <div class="d-flex">
      <?php require("components/sidebar.php"); ?>
      <div id="page-content-wrapper">
      <?php require("components/navigation.php");?>
      <div class="col">
    <!-- Add a placeholder for the Twitch embed -->
    <div id="twitch-embed"></div>

    <!-- Load the Twitch embed script -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>

    <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
    <script type="text/javascript">
      new Twitch.Embed("twitch-embed", {
        width: 1400,
        height: 800,
        channel: "monstercat",
      });
    </script>
  </body>
</html>