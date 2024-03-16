<div class="dashboard-left">

<div class="head">
    <img src="./imgs/icon.ico" alt="">
    <h1><a href="./dashboard.php">Saint Anne School</a></h1>
    <div class="line"></div>
</div>

<div class="links">
    <a href="./dashboard.php"><img src="./imgs/dashboard.ico" alt=""> Dashboard</a>
    <a href="./users.php"><img src="./imgs/users.ico" alt=""> Users</a>
    <a href="./products.php"><img src="./imgs/products.ico" alt=""> Products</a>
    <a href="./stock_in.php"><img src="./imgs/stockin.ico" alt=""> Stock In</a>
    <a href="./stock_out.php"><img src="./imgs/stockout.ico" alt=""> Stock Out</a>
    <a href="./report.php"><img src="./imgs/report.ico" alt=""> Report</a>
    <a href="./account_settings.php"><img src="./imgs/settings.ico" alt=""> Account Settings</a>
</div>

<div class="end">
    <p>Hi, <?php echo $_SESSION['school_user'];?></p>
    <a href="./logout.php">Logout</a>
</div>

</div>