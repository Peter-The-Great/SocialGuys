<?php
  if (isset($_POST['Inloggen']))
  {
    session_start();
    require 'database.php';

    $gebruikersnaam = $_POST['username'];
    $wachtwoord = $_POST['password'];
    $username = $gebruikersnaam;
    $username = mysqli_real_escape_string($conn,$username);

    $password = $wachtwoord;
    $password = mysqli_real_escape_string($conn,$password);

    $query = "SELECT * FROM kanaal WHERE Naam = '$username' AND Password = '".sha1($password)."'";

    $resultaat = mysqli_query($conn, $query);

    if (!$resultaat) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    if (!$resultaat || mysqli_num_rows($resultaat) > 0)
    {
      $kanaal = mysqli_fetch_array($resultaat);
      $_SESSION['kanaalID'] = $kanaal['Kanaal_ID'];
      $_SESSION['username'] = $kanaal['Naam'];
      $_SESSION['loggedin'] = true;
      header('location: ../');
    } else
    {
      echo "<p style='font-family: 'nimbusantregconregular';'>Naam en/of wachtwoord zijn onjuist ingevoerd!</p>";
      echo "<p style='font-family: 'nimbusantregconregular';'><a href='index.php'>ga terug</a></p>";
    }
  } else
  {
  }
?>