<?php
  require 'php/database.php';

  //zoek de id in de url
  $id = 1;

  //query voor de om de video op te halen
  $query = "SELECT * FROM video WHERE KanaalID = ". $id;
  //query om de kanaal te zoeken
  $queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID = ". $id;
  //resultaat voor de video query
  $result = mysqli_query($conn, $query);
  $foutmelding = "";

  $path = 'uploads/videos/';

  //checked of de url wel een id ontvangt en geen string
  if ((int) $id === $id)
  {
    $foutmelding .= "<p>ERROR: You're trying to find a user by name! Not by ID.";
    echo $foutmelding;
  }

  if ($result)
  {
    //resultaat voor de kanaal query
    $resultaat = mysqli_query($conn, $queryKanaal);
    //checked of de resultaat goed is gegaan als het niet zo is dan krijg je een foutmelding
    if (!$resultaat)
    {
      $foutmelding .= "<p>ERROR: Something went wrong trying to connect to the database.";
      echo $foutmelding;
    }

    //loop over de resultaat voor van de resultaten.
    foreach($resultaat as $kanaal)
    {
      echo "<img src='uploads/".$kanaal['ProfielPhoto']."' alt='Profilephoto for this channel'>";
      echo "<h2>".$kanaal['Naam']."</h2>";
      foreach($result as $video)
      {
        //query voor de video categorie
        $queryC = "SELECT Naam FROM `categorie` WHERE Categorie_ID = ". $video['CategorieID'];
        $resultC = mysqli_query($conn, $queryC);

        $filename = $video['File'];
        $filepath = $path.$filename;
        $fileExtension = substr($filename, -3);
        //echo de video titel
        echo "<h3>".$video['Naam']."</h3>";
        echo "<video witdth='320' height='240' poster='uploads/thumbnails/".$video['Thumbnail']."' controls muted>";
          echo "<source src='".$filepath."' type='video/".$fileExtension."'>";
          echo "Your browser doesn't support the video tag!";
        echo "</video>";
        foreach($resultC as $catagorie)
        {
          //echo de categorie naam door de query
          echo "<p>".$catagorie['Naam']."</p>";
        }
      }
    }
  } else
  {
    $foutmelding .= "<p>ERROR: Something went wrong trying to connect to the database.";
    echo $foutmelding;
  }
 ?>
<?php
  require 'php/database.php';

  //zoek de id in de url
  $id = 1;

  //query voor de om de video op te halen
  $query = "SELECT * FROM video WHERE KanaalID = ". $id;
  //query om de kanaal te zoeken
  $queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID = ". $id;
  //resultaat voor de video query
  $result = mysqli_query($conn, $query);
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('components/head.php');?>
    <title>Social Guys</title>
  </head>

  <body class="bg-back">
    <div class="d-flex">
    <?php require("components/sidebar.php"); ?>
    <div id="page-content-wrapper">
    <?php require("components/navigation.php");?>
  <?php 
  $foutmelding = "";
  $path = 'uploads/videos/';
  //checked of de url wel een id ontvangt en geen string
  if ((int) $id === $id)
  {
    $foutmelding .= "<p>ERROR: You're trying to find a user by name! Not by ID.";
    echo $foutmelding;
  }

  if ($result)
  {
    //resultaat voor de kanaal query
    $resultaat = mysqli_query($conn, $queryKanaal);
    //checked of de resultaat goed is gegaan als het niet zo is dan krijg je een foutmelding
    if (!$resultaat)
    {
      $foutmelding .= "<p>ERROR: Something went wrong trying to connect to the database.";
      echo $foutmelding;
    }

    //loop over de resultaat voor van de resultaten.
    foreach($resultaat as $kanaal)
    {
      echo "<img src='uploads/".$kanaal['ProfielPhoto']."' alt='Profilephoto for this channel'>";
      echo "<h2>".$kanaal['Naam']."</h2>";
      foreach($result as $video)
      {
        //query voor de video categorie
        $queryC = "SELECT Naam FROM `categorie` WHERE Categorie_ID = ". $video['CategorieID'];
        $resultC = mysqli_query($conn, $queryC);

        $filename = $video['File'];
        $filepath = $path.$filename;
        $fileExtension = substr($filename, -3);
        //echo de video titel
        echo "<h3>".$video['Naam']."</h3>";
        echo "<video witdth='320' height='240' poster='uploads/thumbnails/".$video['Thumbnail']."' controls muted>";
          echo "<source src='".$filepath."' type='video/".$fileExtension."'>";
          echo "Your browser doesn't support the video tag!";
        echo "</video>";
        foreach($resultC as $catagorie)
        {
          //echo de categorie naam door de query
          echo "<p>".$catagorie['Naam']."</p>";
        }
      }
    }
  } else
  {
    $foutmelding .= "<p>ERROR: Something went wrong trying to connect to the database.";
    echo $foutmelding;
  }
 ?>
</div>
</div>
<?php require("components/scripts.php");?>
</body>
</html>