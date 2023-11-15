<?php
include_once '../include/connect.php';


if(isset($_GET['deleteID'])){
    $DietPlanID=$_GET['deleteID'];

    $sql="DELETE from dietplans where DietPlanID=$DietPlanID";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data deleted successfully";
        header('location:display_dp.php');
    } else {
        die(mysqli_error($con));
    }
}


?>