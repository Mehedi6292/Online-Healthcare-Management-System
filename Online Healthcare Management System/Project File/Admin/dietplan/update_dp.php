<?php
include_once '../include/connect.php';

$DietPlanID = $_GET['updateID'];
$sql = "SELECT *from dietplans WHERE DietPlanID=$DietPlanID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$Disease = $row['Disease'];
$PlanName = $row['PlanName'];
$Description = $row['Description'];
$CarbohydrateLimit = $row['CarbohydrateLimit'];
$ProteinLimit = $row['ProteinLimit'];
$FatLimit = $row['FatLimit'];
$FiberLimit = $row['FiberLimit'];
$CalorieLimit = $row['CalorieLimit'];
$SuitableFor = $row['SuitableFor'];

if (isset($_POST['submit'])) {

    $Disease = $_POST['Disease'];
    $PlanName = $_POST['PlanName'];
    $Description = $_POST['Description'];
    $CarbohydrateLimit = $_POST['CarbohydrateLimit'];
    $ProteinLimit = $_POST['ProteinLimit'];
    $FatLimit = $_POST['FatLimit'];
    $FiberLimit = $_POST['FiberLimit'];
    $CalorieLimit = $_POST['CalorieLimit'];


    
    $sql = "UPDATE dietplans SET Disease='$Disease', PlanName='$PlanName', Description='$Description', CarbohydrateLimit='$CarbohydrateLimit', ProteinLimit='$ProteinLimit', FatLimit='$FatLimit', FiberLimit='$FiberLimit', CalorieLimit='$CalorieLimit', SuitableFor='$SuitableFor' WHERE DietPlanID = $DietPlanID";


    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data inserted successfully";
        header('location:display_dp.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
<title>DietPlan Information</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="index.css">
    
    
</head>

<body>
<div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Disease</label>
                <input type="text" class="form-control" placeholder="Enter disease name" name="Disease" autocomplete="off"value=<?php
                echo $Disease;?>>
            </div>
            <div class="form-group">
                <label>PlanName</label>
                <input type="text" class="form-control" placeholder="Enter plans" name="PlanName" autocomplete="off"value=<?php
                echo $PlanName;?>>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter description" name="Description" autocomplete="off"value=<?php
                echo $Description;?>>
            </div>
            <div class="form-group">
                <label>CarbohydrateLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="CarbohydrateLimit" autocomplete="off"value=<?php
                echo $CarbohydrateLimit;?>>
            </div>
            <div class="form-group">
                <label>ProteinLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="ProteinLimit" autocomplete="off"value=<?php
                echo $ProteinLimit;?>>
            </div>
            <div class="form-group">
                <label>FatLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="FatLimit" autocomplete="off"value=<?php
                echo $FatLimit;?>>
            </div>
            <div class="form-group">
                <label>FiberLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="FiberLimit" autocomplete="off"value=<?php
                echo $FiberLimit;?>>
            </div>
            <div class="form-group">
                <label>CalorieLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="CalorieLimit" autocomplete="off"value=<?php
                echo $CalorieLimit;?>>
            </div>
            <div class="form-group">
                <label>SuitableFor</label>
                <input type="text" class="form-control" placeholder="Enter description" name="SuitableFor" autocomplete="off"value=<?php
                echo $SuitableFor;?>>
            </div>
            
            
            <button type="submit" class="btn btn-primary" name="submit">Upadate</button>
        </form>
    </div>
</body>

</html>