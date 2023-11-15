<?php
include_once '../include/db.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from reg where id=$id";
    $result=mysqli_query($con,$sql);

    if($result){
        header('location:display_user.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>