<?php
session_start();
//if(isset($_SESSION["loggedin"])) {
//    header("Location: dashboard.php");
//}
$id = $_GET['id'];
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
<div class="ml-3">
   <div class="col pt-5 mx-auto">
<?php
$query = "SELECT * FROM `video` WHERE `KanaalID` = ". $id;
//query om de kanaal te zoeken
$queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID = ". $id;
//resultaat voor de video query
$subscribers = "SELECT COUNT(KanaalID) FROM `subscriptions` WHERE Subscription = ". $id;
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
foreach($resultaat as $kanaal)
    {
      //$subscribeQuery = "SELECT * FROM `subscription` WHERE `KanaalID` = '$id'";
      echo "<img class='img-fluid ml-1 rounded-circle' style=' width: 150px; height: 140px;' src='uploads/profile/".$kanaal['ProfielPhoto']."' alt='Profilephoto for this channel'>";
      echo "<div class='row justify-content-start'><h2 class='text-white'>".$kanaal['Naam']."</h2>";
      $subscribercount = mysqli_query($conn, $subscribers);
            if ($subscribercount->num_rows > 0) {
              // output data of each row
              while($row = $subscribercount->fetch_assoc()) {
                echo "<h2 class='text-white ml-3'>".$row['COUNT(KanaalID)']." Subscribers</h2>";
              }
            } else {
              echo "<h2 class='text-white'>0 Subscribers</h2>";
            }
      ?>
      <div class="ml-3"><form action="php/subscribe.php" method="post">
              <input type="hidden" name="kanaalID" value="<?php echo $kanaal['Kanaal_ID']; ?>">
              <input type="submit" class="btn btn-outline-info" name="subscribe" value="Subscribe"></input>
            </form></div>
            <?php
            if($_SESSION['kanaalID']){
            ?>
            <div class="ml"><form action="php/unsubscribe.php" method="post">
            <input type="hidden" name="kanaalID" value="<?php echo $kanaal['Kanaal_ID']; ?>">
            <input type="submit" class="btn btn-outline-info" name="subscribe" value="Unsubscribe"></input>
          </form></div><?php } ?>
            </div>
   <div class="videos">
    <div class="row">
    <div class='col-md-4'>
<?php
foreach($result as $video)
{
  //query voor de video categorie

  $filename = $video['File'];
  $filepath = $path.$filename;
  $fileExtension = substr($filename, -3);
  $views = "SELECT COUNT(VideoID) FROM `views` WHERE VideoID = ". $video['Video_ID'];
  //echo de video titel
  echo "<div class='card mb-4 text-white bg-dark'>
            <a href='video.php?id=". $video['Video_ID'] ."'><img class='card-img-top' src='uploads/thumbnails/".$video['Thumbnail']."'></a>
            <div class='card-body'>
            <a href='video.php?id=". $video['Video_ID'] ."'><h5 class='card-title'>". $video['Naam'] ."</h5></a>
               <div class='info-section'>
					<a href='kanaal.php?id=". $kanaal['Kanaal_ID'] ."'><label class='text-white' style='cursor:pointer;'>". $kanaal['Naam'] ."</label></a>";
               $viewcount = mysqli_query($conn, $views);
                          if ($viewcount->num_rows > 0) {
                            // output data of each row
                            while($rows = $viewcount->fetch_assoc()) {
                              echo "<span class='text-white'> ".$rows['COUNT(VideoID)']." Views</span>";
                            }
                          } else {
                            echo "<span class='text-white'> 0 Views</span>";
                          }
				echo"</div>
            </div>
         </div>
         </div>";
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
   </div>
   </div>
</div>
</div>
<?php require("components/scripts.php");?>
</body>
</html>