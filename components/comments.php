<?php
require 'php/database.php';
  
  if (!isset($_SESSION['username']))
  {
    ?>
   <div class="bg-twitch rounded" style="font-size: 0.90rem;" id="sidebar-wrapper">
         <div class="list-group list-group-flush">
           <a disabled="disabled" class="list-group-item list-group-item-action text-white bg-dark">Comments</a>
         </div>
       </div>
       <?php
  }
  else
  {
    $_SESSION['kanaalID'];
    $_SESSION['username'];
  
  ?>
  
 <div class="bg-twitch rounded" style="font-size: 0.90rem;" id="sidebar-wrapper">
       <div class="list-group mt-3 list-group-flush">
         <a href="#" disabled class="list-group-item list-group-item-action text-white bg-dark">Comments</a>
  <?php
  
  //krijgt de id van de ingelogde kanaal en het kanaal waar je op wilt abonneren
  $subscriber = $_SESSION['kanaalID'];
  
  //de query om ze in de db te zetten als het goed is moet dit gewoon werken.
  $query = "SELECT * FROM `subscriptions` WHERE KanaalID = '$subscriber'";
  $result = mysqli_query($conn, $query);
  if ($result) 
  {
    while ($subscription = mysqli_fetch_array($result))
    {
      $queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID = ". $subscription['Subscription'];
  
      $resultaat = mysqli_query($conn, $queryKanaal);
      foreach ($resultaat as $kanaal) 
      {
        ?>
          <a href="kanaal.php?id=<?php echo $kanaal['Kanaal_ID']; ?>" class="list-group-item list-group-item-action text-white bg-dark"><?php echo $kanaal['Naam']; ?></a>
        <?php
      }
    }
  } else
  {
    ?>
    <div class="bg-twitch rounded" style="font-size: 0.90rem;" id="sidebar-wrapper">
          <div class="list-group list-group-flush">
            <a disabled="disabled" class="list-group-item list-group-item-action text-white bg-dark">There is something wrong with getting your comments</a>
          </div>
        </div>
    <?php
  }
  ?>
</div>
</div>
  <?php
}
?>