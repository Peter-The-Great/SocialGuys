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
      $_SESSION['loggedin'] = true;
    }
  require('php/database.php');
  //query om de categorien te vinden in de database
  //$query = "SELECT `Categorie_ID`, `Naam` FROM `categorie`";
  
  //maak een resultaat door te verbinden met de database
  //$result = $conn->query($query);
  //$resultaat = $result->fetch_assoc();
  
  $kanaalID = $_SESSION['kanaalID'];
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <?php require('components/head.php');?>
    <title>SocialGuys</title>
  </head>
  <body class="bg-back">
  <div class="d-flex">
  <?php require("components/sidebar.php");?>
  <div id="page-content-wrapper">
  <?php require("components/navigation.php");?>
</div>
</div>
</div>
<?php require('components/scripts.php');?>
  </body>
</html>