<?php
  if (!isset($_SESSION['username']))
  {
      ?>
      <nav class="navbar navbar-expand-xl justify-content-between navbar-dark bg-twitch" id="navbartrying"<?php if($_SERVER['SCRIPT_NAME'] == "/SocialGuys/video.php"){ echo "style='margin-right:-15rem!important;'";} ?>>
          <a class="navbar-brand nav-item mr-5" href="./">
          <img src="img/logo.png" class="img-fluid socialguys rounded" alt="Social Guys"> <no class="text-blank">Social Guys</no>
          </a>
          <a href="browse_second.php"><button class="ml-5 btn btn-dark" type="button">
              Browse
          </button></a>
          <a href="live.php"><button class="ml-5 btn btn-dark" type="button">
              Live
          </button></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse my-2" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mr-5">
                      <?php
                  if(!isset($_SESSION['loggedin'])) {
                      echo "
                      <li class='nav-item'>";
                      require('components/login.php');
                      echo "</li>";
                  }
                  else{
                      echo "<no class='text-blank' style='font-size: 28px;'>".$_SESSION['username'];
                      echo "<div class='btn-group'>
                      <button type='button' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <img class='img-fluid rounded-circle mx-auto' width='75px' height='75px' src='uploads/". $_SESSION['profilephoto'] ."'>
                      </button>
                      <div class='dropdown-menu'>
                        <a class='dropdown-item' style='cursor:pointer;' data-toggle='modal' data-target='#toevoeg'>Add video</a>
                        <a class='dropdown-item' href='kanaal.php?id=" . $_SESSION['kanaalID']. "'>Channel</a>
                        <a class='dropdown-item' href='php/logout.php'>Logout</a>
                    </div>";
                  }
                  ?>
              </ul>
          </div>
      </nav>
      <div id="toevoeg" aria-labelledby="toevoegLabel" aria-hidden="true" class="modal fade text-left" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add video</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="php/video_toevoegen_verwerk.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="hidden" name="kanaalID" value="<?php echo $kanaalID; ?>">
                  <label>Video title</label>
                  <input name="titel" id="video title" class="form-control" placeholder="Video title" type="text">
              </div>
              <div class="form-group">
            <label>Categorie:</label><select class="form-control" name="categorie">
            <option selected disabled >Select Catagorie</option>
                <?php
                   while ($categorie = mysqli_fetch_array($result))
                   {
                     echo "<option value='".$categorie['Categorie_ID']."'>";
                       echo $categorie['Naam'];
                     echo "</option>";
                   }
                 ?>
                </select>
                </div>
                <div class="form-group">
                  <label>Select video</label><input class="form-control-file" type="file" name="video">
                </div>
                <div class="form-group">
                  <label>Thumbnail picture</label><input class="form-control-file" type="file" name="thumbnail">
                </div>
                    <input type="submit" class="btn btn-dark btn-block" name="uploaden" value="Upload">
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
              </form>
            </div>
          </div>
        </div>
      <?php
  }
  else
  {
    $_SESSION['kanaalID'];
    $_SESSION['username'];
    $_SESSION['loggedin'] = true;
  require 'php/database.php';
  //query om de categorien te vinden in de database
  $query = "SELECT * FROM `categorie`";

  //maak een resultaat door te verbinden met de database
  $result = mysqli_query($conn, $query);

  $kanaalID = $_SESSION['kanaalID'];

 ?>
<nav class="navbar navbar-expand-xl justify-content-between navbar-dark bg-twitch" id="navbartrying"<?php if($_SERVER['SCRIPT_NAME'] == "/SocialGuys/video.php"){ echo "style='margin-right:-15rem!important;'";} ?>>
    <a class="navbar-brand nav-item mr-5" href="./">
    <img src="img/logo.png" class="img-fluid socialguys rounded" alt="Social Guys"> <no class="text-blank">Social Guys</no>
    </a>
    <a href="browse_second.php"><button class="ml-5 btn btn-dark" type="button">
        Browse
    </button></a>
    <a href="live.php"><button class="ml-5 btn btn-dark" type="button">
        Live
    </button></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse my-2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-5">
                <?php
            if(!isset($_SESSION['loggedin'])) {
                echo "
                <li class='nav-item'>";
                require('components/login.php');
                echo "</li>";
            }
            else{
                echo "<no class='text-blank' style='font-size: 28px;'>".$_SESSION['username'];
                echo "<div class='btn-group'>
                <button type='button' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  <img class='img-fluid rounded-circle mx-auto' width='75px' height='75px' src='uploads/". $_SESSION['profilephoto'] ."'>
                </button>
                <div class='dropdown-menu'>
                  <a class='dropdown-item' style='cursor:pointer;' data-toggle='modal' data-target='#toevoeg'>Add video</a>
                  <a class='dropdown-item' href='kanaal.php?id=" . $_SESSION['kanaalID']. "'>Channel</a>
                  <a class='dropdown-item' href='php/logout.php'>Logout</a>
              </div>";
            }
            ?>
        </ul>
    </div>
</nav>
<div id="toevoeg" aria-labelledby="toevoegLabel" aria-hidden="true" class="modal fade text-left" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php/video_toevoegen_verwerk.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="kanaalID" value="<?php echo $kanaalID; ?>">
            <label>Video title</label>
            <input name="titel" id="video title" class="form-control" placeholder="Video title" type="text">
        </div>
        <div class="form-group">
      <label>Categorie:</label><select class="form-control" name="categorie">
      <option selected disabled >Select Catagorie</option>
          <?php
             while ($categorie = mysqli_fetch_array($result))
             {
               echo "<option value='".$categorie['Categorie_ID']."'>";
                 echo $categorie['Naam'];
               echo "</option>";
             }
           ?>
          </select>
          </div>
          <div class="form-group">
            <label>Select video</label><input class="form-control-file" type="file" name="video">
          </div>
          <div class="form-group">
            <label>Thumbnail picture</label><input class="form-control-file" type="file" name="thumbnail">
          </div>
              <input type="submit" class="btn btn-dark btn-block" name="uploaden" value="Upload">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
        </form>
      </div>
    </div>
  </div>
  <?php 
}
   ?>