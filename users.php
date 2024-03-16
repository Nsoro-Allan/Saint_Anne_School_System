<?php
include("connection.php");
include("sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Anne - Users</title>
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
                <h1>User Accounts</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <div class="buttons">
                    <a href="#" onclick="print()">Print...</a>
                </div>
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Tel</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `users`");
                    if(mysqli_num_rows($select) > 0){
                        while($row=mysqli_fetch_assoc($select)){
                    ?>
                    <tr>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['password'];?></td>
                        <td><?php echo $row['tel'];?></td>
                        <td>
                            <a href="edit_users.php?user_id=<?php echo $row['user_id'];?>">Edit</a>
                            <a href="delete_users.php?user_id=<?php echo $row['user_id'];?>"">Delete</a>
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