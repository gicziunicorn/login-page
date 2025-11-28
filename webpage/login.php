<?php
session_start();
require 'db.php';
if (!isset($conn)) {
    echo "Failed to connect to the database :(";
    exit;
}

echo $_SERVER["REQUEST_METHOD"];
$cred = $_POST["email"];
echo $_POST["passwd"];
if (str_contains($cred, "@")) {
    $email = $cred;

    $password = $_POST["passwd"];
    // Lekérdezés
    $cmd = $conn->prepare("SELECT id, uname, jelszo, szuldatum, telefon, nem FROM `{$table}` WHERE email = ?;");
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
        $uname = $data["uname"];
        $hash = $data["jelszo"];
        $bdate = $data["szuldatum"];
        $tel = $data["telefon"];
        $nem = $data["nem"];
    }
} else {
    $uname = $cred;

    $password = $_POST["passwd"];
    // Lekérdezés
    $cmd = $conn->prepare("SELECT id, email, jelszo, szuldatum, telefon, nem FROM `{$table}` WHERE uname = ?;");
    $cmd->bind_param("s", $uname);
    $cmd->execute();
    $result = $cmd->get_result();
    // Megnézzük hogy van-e olyan sor amiben szerepel a megadott email
    if ($result->num_rows === 0) {
        $_SESSION["msg"] = 'nouname';
        header("Location: loginpage.php");
        exit;
    } else {
        $data = $result->fetch_assoc();
        $id = $data["id"];
        $email = $data["email"];
        $hash = $data["jelszo"];
        $bdate = $data["szuldatum"];
        $tel = $data["telefon"];
        $nem = $data["nem"];
    }
}


// Jelszó ellenőrzés
if (password_verify($password, $hash)) {
    $_SESSION["userid"] = $id;
    $_SESSION["uname"] = $uname;
    $_SESSION["email"] = $email;
    $_SESSION["date"] = $bdate;
    $_SESSION["tel"] = $tel;
    $_SESSION["nem"] = $nem;
    $_SESSION["msg"] = 'login';
    header("Location: index.php");
} else {
    $_SESSION["msg"] = 'nopasswd';
    header("Location: loginpage.php");
}
