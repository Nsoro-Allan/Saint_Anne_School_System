<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Anne - Report</title>
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
                <h1>View Report</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
            <div class="buttons">
                <a href="#" onclick="print()">Print...</a>
            </div>
            <!-- <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `products`");
                    if(mysqli_num_rows($select) > 0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>
                    <tr>
                        <td><?php echo $row['product_name'];?></td>
                        <td>
                            <a href="edit_product.php?product_id=<?php echo $row['product_id'];?>">Edit</a>
                            <a href="delete_product.php?product_id=<?php echo $row['product_id'];?>"">Delete</a>
                        </td>
                    </tr>
                    <?php        
                        }
                    }
                    else{
                        echo"<h1 class='notification'>No Products Available...</h1>";
                    }
                    ?>
                </table>
            </div> -->

            <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Stock In Date</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT si.date, p.product_name, si.quantity, si.unit_price, si.total_price 
                                         FROM stock_in si
                                         JOIN products p ON si.product_id = p.product_id");
                    if(mysqli_num_rows($select) > 0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>
                    <tr>
                        <td><?php echo $row['product_name'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['unit_price'];?></td>
                        <td><?php echo $row['total_price'];?></td>
                    </tr>
                    <?php        
                        }
                    }
                    else{
                        echo"<h1 class='notification'>No Products Available...</h1>";
                    }
                    ?>
                </table>

        </div>

    </div>
</body>
</html>