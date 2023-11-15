<?php
include_once '../include/connect.php';

$ID = $_GET['updateID'];
$sql = "SELECT *from medicines WHERE ID=$ID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$Disease = $row['Disease'];
$MedicineName = $row['MedicineName'];
$CompanyName = $row['CompanyName'];
$Dosage = $row['Dosage'];
$Description = $row['Description'];

if (isset($_POST['submit'])) {
    $Disease = $_POST['Disease'];
    $MedicineName = $_POST['MedicineName'];
    $CompanyName = $_POST['CompanyName'];
    $Dosage = $_POST['Dosage'];
    $Description = $_POST['Description'];

    $sql = "UPDATE  medicines SET Disease='$Disease', MedicineName='$MedicineName',  CompanyName='$CompanyName', Dosage='$Dosage', Description='$Description' WHERE ID = $ID";

    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data inserted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
<title>Information</title>
   
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
                <input type="text" class="form-control" placeholder="Enter disease name" name="Disease" autocomplete="off" value=<?php
                echo $Disease;?>>
            </div>
            <div class="form-group">
                <label>MedicineName</label>
                <input type="text" class="form-control" placeholder="Enter medicine" name="MedicineName" autocomplete="off" value=<?php
                echo $MedicineName;?>>
            </div>
            <div class="form-group">
                <label>CompanyName</label>
                <input type="text" class="form-control" placeholder="Enter company name" name="CompanyName" autocomplete="off" value=<?php
                echo $CompanyName;?>>
            </div>
            <div class="form-group">
                <label>Dosage</label>
                <input type="text" class="form-control" placeholder="Enter dosage amount" name="Dosage" autocomplete="off" value=<?php
                echo $Dosage;?>>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter description" name="Description" autocomplete="off" value=<?php
                echo $Description;?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>