<?php
include_once '../include/connect.php';
session_start();
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $exrs= $_POST['exercise'];
    
    $userprofile = $_SESSION['email'];

    if ($userprofile == true) {
    } else {
        header("Location: login.php");
    }

    $sql="insert into workout (Name,exercise)
    values('$name','$exrs')";

    $result=mysqli_query($con,$sql);
    if($result){
        header('location:display_workout.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body>
    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <select class="form-control" name="name">
                <option value="" disabled selected>Select Disease Name</option>
                <option value="Heart">Heart</option>
                <option value="Diabetes">Diabetes</option>
                
            </select>
            <div class="mb-3">
                <label>Workout</label>
                <textarea class="form-control" rows="6" placeholder="Enter Workout" name="exercise"></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
