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

<body>
<form id="change" action="change.php" method="post" style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:100vh">
    <label for="change">Add meg az új felhasználóneved: </label>
    <input type="text" name="change" id="cinput">
    <button type="submit">Megváltoztatás</button>
</form>
</body>
</html>