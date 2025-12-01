<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiba történt!</title>
</head>
<body style="display:flex;align-items:center;justify-content:center;flex-direction:column;margin-top:20vh;background:black;">
    <h1 style="color:white;">Nem indítottad el az adatbázist</h1>
    <p style="color:red;"><?php echo "Hiba: " . $_SESSION['error']; ?></p>
</body>
</html>