<?php
session_start();
//if(isset($_SESSION["loggedin"])) {
//    header("Location: dashboard.php");
//}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php require('components/head.php'); ?>
        <title>Social Guys</title>
    </head>
    <style>
        .container{
            top:0;

        }
    .card-body{
        height: 100px;
        color: white;
        background-color: #191919;

    }
    .videos{
        height: 100px;
        width: 800px;
        margin:0 auto;
    }
    .card-body a{
        text-decoration: none;
    }
    .card-title{
        font-size: 25px;
        margin-bottom: 10px;
        color: white;
    }
    .kanaal{
        color: #aaa;
    }

    .card-text{
        padding-top: 2px;
        margin-bottom: 20px;
    }
    .social-card-header{
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center;
        height: 96px;
    }
    .social-card-header i {
        font-size: 32px;
        color:#FFF;
    }
    .card{
        width: 200px;
        margin-bottom: 20px;

    }
    .alert{
        height: 80px;
    }
    a{
        color: none;
    }
    a:hover{
        color: white;
        text-decoration: none;
    }

    .share:hover {
            text-decoration: none;
        opacity: 0.8;
    }
    .info-section {
      display: table-cell;
      text-transform: uppercase;
      text-align: center;
      font-size: 10px;
      color: #aaa;
      text-align: left;
    }
    .info-section a{
        color: #aaa;
    }
    .col-md-4{
        width: 100px;
        height: 200px;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    .kat1{
        position: absolute;
        text-align: left;
        margin-top: 18px;
        color: white;
        font-weight: 800;

    }
    .kat2{
        position: absolute;
        text-align: left;
        margin-top: 265px;
        color: white;
        font-weight: 800;
    }


    .info-section label {
      display: block;
      margin-bottom: .1em;
      font-size: 12px;
    }
    @media screen and (max-width: 900px) {

      .container {
      }
      .col-md-4{
          margin-right: 100px;
      }
    }
    </style>

    <body class="bg-back">
        <div class="d-flex">
            <?php require("components/sidebar.php");?>
            <div id="page-content-wrapper">
                <?php require("components/navigation.php");?>
                <div class="videos">
                  <h2>The most watched videos on the site:</h2>
                  <?php
                    $queryCategorie = "SELECT * FROM `Categorie`";
                    //resultaat voor de video query
                    $result = mysqli_query($conn, $queryCategorie);
                    $foutmelding = "";
                    $path = 'uploads/videos/';

                    if ($result)
                    {
                      foreach($result as $catagorie)
                      {
                        ?>
                        <div class="row">
                            <?php
                                $topVideo = "SELECT views.VideoID, video.CategorieID FROM `views`, `video`
                                WHERE video.CategorieID = '".$catagorie['Categorie_ID']."' GROUP BY `VideoID` ORDER BY COUNT(*) DESC";
                                $resultVideo = mysqli_query($conn, $topVideo);
                                if ($resultVideo->num_rows > 0)
                                {
                                  // output data of each row
                                  while($rows = $resultVideo->fetch_assoc())
                                  {
                                    //query en result voor de om de video data te vinden
                                    $videoQ = "SELECT * FROM `video` WHERE Video_ID = ". $rows['VideoID'];
                                    $videoR = mysqli_query($conn, $videoQ);
                                    while ($video = mysqli_fetch_array($videoR))
                                    {
                                      $views = "SELECT COUNT(VideoID) FROM `views` WHERE VideoID = ". $video['Video_ID'];
                                      ?>
                                      <a href="video.php?id=<?php echo $video['Video_ID']; ?>" >
                                          <div class="col-md-4">
                                              <div class="card mb-4 text-white bg-dark">
                                                  <img class="card-img-top" src="uploads/thumbnails/<?php echo $video['Thumbnail'] ?>">
                                                  <div class="card-body">
                                                      <h5 class="card-title"><?php echo $video['Naam']; ?></h5>
                                                      <div class="info-section">
                                                          <?php
                                                            $viewcount = mysqli_query($conn, $views);
                                                            if ($viewcount->num_rows > 0) {
                                                              // output data of each row
                                                              while($rij = $viewcount->fetch_assoc()) {
                                                                echo "<label> ".$rij['COUNT(VideoID)']." Views</label>";
                                                              }
                                                            } else {
                                                              echo "<label> 0 Views</label>";
                                                            }
                                                          ?>
                                                          <span><?php echo $catagorie['Naam']; ?></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </a>
                                      <?php
                                    }
                                  }
                                } else
                                {
                                  ?>
                                  <!-- <a href="#">
                                      <div class="col-md-4">
                                          <div class="card mb-4 text-white bg-dark">
                                              <img class="card-img-top" src="uploads/thumbnails/NoImage.jpg">
                                              <div class="card-body">
                                                  <h5 class="card-title">No video</h5>
                                                  <div class="info-section">
                                                      <a href=""><label></a></label>
                                                      <span>0 views</span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </a> -->
                                  <?php
                                }
                             ?>
                        </div>
                        <?php
                      }
                    } else
                    {
                      $foutmelding .= "<p>ERROR: Something went wrong trying to connect to the database.";
                      echo $foutmelding;
                      exit;
                    }
                   ?>
                    <!-- <div class="row">
                        <p class="kat1">Kategorie 1</p>
                        <a href="#">
                            <div class="col-md-4">
                                <div class="card mb-4 text-white bg-dark">
                                    <img class="card-img-top" src="//placeimg.com/290/180/any">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <div class="info-section">
                                            <a href=""><label>NIKO!</a></label>
                                            <span>100 Views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
        <?php require("components/scripts.php");?>
    </body>

    </html>
