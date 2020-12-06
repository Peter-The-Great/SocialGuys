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
<div class="videos">
<div class="row">
        <div class="col-md-4">
         <div class="card mb-4 text-white bg-dark">
            <a href="video.php?"><img class="card-img-top" src="//placeimg.com/290/180/any"></a>
            <div class="card-body">
            <a href="video.php?"><h5 class="card-title">Card title</h5></a>
               <div class="info-section">
					<a href="kanaal.php?"><label class="text-white" style="cursor:pointer;">NIKO!</label></a>
					<span>100 Views</span>
				</div>
            </div>
         </div>
         </a>
      </div>
   </div>
   </div>
   </div>
</div>
</div>
<?php require("components/scripts.php");?>
</body>
</html>