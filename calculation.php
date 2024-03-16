<?php

// Total Users
$query=$con->query("SELECT COUNT(*) AS total_users FROM `users`");
$row=mysqli_fetch_assoc($query);
$total_users=$row['total_users'];

// Total Products
$query=$con->query("SELECT COUNT(*) AS total_products FROM `products`");
$row=mysqli_fetch_assoc($query);
$total_products=$row['total_products'];

// Total Stock In Products
$query=$con->query("SELECT COUNT(*) AS total_stock_in_products FROM `stock_in`");
$row=mysqli_fetch_assoc($query);
$total_stock_in_products=$row['total_stock_in_products'];

// Total Stock Out Products
$query=$con->query("SELECT COUNT(*) AS total_stock_out_products FROM `stock_out`");
$row=mysqli_fetch_assoc($query);
$total_stock_out_products=$row['total_stock_out_products'];

?>