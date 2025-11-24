<?php
session_start();

if (isset($_SESSION["userid"])) {
    header("Location: adatok.php");
} else {
    header("Location: login.php");
}



?>