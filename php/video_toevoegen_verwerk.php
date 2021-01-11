<?php
  if (isset($_POST['uploaden']))
  {
    session_start();

    if (!isset($_SESSION['username']))
    {
        header('location:index.php');
    }
    else
    {
      $_SESSION['kanaalID'];
      $_SESSION['username'];
    }
    require 'database.php';

    //alle post variables
    $titel = $_POST['titel'];
    $categorie = $_POST['categorie'];
    $kanaalID = $_SESSION['kanaalID'];
    $id = $_POST['kanaalID'];

    //strings worden gesanitized
    $title = $titel;
    $title = mysqli_real_escape_string($conn, $title);

    //alle files dingen om te kunnen uploaden
    $fileTmpPath = $_FILES['video']['tmp_name'];
    $fileName = $_FILES['video']['name'];
    $path = "../uploads/videos/".$fileName;
    $fileTmpPathThumbnail = $_FILES['thumbnail']['tmp_name'];
    $fileNameThumbnail = $_FILES['thumbnail']['name'];
    $thumbnailType = $_FILES['thumbnail']['type'];
    $pathThumbnail = "../uploads/thumbnails/".$fileNameThumbnail;

    //foutmelding die in de else dingen word gebruikt
    $foutmelding = "";

    //een check om te kijken of de hidden id in de form van het toevoegen hetzelfde is als de id van de session
    if ($kanaalID != $id)
    {
       $foutmelding .= "ERROR: your channel ID does not match!";
       echo $foutmelding;
       exit;
    }
    //checked of de thumbnail een foto file is
    //  if ($thumbnailType <> 'image/jpg' ||
    //      $thumbnailType <> 'image/jpeg' ||
    //      $thumbnailType <> 'image/pjepg' ||
    //      $thumbnailType <> 'image/png' ||
    //      $thumbnailType <> 'image/gif')
    //  {
    //    $foutmelding .= "<p>ERROR: The photo file you tried to upload is not accepted</p>";
    //    echo $foutmelding;
    //    exit;
    // }

    //de query om het in de db te opslaan
    $query = "INSERT INTO `video`(`Naam`, `File`, `Thumbnail`, `CategorieID`, `KanaalID`) VALUES ('$title','$fileName', '$fileNameThumbnail', '$categorie','$kanaalID')";
    
    echo $query;
    if ($thumbnailType == 'image/jpg' ||
        $thumbnailType == 'image/jpeg' ||
        $thumbnailType == 'image/pjepg' ||
        $thumbnailType == 'image/png' ||
        $thumbnailType == 'image/gif')
    {
      if ($_FILES['video']['type'] == 'video/mpeg' ||
          $_FILES['video']['type'] == 'video/ogg' ||
          $_FILES['video']['type'] == 'video/webm' ||
          $_FILES['video']['type'] == 'video/mp4' ||
          $_FILES['video']['type'] == 'video/mov')
      {
        //checked of alle velden zijn ingevuld
        if (strlen($title) > 0 ||
            strlen($tcategorie) > 0 ||
            strlen($kanaalID) > 0 ||
            strlen($fileName) > 0)
        {
          //voer de query uit
          $result = mysqli_query($conn, $query);
          $uploaded = move_uploaded_file($fileTmpPath, $path);
          $uploadedThumbnail = move_uploaded_file($fileTmpPathThumbnail, $pathThumbnail);

          if ($result && $uploaded && $uploadedThumbnail)
          {
            header("location: ../index.php");
            exit;
          } else
          {
            $foutmelding .= "<p>ERROR: Something went wrong!</p>";
            echo $foutmelding;
          }
        } else
        {
          $foutmelding .= "<p>ERROR: Some of the fields are empty</p>";
          echo $foutmelding;
        }
      } else
      {
        $foutmelding .= "<p>ERROR: The video file you tried to upload is not accepted</p>";
        echo $foutmelding;
      }
    } else 
    {
      $foutmelding .= "<p>ERROR: The photo file you tried to upload is not accepted</p>";
      echo $foutmelding;
    }
  }

 ?>
