<?php
include("connection.php");
include("sessions.php");

$stock_in_id=$_GET['stock_in_id'];

// Select Data
$select=$con->query("SELECT * FROM `stock_in` WHERE `stock_in_id`='$stock_in_id'");
$row=mysqli_fetch_assoc($select);

// Update Data
if(isset($_POST['edit_stock_in'])){
    $product_id=mysqli_escape_string($con,$_POST['product_id']);
    $date=mysqli_escape_string($con,$_POST['date']);
    $quantity=mysqli_escape_string($con,$_POST['quantity']);
    $unit_price=mysqli_escape_string($con,$_POST['unit_price']);
    $total_price=mysqli_escape_string($con,$_POST['total_price']);

    $update=$con->query("UPDATE `stock_in` SET `product_id`='$product_id', `date`='$date', `quantity`='$quantity', `unit_price`='$unit_price', `total_price`='$total_price' WHERE `stock_in_id`='$stock_in_id'");

    if($update){
        header("Location: stock_in.php");
    }

    else{
        echo
        "
            <script>
                alert('Failed to update stock in...');
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
    <title>Saint Anne - Edit Stock In</title>
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
                <h1>Edit Stock In</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
            <form action="" method="post">
                    <label>Product:</label>
                    <select name="product_id">
                        <option  value="<?php echo $row['product_id'];?>">Select your product...</option>
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
                    <input type="text" name="date" value="<?php echo $row['date'];?>" required>
                    <label>Quantity</label>
                    <input type="text" name="quantity" value="<?php echo $row['quantity'];?>" required>
                    <label>Unit Price</label>
                    <input type="text" name="unit_price" value="<?php echo $row['unit_price'];?>" required>
                    <label>Total Price</label>
                    <input type="text" name="total_price" value="<?php echo $row['total_price'];?>" required>
                    <button type="submit" name="edit_stock_in">Edit Stock In...</button>
                </form>
            </div>

        </div>

    </div>
</body>
</html>