<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();}
unset($_SESSION["isLogedIn"]);
unset($_SESSION["userid"]);
unset($_SESSION["ID"]);
$_SESSION["loginChk"]=0;
header("location:login.php");
?>