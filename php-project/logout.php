<?php
session_start();

if(!isset($_SESSION["auth"])){
    header("location:login.php");
    die;
}

include "core/functions.php";

session_destroy();
redirect("login.php");

?>