<?php
session_start();
//echo '<body style="background-color:black;color:white;">';
require 'db.php';
// check if the connection was successfull (whether $conn exists);
if (!isset($conn)) {
    echo "Failed to connect to the database :(";
    exit;
}

// haladás tovább (változók)
$uname = $_POST["uname"];
$email = $_POST["email"];
$passwd = $_POST["passwd"];
$bdate = strtotime($_POST["bdate"]);
$bdate = date('Y-m-d', $bdate);
$tel = $_POST["tel"];
$gender = $_POST["gender"];

// Ellenőrizzük, hogy létezik-e már az email
echo $email;
$cmd = $conn->prepare("SELECT * FROM {$table} WHERE email = ?;");
$cmd->bind_param("s", $email);
$cmd->execute();
$result = $cmd->get_result();
if ($result->num_rows > 0) {
    //echo "Felhasználó '". $email . "' már létezik. <br>";
    $_SESSION['msg'] = "already"; //-the user already exists
    header("Location: registrationpage.php");
    exit;
}
//echo "Felhasználó '". $email . "' még nem létezik. <br>";


// Jelszó hash
$hashed = password_hash($passwd, PASSWORD_DEFAULT);


// Mentés
$cmd = $conn->prepare("INSERT INTO {$table} (`id`, `uname`, `email`, `jelszo`, `szuldatum`, `telefon`, `nem`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
$cmd->bind_param("ssssss",$uname,$email,$hashed,$bdate,$tel,$gender);
$cmd->execute();
$result = $cmd->get_result();
//echo "Running '{$sql}'" . "<br>";


$_SESSION["msg"] = "regsuccess"; //-successful registration
header("Location: loginpage.php");
exit;


//check if insert was successful
if ($result) {
    //echo "Sikeres regisztráció!";
    $_SESSION["msg"] = "regsuccess"; //-successful registration
    header("Location: loginpage.php");
    exit;
} else {
    echo "Hiba történt!";
}
