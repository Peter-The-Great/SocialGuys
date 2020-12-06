<div class='bg-twitch rounded mt-5' id='sidebar-wrapper'>
    <div class='list-group list-group-flush'>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Subscriptions</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
    </div>
  </div>
<!--<?php
  if (!isset($_SESSION['username'], $_SESSION['kanaalID']))
  {
    /*echo "<div class='bg-twitch rounded' id='sidebar-wrapper'>
    <div class='list-group list-group-flush'>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Subscriptions</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
      <a href='#' class='list-group-item list-group-item-action text-white bg-dark'>Channel</a>
    </div>
  </div>";*/
  }
  else
  {
    //$_SESSION["email"];
    $_SESSION['kanaalID'];
    $_SESSION['username'];
  }
  require 'php/database.php';

  //krijgt de id van de ingelogde kanaal en het kanaal waar je op wilt abonneren
  $subscriber = $_SESSION['kanaalID'];

  //de query om ze in de db te zetten als het goed is moet dit gewoon werken.
  $query = "SELECT * FROM subscriptions WHERE KanaalID =" . $subscriber;
  $result = mysqli_query($conn, $query);
  if ($result) 
  {
    foreach ($result as $subsription) 
    {
      $queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID = ". $subscription['Subscription'];

      $resultaat = mysqli_query($conn, $queryKanaal);
      foreach ($resultaat as $kanaal) 
      {
        ?>
       <div class="bg-twitch rounded" id="sidebar-wrapper">
             <div class="list-group list-group-flush">
               <a href="#" class="list-group-item list-group-item-action text-white bg-dark">Subscriptions</a>
               <a href="kanaal.php?id=<?php echo $kanaal['Kanaal_ID']; ?>" class="list-group-item list-group-item-action text-white bg-dark"><?php echo $kanaal['Naam']; ?></a>
             </div>
           </div>
        <?php
      }
    }
  } else 
  {
 ?>
<div class="bg-twitch rounded" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action text-white bg-dark">Subscriptions</a>
        <a href="kanaal.php?id=" class="list-group-item list-group-item-action text-white bg-dark">Your not subscibed to anyone</a>
      </div>
    </div>
 <?php 
}
  ?>-->