<?php
  require('php/database.php');

  //zoek de id in de url
  $id = $_GET['id'];

  //query voor de om de video op te halen
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
    <div class="col">
  <?php
    $query = "SELECT * FROM `video` WHERE `KanaalID` = ". $id;
    //query om de kanaal te zoeken
    $queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID = ". $id;
    //resultaat voor de video query
    $result = mysqli_query($conn, $query);
  $foutmelding = "";
  $path = 'uploads/videos/';
  //checked of de url wel een id ontvangt en geen string
  if ((int) $id === $id)
  {
    $foutmelding .= "<p>ERROR: You're trying to find a user by name! Not by ID.</p>";
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
    echo "";
      echo "<img class='img-fluid ml-1' style='border-radius: 150px;' src='uploads/profile/".$kanaal['ProfielPhoto']."' alt='Profilephoto for this channel'>";
      echo "<h2 class='text-white'>".$kanaal['Naam']."</h2>";?>
      <form action="php/subscribe.php" method="post">
              <input type="hidden" name="kanaalID" value="<?php echo $kanaal['Kanaal_ID']; ?>">
              <input type="submit" class="btn btn-outline-info" name="subscribe" value="Subscribe"></input>
            </form>
      <?php
      foreach($result as $video)
      {
        //query voor de video categorie
        $queryC = "SELECT Naam FROM `categorie` WHERE Categorie_ID = ". $video['CategorieID'];
        $resultC = mysqli_query($conn, $queryC);

        $filename = $video['File'];
        $filepath = $path.$filename;
        $fileExtension = substr($filename, -3);
        //echo de video titel
        echo "<h3 class='text-white'>".$video['Naam']."</h3>";
        echo "<video witdth='320' height='240' poster='uploads/thumbnails/".$video['Thumbnail']."' controls muted>";
          echo "<source src='".$filepath."' type='video/".$fileExtension."'>";
          echo "Your browser doesn't support the video tag!";
        echo "</video>";
        foreach($resultC as $catagorie)
        {
          //echo de categorie naam door de query
          echo "<p class='text-white'>".$catagorie['Naam']."</p>";
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
</div>
<?php require("components/scripts.php");?>
</body>
</html>