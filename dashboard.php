<?php
include("connection.php");
include("sessions.php");
include("calculation.php");
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
        <?php
            include("sidebar.php");
        ?>

        <div class="dashboard-right">

            <div class="dashboard-right-title">
                <h1>Dashboard</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <div class="card-container">

                    <div class="card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Users Accounts:</h4>
                        <a href="./users.php"><?php echo $total_users;?></a>
                    </div>

                    <div class="card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Products:</h4>
                        <a href="./products.php"><?php echo $total_products;?></a>
                    </div>

                    <div class="card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Stock In Products:</h4>
                        <a href="./stock_in.php"><?php echo $total_stock_in_products;?></a>
                    </div>

                    <div class="card">
                        <img src="./imgs/icon.ico">
                        <h4>Total Stock Out Products:</h4>
                        <a href="./stock_out.php"><?php echo $total_stock_out_products;?></a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</body>
</html>