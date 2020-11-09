<?php
session_start();
if(isset($_SESSION["loggedin"])) {
    header("Location: dashboard.php");
}
  require('../database.php');
  //query om de categorien te vinden in de database
  $query = "SELECT * FROM `categorie`";
  
  //maak een resultaat door te verbinden met de database
  $result = $conn->query($query);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <?php require_once("components/head.php"); ?>
     <title>Account Maken</title>
   </head>
   <body>
   <?php require("components/navigation.php");?>
     <form action="php/account_maken_verwerk.php" method="POST" enctype="multipart/form-data">
       Username:<input type="text" name="Naam"><br>
       Email:<input type="text" name="Email"><br>
       Password:<input type="password" name="password" value=""><br>
       Categorie:<select name="categorie"><br>
         <?php 
            foreach($result as $catagorie)
            {
              echo "<option value='".$catagorie['Categorie_ID']."'>";
              echo $catagorie['Naam'];
              echo "</option>";
            }
          ?>
       </select><br>
       Profile photo<input type="file" name="profiel" ><br>
       <input type="submit" name="accountMaken" value="Sign Up">
       <input type="submit" onclick="history.back(); return;" value="Cancel">
     </form>
   </body>
 </html>