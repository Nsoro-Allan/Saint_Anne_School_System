<?php
session_start();
include("connection.php");
unset($_SESSION['school_user']);
session_destroy();

header("Location:index.php");

?>