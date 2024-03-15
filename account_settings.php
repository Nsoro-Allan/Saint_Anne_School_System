<?php
include("connection.php");
include("sessions.php");

$uname=$_SESSION['school_user'];

// Select Data
$select=$con->query("SELECT * FROM `users` WHERE `username`='$uname'");
$row=mysqli_fetch_assoc($select);

if(isset($_POST['update_account'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $update=$con->query("UPDATE `users` SET `username`='$username', `password`='$password' WHERE `username`='$uname'");

    if($update){
        $_SESSION['school_user']=$username;
        echo
        "
            <script>
                alert('You Have Updated your Account Successfully...');
            </script>
        ";
    }
    else{
        echo
        "
            <script>
                alert('Failed to update account...');
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
    <title>Saint Anne - Account Settings</title>
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
                <h1>Account Settings</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Current Username:</label>
                    <input type="text" name="username" value="<?php echo $row['username'];?>">
                    <label>Current Password:</label>
                    <input type="text" name="password" value="<?php echo $row['password'];?>">
                    <button type="submit" name="update_account">Update Account...</button>
                </form>
            </div>

        </div>

    </div>
</body>
</html>