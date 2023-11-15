<?php
include_once '../include/connect.php';
session_start();
$id=$_GET['updateid'];

$userprofile = $_SESSION['email'];

    if ($userprofile == true) {
    } else {
        header("Location: login.php");
    }
$sql= "select * from workout where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
        $name=$row['Name'];
        $exrs=$row['exercise'];
   
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $exrs= $_POST['exercise'];
   

    $sql="update workout set id=$id, Name='$name',exercise='$exrs' where id=$id";

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
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Disease Name" name="name" value="<?php echo $name; ?>" required>
    </div>
    <div class="mb-3">
        <label for="exercise">Exercise</label>
        <input type="text" class="form-control" id="exercise" placeholder="Enter Workout" name="exercise" value="<?php echo $exrs; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>

    </div>
</body>
</html>