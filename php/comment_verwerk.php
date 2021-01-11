<?php 
  require 'database.php';
  
  $comment = "";
  $commenter = "";
  if (isset($_POST['comment_submit'])) 
  {
    $comment = input_sanitize($_POST['comment_content']);
    $commenter = input_sanitize($_POST['commenter']);
    $video = input_sanitize($_POST['video']);
    
    if (!empty($comment) && !empty($commenter) && !empty($video)) 
    {
      if (filter_var($commenter, FILTER_VALIDATE_INT) && filter_var($video, FILTER_VALIDATE_INT)) 
      {
        $query = "INSERT INTO `comments`(`Comment`, `KanaalID`, `VideoID`) VALUES ('$comment', '$commenter', '$video')";
        
        $result = mysqli_query($conn, $query);
        if ($result) 
        {
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit;
        } else
        {
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit;
        }
      } else
      {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
      }
    } else
    {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  function input_sanitize($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 ?>