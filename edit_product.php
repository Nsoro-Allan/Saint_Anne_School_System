<?php
include("connection.php");
include("sessions.php");

$product_id=$_GET['product_id'];

// Select Data
$select=$con->query("SELECT * FROM `products` WHERE `product_id`='$product_id'");
$row=mysqli_fetch_assoc($select);

// Update Data
if(isset($_POST['edit_product'])){
    $product_name=mysqli_escape_string($con,$_POST['product_name']);

    $update=$con->query("UPDATE `products` SET `product_name`='$product_name' WHERE `product_id`='$product_id'");

    if($update){
        header("Location: products.php");
    }

    else{
        echo
        "
            <script>
                alert('Failed to update product...');
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
    <title>Saint Anne - Edit Product</title>
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
                <h1>Edit Product</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Product Name:</label>
                    <input type="text" name="product_name" value="<?php echo $row['product_name'];?>" required>
                    <button type="submit" name="edit_product">Edit Product...</button>
                </form>
            </div>

        </div>

    </div>
</body>
</html>