<?php
include("connection.php");
include("sessions.php");

$user_id=$_GET['user_id'];

// Select Data
$select=$con->query("SELECT * FROM `users` WHERE `user_id`='$user_id'");
$row=mysqli_fetch_assoc($select);

// Update Data
if(isset($_POST['edit_user'])){
    $username=mysqli_escape_string($con,$_POST['username']);
    $password=mysqli_escape_string($con,$_POST['password']);
    $tel=mysqli_escape_string($con,$_POST['tel']);

    $update=$con->query("UPDATE `users` SET `username`='$username', `password`='$password', `tel`='$tel' WHERE `user_id`='$user_id'");

    if($update){
        header("Location: users.php");
    }

    else{
        echo
        "
            <script>
                alert('Failed to update user...');
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
    <title>Saint Anne - Edit Users</title>
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
                <h1>Edit Users</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Username:</label>
                    <input type="text" name="username" value="<?php echo $row['username'];?>" required>
                    <label>Password:</label>
                    <input type="text" name="password" value="<?php echo $row['password'];?>" required>
                    <label>Tel:</label>
                    <input type="text" name="tel" value="<?php echo $row['tel'];?>" required>
                    <button type="submit" name="edit_user">Edit User...</button>
                </form>
            </div>

        </div>

    </div>
</body>
</html>