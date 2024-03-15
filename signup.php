<?php
session_start();
include("connection.php");

    if(isset($_POST['signup'])){
        $username=mysqli_real_escape_string($con,$_POST['username']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $tel=mysqli_real_escape_string($con,$_POST['tel']);

        $insert=$con->query("INSERT INTO `users` (`username`,`password`,`tel`) VALUES ('$username','$password','$tel')");

        if($insert){
            header("location:index.php");
        }

        else{
            echo
            "
                <script>
                    alert('Failed to create account...');
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
    <title>Saint Anne - SignUp</title>
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
                    <h1>Saint Anne - SignUp</h1>
                    <div class="line"></div>
                </div>

                <label>Username:</label>
                <input type="text" name="username" placeholder="Enter Your Username..." required>

                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter Your Password..." required>

                <label>Tel:</label>
                <input type="tel" name="tel" placeholder="Enter Your Tel..." required>

                <button type="submit" name="signup">SignUp</button>

                <p>Already Have An Account? <a href="./login.php">SignIn.</a></p>
            </form>
        </div>
    </div>
</body>
</html>