<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();}
unset($_SESSION["isLogedIn"]);
unset($_SESSION["userid"]);
$_SESSION["loginChk"]=0;
header("location:login.php");
?>