<?php
  session_start();
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
    <?php require("components/sidebar.php");?>
    <div id="page-content-wrapper">
    <?php require("components/navigation.php");?>
    <div class="ml-3">
    <div class="col pt-5 mx-auto">
  <?php
  $query = "SELECT * FROM `video` WHERE `Video_ID` = ". $id;
  //query om de kanaal te zoeken
  //resultaat voor de video query
  $result = mysqli_query($conn, $query);
  $row = $result->fetch_assoc();
  $queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID =" . $row["KanaalID"] ;
  
  //echo $result['KanaalID'];
  //$queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID = 15 ";
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
      echo "<div class='row justify-content-start'>
      <a href='kanaal.php?id=". $kanaal['Kanaal_ID'] ."'><img class='img-fluid ml-1 rounded-circle' style='width: 70px; height: 70px;' src='uploads/profile/".$kanaal['ProfielPhoto']."' alt='Profilephoto for this channel'></a>
      <a href='kanaal.php?id=". $kanaal['Kanaal_ID'] ."'><h2 class='text-white ml-2 mt-4'>".$kanaal['Naam']."</h2></a>";?>
      </div></div>
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
        echo "<video autoplay witdth='320' height='240' poster='uploads/thumbnails/".$video['Thumbnail']."' controls>";
          echo "<source src='".$filepath."' type='video/".$fileExtension."'>";
          echo "Your browser doesn't support the video tag!";
        echo "</video>";
        echo "<div class='row mt-3 mx-auto'><h3 class='text-white'>".$video['Naam']."</h3>";
        foreach($resultC as $catagorie)
        {
          //echo de categorie naam door de query
          echo "<p class='text-white ml-2 mt-3'>".$catagorie['Naam']."</p>";
        }
      }
    }
  } else
  {
    $foutmelding .= "<p>ERROR: Something went wrong trying to connect to the database.";
    echo $foutmelding;
  }
 ?>
 <div class="ml-3"><form action="php/subscribe.php" method="post">
              <input type="hidden" name="kanaalID" value="<?php echo $kanaal['Kanaal_ID']; ?>">
              <input type="submit" class="btn btn-outline-info" name="subscribe" value="Subscribe"></input>
            </form></div>
            <?php
            if($kanaal['Kanaal_ID'] === $_SESSION['kanaalID']){
              ?><div class="ml-3"><form action="php/videoverwijder.php" method="post">
              <input type="hidden" name="VideoID" value="<?php echo $video['Video_ID']; ?>">
              <input type="submit" class="btn btn-outline-info" name="verwijder" value="Verwijder Video"></input>
            </form></div>
            <?php }
            ?>
</div>
 </div>
</div>
</div>
<?php require("components/scripts.php");?>
</body>
</html>