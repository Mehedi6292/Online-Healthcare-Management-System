<?php
    session_start();

    include ("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $firstname = $_POST['F_name'];
        $lastname = $_POST['L_name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['passs'];

        if(!empty($email) && !empty($pass) && !empty($cpass) && !is_numeric($email))

        {
            $query = "insert into reg (F_name,L_name,email,pass) values ('$firstname','$lastname','$email','$pass')";

            mysqli_query($con, $query);

            echo"<script type= 'text/javascript'> alert('Successfully Register')</script>";  
        }
        else
        {
            echo"<script type= 'text/javascript'> alert('Please enter some valid information')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="Signup">
        <h1>Signup</h1>
        <form method="POST">
            <label>First Name</label>
            <input type="text" name="F_name" required>
            <label>Last Name</label>
            <input type="text" name="L_name" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <label>Confirm Password</label>
            <input type="password" name="passs" required>
            <input type="submit" name="" value="Register">
        </form>
        <p>By clicking the signup button you agree to our <br>
        <a href="">Term and condition</a> and <a href="#">Policy Privacy</a>
        </p>
        <p>Already Have an account? <a href="login.php">Login Here</a></p>
    </div>
</body>
</html>
