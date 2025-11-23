<?php
echo '<body style="background-color:black;color:white;">';

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "felhasznalok";
$table = "felhasznaloi_adatok";

try {
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (\Throwable $err) {
    echo '<p style="color:red;">Catched error: ' . $err . '</p>';
}

?>