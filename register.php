<?php
require 'db.php';

echo $_SERVER["REQUEST_METHOD"];
$table = "felhasznaloi_adatok";
echo $_GET["email"];

// Ellenőrizzük, létezik-e már
$result = $conn->query("SELECT * FROM ".$table." WHERE email =".$_POST["email"]);
if ($result->num_rows > 0) {
    echo "A felhasználónév vagy email már létezik.";
    exit;
}

// Jelszó hash
//$hashed = password_hash($password, PASSWORD_DEFAULT);

echo "fasz";
exit(0);
// Mentés
//$result = $conn->prepare("INSERT INTO ".$table." (".")");
$stmt->bind_param("sss", $username, $email, $hashed);

if ($stmt->execute()) {
    echo "Sikeres regisztráció!";
} else {
    echo "Hiba történt!";
}
?>
