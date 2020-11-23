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

<body class="bg-back">
	<div class="d-flex">
    <?php require("components/sidebar.php");?>
    <div id="page-content-wrapper">
<?php require("components/navigation.php");?>
    <div id="myCarousel" class="ml-5 mr-5 mt-5 carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li></a>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img class="img-fluid w-100" src="uploads/Thumbnail/mario.png" alt="First slide">
        <div class="container">
          <div class="carousel-caption">
            <a href="kanaal.php?id=15" class="text-light"><h1>Super mario Odyssey</h1>
            <p>Cool mario game!</p></a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="img-fluid w-100" src="uploads/Thumbnail/minecraft.png" alt="First slide">
        <div class="container">
          <div class="carousel-caption text-light">
            <a href="kanaal.php?id=15" class="text-light"><h1>Minecraft Java</h1>
            <p>Download minecraft today to join us and get a 50% discount on purchase!</p></a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="img-fluid w-100" src="uploads/Thumbnail/zelda.png" alt="First slide">
        <div class="container">
          <div class="carousel-caption text-light">
            <a href="index.php" class="text-light"><h1>Breath of the wild 2</h1>
            <p>The new zelda game is coming out. Are you excited!</p></a>
          </div>
        </div>
      </div>
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
</div>
</div>
<?php require("components/scripts.php");?>
</body>
</html>