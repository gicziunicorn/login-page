<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adathalászat</title>
    <link rel="stylesheet" href="main.css">
    <link rel="favicon" href="./pics/pfp.png" type="image/x-icon">
</head>
<body>
    <?php include 'navbar.php' ?>
    <main>
        <div id="adatok" style="align-items:flex-start;">
            <p id="adatid">Felhasználói azonosító: <?php echo $_SESSION["userid"] ?> </p>
            <p id="adatuname">Felhasználónév: <?php echo $_SESSION["uname"] ?> </p>
            <p id="adatemail">E-mail: <?php echo $_SESSION["email"] ?> </p>
            <p id="adatszul">Születési Dátum: <?php echo $_SESSION["date"] ?> </p>
            <p id="adattel">Telefonszám: <?php echo $_SESSION["tel"] ?> </p>
            <p id="adatgender">Neme: <?php $nem = $_SESSION["nem"];
                                        switch ($nem) {
                                            case 'm':
                                                echo "férfi";
                                                break;
                                            case 'w':
                                                echo "nő";
                                                break;
                                            case 'x':
                                                echo "nincs megadva";
                                                break;
                                            default:
                                                echo 'semmi';
                                                break;
                                        }
                                        ?> </p>
        </div>
    </main>
</body>


</html>

