<?php
include_once '../include/connect.php';


if (isset($_POST['submit'])) {
    $Disease = $_POST['Disease'];
    $PlanName = $_POST['PlanName'];
    $Description = $_POST['Description'];
    $CarbohydrateLimit = $_POST['CarbohydrateLimit'];
    $ProteinLimit = $_POST['ProteinLimit'];
    $FatLimit = $_POST['FatLimit'];
    $FiberLimit = $_POST['FiberLimit'];
    $CalorieLimit = $_POST['CalorieLimit'];
    $SuitableFor = $_POST['SuitableFor'];

    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    
    $sql = "INSERT INTO dietplans (Disease, PlanName, Description, CarbohydrateLimit, ProteinLimit, FatLimit, FiberLimit, CalorieLimit, SuitableFor)
        VALUES ('$Disease', '$PlanName', '$Description', '$CarbohydrateLimit', '$ProteinLimit', '$FatLimit', '$FiberLimit', '$CalorieLimit', '$SuitableFor')";


   
    $result = mysqli_query($con, $sql);

    if ($result) {
        
        header('location: display_dp.php');
    } else {
        die("Error: " . mysqli_error($con)); 
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
                <input type="text" class="form-control" placeholder="Enter disease name" name="Disease" pattern="[A-Za-z ]+" autocomplete="off">
            </div>
            <div class="form-group">
                <label>PlanName</label>
                <input type="text" class="form-control" placeholder="Enter plans" name="PlanName" pattern="[A-Za-z- ]+" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter description" name="Description" autocomplete="off">
            </div>
            <div class="form-group">
                <label>CarbohydrateLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="CarbohydrateLimit"pattern="[0-9]+" autocomplete="off">
            </div>
            <div class="form-group">
                <label>ProteinLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="ProteinLimit" pattern="[0-9]+"autocomplete="off">
            </div>
            <div class="form-group">
                <label>FatLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="FatLimit" pattern="[0-9]+"autocomplete="off">
            </div>
            <div class="form-group">
                <label>FiberLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="FiberLimit" pattern="[0-9]+"autocomplete="off">
            </div>
            <div class="form-group">
                <label>CalorieLimit</label>
                <input type="text" class="form-control" placeholder="Enter limit" name="CalorieLimit" pattern="[0-9]+" autocomplete="off">
            </div>
            <div class="form-group">
                <label>SuitableFor</label>
                <input type="text" class="form-control" placeholder="Enter description" name="SuitableFor" pattern="[A-Za-z ]+" autocomplete="off">
            </div>
            
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>