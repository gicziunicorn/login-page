<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu-HU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adathalászat</title>
    <link rel="stylesheet" href="main.css">
    <link rel="shortcut icon" href="./pics/pfp.png" type="image/x-icon">
</head>

<!--------------------
- email cím
- jelszó
- születési dátum
- telefonszám
- férfi/nő
- legmagasabb iskolai végzettség
---------------------->

<body>
    <?php include 'navbar.php'?>
    <main>
        <div id="adatok" style="align-items:flex-start;">
            <p id="adatemail">E-mail:</p>
            <p id="adatpass">Jelszó:</p>
            <p id="adatszul">Születési Dátum:</p>
            <p id="adattel">Telefonszám:</p>
            <p id="adatgender">Neme:</p>
            <p id="adatvegzett">Legmagasabb iskolai végzettség:</p>
        </div>
    </main>
</body>

</html>