<?php
    session_start();
    require('database.php');

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $pswrd = sha1($password);
    $catagorie = mysqli_real_escape_string($conn, $_POST['catagorie']);
    $Afbeelding = $_FILES['Afbeelding'];
    $Tijdelijk = $Afbeelding['tmp_name'];
    $Afbeeldingnaam = $Afbeelding['name'];
    $type = $Afbeelding['type'];
    $map = '../Uploads/';
    $Toegestaan = array("image/jpeg","image/png","image/gif", "image/jpg");

    //Controleer de string lengte
    if (strlen($username) < 2 || strlen($username) > 50){ 
        header('location: ../sign.php?error=Stringfout.');
        return false;
    }
    if (strlen($email) < 3 || strlen($email)  > 50){
        header('location: ../sign.php?error=Stringfout.');
        return false;
    }
    if (strlen($password) > 5 || strlen($password) < 50){
        header('location: ../sign.php?error=Stringfout.');
        return false;
    }
    if (strlen($pswrd) > 20 || strlen($pswrd) < 128){
        header('location: ../sign.php?error=Stringfout.');
        return false;
    }
    if (strlen($catagorie) > 20 || strlen($catagorie) < 128){
        header('location: ../sign.php?error=Stringfout.');
        return false;
    }
    
    if (empty($username) || empty($email) || empty($password) || empty($pswrd) || empty($Afbeeldingnaam)) {
        header('location: ../sign.php?error=Fields were not correct.');
        return false;
    }
    if (in_array($type,$Toegestaan)){
        move_uploaded_file($Tijdelijk, $map.$Afbeeldingnaam);
    } else{
        echo "<a href='toevoeg.php'>Ga terug naar deze pagina.</a>";
        header("Location: toevoeg.php?error=afbeelding");
        exit("File is no image");
    }
    $query = "INSERT INTO `kanaal` (`Kanaal_ID`, `ProfielPhoto`, `Email`, `Naam`, `Password`, `CatagorieID`)
    VALUES ('NULL', '$username', '$Afbeeldingnaam' '$email', '$pswrd', '$catagorie')";
    if($conn->query($query)) {
        $_SESSION["email"] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['kanaalid'] = $conn->query("SELECT Kanaal_ID, FROM kanaal WHERE Email = '$email'");
        $_SESSION['loggedin'] = true;
        header('location: ../');
        return false;
    }
    else {
        header('location: ../sign.php?error=Fields were not correct.');
        return false; 
    }  
?>