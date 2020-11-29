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
  }
  if(isset($_POST['subscribe']))
  {
    require 'database.php';

    //krijgt de id van de ingelogde kanaal en het kanaal waar je op wilt abonneren
    $subscriber = $_SESSION['kanaalID'];
    $subscribee = $_POST['kanaalID'];

    //de query om ze in de db te zetten als het goed is moet dit gewoon werken.
    $query = "INSERT INTO `subscriptions`(`KanaalID`, `Subscription`) VALUES ($subscriber,$subscribee)";

    $foutmelding = "";
    
    //Dit doet het nog niet.
    if ($subscriber == $subscribee)
    {
      $foutmelding .= "<p>ERROR: You can't subscribe to yourself!";
      echo $foutmelding;
    }

    $result = mysqli_query($conn, $query);

    if ($result)
    {
      header("location: ../kanaal.php?id=".$subscribee);
    } else
    {
      $foutmelding .= "<p>ERROR: Something wen't wrong!";
      echo $foutmelding;
    }
  }
?>
