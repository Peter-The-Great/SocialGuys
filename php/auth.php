<?php
    session_start();
    require("database.php");
    if(!isset($_POST["email"], $_POST["username"], $_POST["password"]) ) {
        header("Location: index.php?message=Je hebt niet alle velden correct ingevuld!");
    }
    if($stmt = $conn->prepare("SELECT `Kanaal_ID`, `Email`, `Password`, `Naam` FROM `kanaal` WHERE `Email` = ?")) {
        $stmt->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $email, $password, $username);
            $stmt->fetch();
            
            $pswrd = $_POST["password"];
            if (sha1($pswrd) == $password) {
                $_SESSION['userid'] = $id;
                $_SESSION["email"] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header('location: ../index.php?'. $_SESSION['userid'] .'');
            }
                else {
                    session_destroy();
                    header("Location: ../index.php?message=Your account has been set to inactive");                    
                }
            } else {
                session_destroy();
                header("Location: ../index.php?message=The password is not similar.");
            }
        } else {
            session_destroy();
            header("Location: ../index.php?message=We couldn't find an account with this email-address.");
        }
        $stmt->close();
?>