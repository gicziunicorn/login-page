<?php
session_start();
//echo '<body style="background-color:black;color:white;">';
require 'db.php';
// check if the connection was successfull (whether $conn exists);
if(!isset($conn)){  
    echo "Failed to connect to the database :(";
    exit;
}

// haladás tovább (változók)
$email = $_GET["email"];
$passwd = $_GET["passwd"];
$bdate = strtotime($_GET["bdate"]);
$bdate = date('Y-m-d', $bdate);
$tel = $_GET["tel"];
$gender = $_GET["gender"];

// Ellenőrizzük, hogy létezik-e már az email
$result = $conn->query("SELECT * FROM ".$table." WHERE email = '".$email."'");
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
$sql = "INSERT INTO {$table} (`id`, `email`, `jelszo`, `szuldatum`, `telefon`, `nem`) VALUES (NULL, '{$email}', '{$hashed}', '{$bdate}', '{$tel}', '{$gender}');";
//echo "Running '{$sql}'" . "<br>";
$result = $conn->query($sql);

//check if insert was successful
if ($result) {
    //echo "Sikeres regisztráció!";
    $_SESSION["msg"] = "regsuccess";//-successful registration
    header("Location: loginpage.php");
    exit;
} else {
    echo "Hiba történt!";
}

?>
