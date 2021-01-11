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

    $video = $_GET['id'];
  ?>

 <div class="bg-twitch rounded" style="font-size: 0.90rem;" id="sidebar-wrapper">
       <div class="list-group mt-3 list-group-flush">
         <a href="#" disabled class="list-group-item list-group-item-action text-white bg-dark">Comments</a>
         <form class="comment" action="php/comment_verwerk.php" method="post">
           <input type="text" style="width: 100%;" name="comment_content">
           <input type="hidden" style="width: 100%;" value="<?php echo $_SESSION['kanaalID']; ?>" name="commenter">
           <input type="hidden" style="width: 100%;" value="<?php echo $video; ?>" name="video">
           <input type="submit" name="comment_submit" value="Post">
         </form>
  <?php

  //query voor het vinden van de comments
  $query = "SELECT * FROM `comments` WHERE VideoID = ". $video;
  $result = mysqli_query($conn, $query);
  if ($result)
  {
    while ($comment = mysqli_fetch_array($result))
    {
      $queryKanaal = "SELECT * FROM kanaal WHERE Kanaal_ID = ". $comment['KanaalID'];

      $resultaat = mysqli_query($conn, $queryKanaal);
      foreach ($resultaat as $kanaal)
      {
        ?>
          <em style="color: #efeff1;"> <?php echo $kanaal['Naam']; ?> </em>
          <p style="color: #efeff1;"> <?php echo $comment['Comment']; ?> </p>
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
