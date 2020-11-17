<?php 
    session_start();

    if (!isset($_SESSION['username']))
    {
        header('location:index.php');
    }
    else
    {
      $_SESSION["email"];
      $_SESSION['kanaalID'];
      $_SESSION['username'];
      $_SESSION['loggedin'] = true;
    }
  require 'php/database.php';
  //query om de categorien te vinden in de database
  $query = "SELECT * FROM `categorie`";
  
  //maak een resultaat door te verbinden met de database
  $result = mysqli_query($conn, $query);
  
  $kanaalID = $_SESSION['kanaalID'];
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="php/video_toevoegen_verwerk.php" enctype="multipart/form-data" method="post">
      <p>Title:</p>
      <input type="text" name="titel" placeholder="Title">
      <p>Categorie</p>
      <select name="categorie"><br>
        <?php 
           while ($categorie = mysqli_fetch_array($result)) 
           {
             echo "<option value='".$categorie['Categorie_ID']."'>";
               echo $categorie['Naam'];
             echo "</option>";
           }
         ?>
      </select>
      <p>Video file:</p>
      <input type="file" name="video" ><br>
<<<<<<< HEAD
      <p>Thumbnail:</p>
      <input type="file" name="thumbnail" ><br>
=======
>>>>>>> feature-video-toevoegen
      <input type="submit" name="uploaden" value="Upload">
    </form>
  </body>
</html>