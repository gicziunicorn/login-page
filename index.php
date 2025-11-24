<?php
session_start();

if (isset($_SESSION["userid"])) {
    header("Location: adatok.php");
} else {
    $_SESSION["msg"] = "";
    header("Location: loginpage.php");
}
