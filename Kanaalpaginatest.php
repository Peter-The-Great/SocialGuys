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
    
      <a href="#">
        <div class="col-md-4">
         <div class="card mb-4 text-white bg-dark">
            <img class="card-img-top" src="//placeimg.com/290/180/any" >
            <div class="card-body">
               <h5 class="card-title">Card title</h5>
               <div class="info-section">
					<a href=""><label>NIKO!</a></label>
					<span>100 Views</span>
				</div>
            </div>
         </div>
         </a>
      </div>
      <a href="#">
      <div class="col-md-4">
         <div class="card mb-4 text-white bg-dark">
            <img class="card-img-top" src="//placeimg.com/290/180/any" alt="Card image cap">
            <div class="card-body">
               <h5 class="card-title">Card title</h5>
               <div class="info-section">
               <a href=""><label>NIKO!</a></label>
					<span>100 Views</span>
				</div>
            </div>
         </div>
         </a>
      </div>
      <a href="#">
      <div class="col-md-4">
         <div class="card mb-4 text-white bg-dark">
            <img class="card-img-top" src="//placeimg.com/290/180/any" alt="Card image cap">
            <div class="card-body">
               <h5 class="card-title">Card title</h5>
               <div class="info-section">
					<label>NIKO!</label>
					<span>100 Views</span>
				</div>
            </div>
         </div>
         </a>
      </div>
      <a href="">
      <div class="col-md-4">
         <div class="card mb-4 text-white bg-dark">
            <img class="card-img-top" src="//placeimg.com/290/180/any" alt="Card image cap">
            <div class="card-body">
               <h5 class="card-title">Card title</h5>
               <div class="info-section">
					<label>NIKO!</label>
					<span>100 Views</span>
				</div>
            </div>
         </div>
      </div>
      </a>
   </div>
   </div>
   </div>
</div>
</div>
<?php require("components/scripts.php");?>
</body>
</html>