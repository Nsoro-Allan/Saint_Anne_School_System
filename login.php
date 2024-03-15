<?php
session_start();
include("connection.php");

if(isset($_POST['login'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $select=$con->query("SELECT * FROM `users`");

    if(mysqli_num_rows($select) > 0){
        while($row=mysqli_fetch_assoc($select)){
            if($username == $row['username'] && $password == $row['password']){
                $_SESSION['school_user']=$username;
                header("Location: dashboard.php");
            }
            else if($username != $row['username'] && $password == $row['password']){
                echo
                "
                    <script>
                        alert('Invalid Username...');
                    </script>
                ";
            }
            else if($username == $row['username'] && $password != $row['password']){
                echo
                "
                    <script>
                        alert('Invalid Password...');
                    </script>
                ";
            }
            else{
                echo
                "
                    <script>
                        alert('Invalid Username and Password...');
                    </script>
                ";
            }
        }
    }
    else{
        echo
        "
            <script>
                alert('No Records Found in the database...');
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
    <title>Saint Anne - Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <img src="./imgs/1.jpg" alt="">
        </div>
        <div class="login-right">
            <form action="" method="post">
                <div class="title">
                    <h1>Saint Anne - Login</h1>
                    <div class="line"></div>
                </div>

                <label>Username:</label>
                <input type="text" name="username" placeholder="Enter Your Username..." required>

                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter Your Password..." required>

                <button type="submit" name="login">Login</button>

                <p>Don't Have An Account? <a href="./signup.php">SignUp.</a></p>
            </form>
        </div>
    </div>
</body>
</html>