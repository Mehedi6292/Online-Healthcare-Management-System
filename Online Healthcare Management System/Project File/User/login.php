<?php

use LDAP\Result;

    session_start();

    include ("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(!empty($email) && !empty($pass) && !is_numeric($email))
        {
            $query ="select * from reg where email = '$email' limit 1 ";
            $result = mysqli_query($con,$query);

            if($result)
            {
               if($result && mysqli_num_rows($result) > 0)
               {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['pass'] == $pass )
                {
                    header("Location: Select.php");
                    die;

                }
               }
            }
            echo"<script type= 'text/javascript'> alert('Wrong username or Password')</script>";
        }
        else{
            echo"<script type= 'text/javascript'> alert('Wrong username or Password')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Login">
        </form>
        <p>Not Have an Account? <a href="Signup.php">Sign Up Here</a></p>
</body>
</html>