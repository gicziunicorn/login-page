<?php
session_start();
require 'db.php';
if(!isset($conn)){  
    echo "Failed to connect to the database :(";
    exit;
}

$email = $_GET["email"];
$password = $_GET["passwd"];
// Lekérdezés
$cmd = $conn->prepare("SELECT `id`, `jelszo` FROM `{$table}` WHERE email = ?;");
$cmd->bind_param("s", $email);
$cmd->execute();
$result = $cmd->get_result();
// Megnézzük hogy van-e olyan sor amiben szerepel a megadott email
if ($result->num_rows === 0) {
    $_SESSION["msg"] = 'noemail';
    header("Location: loginpage.php");
    exit;
} else {
    $data = $result->fetch_assoc();
    $id = $data["id"];
    $hash = $data["jelszo"];
}


// Jelszó ellenőrzés
if (password_verify($password, $hash)) {
    $_SESSION["userid"] = $id;
    $_SESSION["email"] = $email;
    $_SESSION["msg"] = 'login';
    header("Location: index.php");
} else {
    $_SESSION["msg"] = 'nopasswd';
}

?>