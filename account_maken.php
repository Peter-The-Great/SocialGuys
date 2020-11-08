<?php 
  require 'config.php';
  //query om de categorien te vinden in de database
  $query = "SELECT * FROM `categorie`";
  
  //maak een resultaat door te verbinden met de database
  $result = mysqli_query($mysql, $query);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Account Maken</title>
   </head>
   <body>
     <form action="account_maken_verwerk.php" method="post" enctype="multipart/form-data">
       Username:<input type="text" name="Naam"><br>
       Email:<input type="text" name="Email"><br>
       Password:<input type="password" name="password" value=""><br>
       Categorie:<select name="categorie"><br>
         <?php 
            while ($categorie = mysqli_fetch_array($result)) 
            {
              echo "<option value='".$categorie['Categorie_ID']."'>";
                echo $categorie['Naam'];
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