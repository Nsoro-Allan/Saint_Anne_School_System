<?php
include("connection.php");
include("sessions.php");

if(isset($_POST['add_product'])){
    $product_name=mysqli_real_escape_string($con,$_POST['product_name']);

    $insert=$con->query("INSERT INTO `products` VALUES('','$product_name')");

    if($insert){
        header("Location: products.php");
    }
    else{
        echo
        "
            <script>
                alert('Failed to add product...');
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Anne - Add Products</title>
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
                <h1>Add Products</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Product Name:</label>
                    <input type="text" name="product_name" placeholder="Enter Your Product Name..." required>
                    <button type="submit" name="add_product">Add Product...</button>
                </form>
            </div>

        </div>

    </div>
</body>
</html>