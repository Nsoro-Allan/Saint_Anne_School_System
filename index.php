<?php
session_start();
include("connection.php");

if(!isset($_SESSION['school_user'])){
    header("Location: ./login.php");
}

else{
    header("Location: ./dashboard.php");
}
?>