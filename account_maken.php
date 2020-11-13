<?php
session_start();
if(isset($_SESSION["loggedin"])) {
    header("Location: ../kanaal.php");
}
  require('php/database.php');
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
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <?php require_once("components/head.php"); ?>
     <title>Account Maken</title>
   </head>
   <body>
   <?php require("components/navigation.php");?>
     <form action="php/account_maken_verwerk.php" method="POST" enctype="multipart/form-data">
       <label>Username:<label>
       <input type="text" required name="Naam"><br>
       <lable>Email:</label>
       <input type="text" name="Email" required><br>
       <label>Password:</label>
       <input type="password" required name="password"><br>
       <label>Categorie:</label><select name="categorie">
       <option selected disabled>-- Select here --</option>
         <?php 
            foreach($result as $catagorie)
            {
              echo "<option value='".$catagorie['Categorie_ID']."'>";
              echo $catagorie['Naam'];
              echo "</option>";
            }
          ?>
       </select><br>
       <label>Profile photo</label><input type="file" name="profiel"><br>
       <input type="submit" name="accountMaken" value="Sign Up">
       <input type="submit" onclick="window.history.back(); return;" value="Cancel">
       <?php
       require('components/footer.php'); 
       require('components/scripts.php');
       ?>
     </form>
   </body>
 </html>