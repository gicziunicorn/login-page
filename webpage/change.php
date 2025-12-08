<?php
require 'db.php';
// check if the connection was successfull (whether $conn exists);
if (!isset($conn)) {
    echo "Failed to connect to the database :(";
    exit;
}

echo $_POST["change"];

$cmd = $conn->prepare("UPDATE `{$table}` SET uname = ? WHERE email = ?;");
$cmd->bind_param("ss", $_POST["change"], $_SESSION["email"]);
$cmd->execute();

$_SESSION["uname"] = $_POST["change"];
echo "<br>Sikeresen megváltoztatva!";
header("Location: adatok.php")

?>