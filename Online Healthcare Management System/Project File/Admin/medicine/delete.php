<?php
include_once '../include/connect.php';

if(isset($_GET['deleteID'])){
    $ID=$_GET['deleteID'];

    $sql="DELETE from medicines where ID=$ID";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data deleted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}


?>