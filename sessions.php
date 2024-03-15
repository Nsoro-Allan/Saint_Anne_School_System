<?php
session_start();
include("connection.php");

if(!isset($_SESSION['school_user'])){
    header("location:index.php?msg=Loggin First");
}
?>