<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Anne - Stock Out</title>
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
                <h1>Stock Out</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <div class="buttons">
                    <a href="./add_product.php">Add a Stock Out...</a>
                    <a href="#" onclick="print()">Print...</a>
                </div>
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `stock_out`");
                    if(mysqli_num_rows($select) > 0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>
                    <tr>
                        <td><?php echo $row['product_id'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td>
                            <a href="edit_stock_in.php?product_id=<?php echo $row['stock_out_id'];?>">Edit</a>
                            <a href="delete_stock_in.php?product_id=<?php echo $row['stock_out_id'];?>"">Delete</a>
                        </td>
                    </tr>
                    <?php        
                        }
                    }
                    else{
                        echo"<h1 class='notification'>No Stock Out Available...</h1>";
                    }
                    ?>
                </table>
            </div>

        </div>

    </div>
</body>
</html>