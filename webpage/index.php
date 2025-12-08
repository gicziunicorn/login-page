<?php session_start();
//if (isset($_SESSION["userid"])) { header("Location: adatok.php"); } 
//else { $_SESSION["msg"] = ""; header("Location: loginpage.php"); }
?>

<!DOCTYPE html>
<html lang="hu-HU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adathalászat főoldal</title>
    <link rel="stylesheet" href="main.css">
    <link rel="shortcut icon" href="./pics/pfp.png" type="image/x-icon">
</head>
<body id="mainpage">
    <?php require 'navbar.php'; ?>
    <h2>Főoldal</h2>
    <p>Üdvözlünk a weboldalunkon!</p>
    <p><?php
        if ( isset($_SESSION['userid']) ) {
            echo "Be vagy jelentkezve, nézz szét a weboldalon!";
        } else {
            echo 'Még nem vagy bejelentkezve, <a style="font-family:initial;" href="loginpage.php">jelentkezz be</a> vagy <a style="font-family:initial;" href="registrationpage.php">hozz létre egy fiókot</a>!';
        }
    ?></p>
</body>
</html>