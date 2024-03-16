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
        // Check if quantity is available in stock_in table
        $select_quantity = $con->query("SELECT quantity FROM stock_in WHERE product_id='$product_id'");
        if(mysqli_num_rows($select_quantity) > 0){
            $row = mysqli_fetch_assoc($select_quantity);
            $available_quantity = $row['quantity'];
            if($quantity > $available_quantity){
                echo
                "
                    <script>
                        alert('Insufficient quantity in stock...');
                    </script>
                ";
            }
            else{
                // Update quantity in stock_in table
                $new_quantity = $available_quantity - $quantity;
                $update_stock_in = $con->query("UPDATE stock_in SET quantity='$new_quantity' WHERE product_id='$product_id'");
                
                // Add stock_out entry
                $insert=$con->query("INSERT INTO `stock_out` VALUES('','$product_id','$date','$quantity')");
                if($insert && $update_stock_in){
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
        else{
            echo
            "
                <script>
                    alert('Product not found in stock...');
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
