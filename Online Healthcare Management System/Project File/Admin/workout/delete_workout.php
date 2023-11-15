<?php
session_start();
?>
<?php
include_once '../include/connect.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $userprofile = $_SESSION['email'];

    if ($userprofile == true) {
    } else {
        header("Location: login.php");
    }

    $sql="delete from workout where id=$id";
    $result=mysqli_query($con,$sql);

    if($result){
        header('location:display_workout.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>