<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Anne - Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-left">

            <div class="head">
                <img src="./imgs/icon.ico" alt="">
                <h1>Saint Anne School</h1>
            </div>

            <div class="links">
                <a href="./dashboard.php">Dashboard</a>
                <a href="./products.php">Products</a>
                <a href="./stock_in.php">Stock In</a>
                <a href="./stock_out.php">Stock Out</a>
                <a href="./report.php">Report</a>
                <a href="./account_settings">Account Settings</a>
            </div>

            <div class="end">
                <p>Admin</p>
                <a href="./logout.php">Logout</a>
            </div>

        </div>

        <div class="dashboard-right">

            <div class="dashboard-right-title">
                <h1>Dashboard</h1>
                <div class="line"></div>
            </div>

        </div>
        
    </div>
</body>
</html>