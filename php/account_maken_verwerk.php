<?php 
  if (isset($_POST['accountMaken'])) 
  {
    require('database.php');
    
    //de post variables van alle inputs
    $gebruikersnaam = $_POST['Naam'];
    $email = $_POST['Email'];
    $wachtwoord = $_POST['password'];
    $categorie = $_POST['categorie'];
    //escape strings
    $username = $gebruikersnaam;
    $username = mysqli_real_escape_string($conn, $username);
    
    $password = $wachtwoord;
    $password = mysqli_real_escape_string($conn, $password);
    $password = sha1($password);
    
    //je kan dit niet gebruiken bij een email want dan werkt de preg_match function niet meer omdat
    // ie de speciale karakters weg haalt en dan niet meer de rest van de email heeft.
    // $e_mail = $email;
    // $e_mail = mysqli_real_escape_string($mysql, $password);
    //de file dingen
    // get details of the uploaded file
    $fileTmpPath = $_FILES['profiel']['tmp_name'];
    $fileName = $_FILES['profiel']['name'];
    $path = "../uploads/".$fileName;
    $file1 = explode(".",$fileName);
    //foutmelding die in de else dingen word gebruikt
    $foutmelding = "";
    //de query om de data in de db te stoppen
    $query = "INSERT INTO `kanaal`(`Kanaal_ID`,`ProfielPhoto`, `Naam`, `Email`, `Password`, `CategorieID`) 
    VALUES (NULL,'$fileName', '$username', '$email', '$password', '$categorie')";
    //check of de email echt een email is
    //var_dump($fileName);
    //var_dump($email);
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) 
    {
      $foutmelding .= "<p>E-Mail address is not valid!</p>";
      echo $foutmelding;
    }
    //check of de fileextensions hetzelfde zijn als in de array
    if ($_FILES['profiel']['type'] == 'image/jpg' ||
        $_FILES['profiel']['type'] == 'image/jpeg' ||
        $_FILES['profiel']['type'] == 'image/pjepg' ||
        $_FILES['profiel']['type'] == 'image/png' ||
        $_FILES['profiel']['type'] == 'image/gif') 
    {
      //check of de velden zijn ingevuld
      if (strlen($username) > 0 &&
          strlen($email) > 0 &&
          strlen($password) > 0 &&
          strlen($categorie) > 0 &&
          strlen($fileName) > 0) 
      {
          //voer de query uit
          $result = $conn->query($query);
          $uploaded = move_uploaded_file($fileTmpPath, $path);
          
          if ($result && $uploaded) 
          {
            header("location: ../index.php");
          } else 
          {
            $foutmelding .= "<p>ERROR: Something went wrong!</p>";
            echo $foutmelding;
          }
      } else 
      {
          $foutmelding .= "<p>ERROR: Some fields are still empty!</p>";
          echo $foutmelding;
      }
    } else 
    {
        $foutmelding .= "<p>ERROR: Filetype doesn't match the allowed filetypes!</p>";
        echo $foutmelding;
    }
  }
 ?>