<?php
 session_start();
//
// require('php/database.php');
//
// if (!isset($_SESSION['username']))
// {
//
// }
// else
// {
//   $_SESSION['kanaalID'];
//   $_SESSION['username'];
//   $_SESSION['loggedin'] = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require('components/head.php'); ?>
    <title>Social Guys</title>
    <style media="screen">
    /* channels */
    .channels{
        display: flex;
        position: absolute;
        margin-left: 3rem;
        margin-right: auto;
    }
    .channel{
      margin-left: 1.5rem;
    }
    </style>
</head>

<body class="bg-back">
	<div class="d-flex">
    <?php require("components/sidebar.php");?>
    <div id="page-content-wrapper">
<?php require("components/navigation.php");?>
    <h2 style="margin-top: 1.2rem; text-align: center; color: #efeff1;">Your Top Recommended Video</h2>
    <div id="myCarousel" class="ml-5 mr-5 mt-5 carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li></a>
    </ol>
    <div class="carousel-inner">
      <?php

      require('php/database.php');

      if (!isset($_SESSION['username']))
      {
        ?>
          <div class="carousel-item active">
          <a href="#">
          <img class="img-fluid w-100" src="uploads/thumbnails/NoImage.jpg" alt="noimage">
            <div class="container">
              <div class="carousel-caption">
                <a href="#" class="text-light"><h1>Cannot find any video's for your preference</h1>
                <p>N/A</p></a>
              </div>
            </div>
          </a>
          </div>
        <?php
      }
      else
      {
        $_SESSION['kanaalID'];
        $_SESSION['username'];
        $_SESSION['loggedin'] = true;
        //krijg een id van het ingelogde kanaal
        $kanaalID = $_SESSION['kanaalID'];
        //SELECT views.VideoID, video.CategorieID FROM `views`, `video` WHERE video.CategorieID = 4 GROUP BY `VideoID` ORDER BY COUNT(*) DESC

        //Query om de categorie van de kanaal te zoeken zodat er een recommended gemaakt kan worden.
        $query = "SELECT `CategorieID` FROM `Kanaal` WHERE `Kanaal_ID` = ". $kanaalID;
        $result = mysqli_query($conn, $query);
        if ($result)
        {
          // output data of each row
          while($row = mysqli_fetch_array($result))
          {
            $categorieID = $row['CategorieID'];
            $topvid = "SELECT COUNT(VideoID), video.Video_ID, video.Naam, video.File, video.Thumbnail, video.CategorieID
                        FROM `video`, `views` WHERE video.CategorieID = '$categorieID' GROUP BY VideoID ASC LIMIT 1 ";
            $resultaat = mysqli_query($conn, $topvid);

            foreach($resultaat as $video)
            {
              //query voor de video categorie
              $queryC = "SELECT Naam FROM `categorie` WHERE Categorie_ID = ". $video['CategorieID'];
              $resultC = mysqli_query($conn, $queryC);

              foreach ($resultC as $categorie)
              {
                ?>
                  <div class="carousel-item active">
                  <a href="video.php/?id=<?php echo $video['Video_ID']; ?>">
                  <img class="img-fluid w-100" src="uploads/thumbnails/<?php echo $video['Thumbnail'] ?>" alt="<?php echo $video['Thumbnail']; ?>">
                    <div class="container">
                      <div class="carousel-caption">
                        <a href="video.php/?id=<?php echo $video['Video_ID']; ?>" class="text-light"><h1><?php echo $video['Naam']; ?></h1>
                        <p><?php echo $categorie['Naam']; ?></p></a>
                      </div>
                    </div>
                  </a>
                  </div>
                <?php
              }
            }
          }
        } else
        {
          ?>
            <div class="carousel-item active">
            <a href="#">
            <img class="img-fluid w-100" src="uploads/thumbnails/NoImage.jpg" alt="noimage">
              <div class="container">
                <div class="carousel-caption">
                  <a href="#" class="text-light"><h1>Cannot find any video's for your preference</h1>
                  <p>N/A</p></a>
                </div>
              </div>
            </a>
            </div>
          <?php
        }
      }
       ?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="channels">
    <?php
        $queryChannel = "SELECT Naam, Kanaal_ID, ProfielPhoto FROM kanaal LIMIT 6";
        $resultChannel = mysqli_query($conn, $queryChannel);

        if ($result)
        {
          foreach ($resultChannel as $channel)
          {
            ?>
            <div class="channel">
              <a class="channel" href="kanaal.php?id=<?php echo $channel['Kanaal_ID']; ?>">
              <img src="uploads/<?php echo $channel['ProfielPhoto']; ?>" class="img-fluid rounded-circle mx-auto" width='75px' height='75px'
              alt="<?php echo $channel['ProfielPhoto']; ?>"> <no class="text-blank"><?php echo $channel['Naam']; ?></no>
              </a>
            </div>
            <?php
          }
        }else
        {
          ?> <h3>Can't find any channels</h3> <?php
        }
     ?>
  </div>
</div>
</div>
<?php require("components/scripts.php");?>
</body>
</html>
