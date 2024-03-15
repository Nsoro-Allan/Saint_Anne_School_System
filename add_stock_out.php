<?php
include("connection.php");
include("sessions.php");

if(isset($_POST['add_stock_out'])){
    $product_id=mysqli_real_escape_string($con,$_POST['product_id']);
    $date=mysqli_real_escape_string($con,$_POST['date']);
    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);

    if($product_id == "Select your product..."){
        echo
        "
            <script>
                alert('Please Select a product...');
            </script>
        ";
    }

    else{

    $insert=$con->query("INSERT INTO `stock_out` VALUES('','$product_id','$date','$quantity')");

    if($insert){
        header("Location: stock_out.php");
    }
    else{
        echo
        "
            <script>
                alert('Failed to add stock out...');
            </script>
        ";
    }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Anne - Add Stock Out</title>
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
                <h1>Add Stock Out</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Product:</label>
                    <select name="product_id">
                        <option value="Select your product...">Select your product...</option>
                        <?php
                        $select=$con->query("SELECT * FROM `products`");
                        while($get=mysqli_fetch_assoc($select)){
                        ?>
                        <option value="<?php echo $get['product_id'];?>"><?php echo $get['product_name'];?></option>
                        <?php    
                        }
                        ?>
                    </select>
                    <label>Date</label>
                    <input type="date" name="date" required>
                    <label>Quantity</label>
                    <input type="text" name="quantity" placeholder="Enter your Quantity..." required>
                    <button type="submit" name="add_stock_out">Add Stock Out...</button>
                </form>
            </div>

        </div>

    </div>
</body>
</html>