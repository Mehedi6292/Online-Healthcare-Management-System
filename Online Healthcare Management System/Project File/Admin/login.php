<?php
session_start();
?>


<?php

use LDAP\Result;

    
    include('include/db.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(!empty($email) && !empty($pass) && !is_numeric($email))
        {
            $query ="select * from admin where email = '$email' limit 1 ";
            $result = mysqli_query($con,$query);

            if($result)
            {
               if($result && mysqli_num_rows($result) > 0)
               {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $pass )
                {
                    $_SESSION['email'] = $email;
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
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card mt-3 shadow">
                    <div class="card-header text-center bg-dark text-white">
                        <h4>Admin Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="username" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
