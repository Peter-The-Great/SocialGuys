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
    <link rel="stylesheet" href="css/kanaal.css">
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
    //subscriber count
    $subscribers = "SELECT COUNT(KanaalID) FROM `subscriptions` WHERE Subscription = ". $id;
    //resultaat voor de video query
    $result = mysqli_query($conn, $query);
    $foutmelding = "";
    $path = 'uploads/videos/';
    //checked of de url wel een id ontvangt en geen string
    if ((int) $id === $id)
    {
      $foutmelding .= "<p>ERROR: You're trying to find a user by name! Not by ID.</p>";
      echo $foutmelding;
      exit;
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
        exit;
      }

      //loop over de resultaat voor van de resultaten.
      foreach($resultaat as $kanaal)
      {
        $subscribeQuery = "SELECT * FROM `subscription` WHERE `KanaalID` = '$id'";

        // echo "";
        // echo "<img class='img-fluid ml-1' style='border-radius: 150px;' src='uploads/profile/".$kanaal['ProfielPhoto']."' alt='Profilephoto for this channel'>";
        // echo "<h2 class='text-white'>".$kanaal['Naam']."</h2>";
        ?>
        <div class="col-md-12">
          <img src="uploads/<?php echo $kanaal['ProfielPhoto']; ?>" >
          <p><?php echo $kanaal['Naam']; ?></p>
          <?php
          //om de subscriber count te laten zien
          //de row['COUNT(KanaalID)'] is de tabel hoofd output van de sql query
          //dit is nu de beste manier om dit te doen en het werkt. Dit zelfde kan je ook gebruiken voor view count.
            $subscribercount = mysqli_query($conn, $subscribers);
            if ($subscribercount->num_rows > 0) {
              // output data of each row
              while($row = $subscribercount->fetch_assoc()) {
                echo "<label> ".$row['COUNT(KanaalID)']." Subscribers</label>";
              }
            } else {
              echo "<label> 0 Subscribers</label>";
            }
           ?>
        </div>
          <form action="php/subscribe.php" method="post">
            <input type="hidden" name="kanaalID" value="<?php echo $kanaal['Kanaal_ID']; ?>">
            <input type="submit" class="btn btn-outline-info" name="subscribe" value="Subscribe"></input>
          </form>
          <form action="php/unsubscribe.php" method="post">
            <input type="hidden" name="kanaalID" value="<?php echo $kanaal['Kanaal_ID']; ?>">
            <input type="submit" class="btn btn-outline-info" name="subscribe" value="Unsubscribe"></input>
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
          // echo "<h3 class='text-white'>".$video['Naam']."</h3>";
          // echo "<video witdth='320' height='240' poster='uploads/thumbnails/".$video['Thumbnail']."' controls muted>";
          //   echo "<source src='".$filepath."' type='video/".$fileExtension."'>";
          //   echo "Your browser doesn't support the video tag!";
          // echo "</video>";
          foreach($resultC as $catagorie)
          {
            //echo de categorie naam door de query
            //echo "<p class='text-white'>".$catagorie['Naam']."</p>";
            //om de meest bekeken video te vinden SELECT COUNT(`VideoID`) AS `value_occurrence` FROM `views` GROUP BY `VideoID` ORDER BY `value_occurrence` DESC LIMIT 1
            //deze is misschien beter SELECT `VideoID` FROM `views` GROUP BY `VideoID` ORDER BY COUNT(*) DESC LIMIT 1 limit kan veranderd worden naar van alles
            $views = "SELECT COUNT(VideoID) FROM `views` WHERE VideoID = ". $video['Video_ID'];
            ?>
            <a href="video.php?id=<?php echo $video['Video_ID']; ?>">
              <div class="col-md-4">
               <div class="card mb-4 text-white bg-dark">
                  <img class="card-img-top" src="uploads/thumbnails/<?php echo $video['Thumbnail'] ?>" >
                  <div class="card-body">
                     <h5 class="card-title"><?php echo $video['Naam']; ?></h5>
                     <div class="info-section">
                        <?php
                        //om de subscriber count te laten zien
                        //de row['COUNT(KanaalID)'] is de tabel hoofd output van de sql query
                        //dit is nu de beste manier om dit te doen en het werkt. Dit zelfde kan je ook gebruiken voor view count.
                          $viewcount = mysqli_query($conn, $views);
                          if ($viewcount->num_rows > 0) {
                            // output data of each row
                            while($rows = $viewcount->fetch_assoc()) {
                              echo "<label> ".$rows['COUNT(VideoID)']." Views</label>";
                            }
                          } else {
                            echo "<label> 0 Views</label>";
                          }
                         ?>
                        <span> <?php echo $catagorie['Naam']; ?> </span>
                      </div>
                  </div>
               </div>
               </a>
            <?php
          }
        }
      }
    } else
    {
      $foutmelding .= "<p>ERROR: Something went wrong trying to connect to the database.";
      echo $foutmelding;
      exit;
    }
 ?>
 </div>
</div>
<?php require("components/comments.php");?>
</div>
<?php require("components/scripts.php");?>
</body>
</html>
