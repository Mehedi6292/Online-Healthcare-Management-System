<?php
include_once '../include/connect.php';

if (isset($_POST['submit'])) {
    $Disease = $_POST['Disease'];
    $MedicineName = $_POST['MedicineName'];
    $CompanyName = $_POST['CompanyName'];
    $Dosage = $_POST['Dosage'];
    $Description = $_POST['Description'];

    $sql = "INSERT INTO medicines (Disease, MedicineName, CompanyName, Dosage, Description)
            VALUES ('$Disease', '$MedicineName', '$CompanyName', '$Dosage', '$Description')";

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
    <link rel="stylesheet" href="index.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Medicines</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Disease</label>
                <input type="text" class="form-control" placeholder="Enter disease name" name="Disease" pattern="[A-Za-z ]+" autocomplete="off">
            </div>
            <div class="form-group">
                <label>MedicineName</label>
                <input type="text" class="form-control" placeholder="Enter medicine" name="MedicineName" autocomplete="off">
            </div>
            <div class="form-group">
                <label>CompanyName</label>
                <input type="text" class="form-control" placeholder="Enter company name" name="CompanyName" pattern="[A-Za-z- ]+" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Dosage</label>
                <input type="text" class="form-control" placeholder="Enter dosage amount" name="Dosage" pattern="[0-9]+"autocomplete="off">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter description" name="Description" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>