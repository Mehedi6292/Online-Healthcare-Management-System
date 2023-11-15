<?php
include_once '../include/connect.php';

$ID = $_GET['updateID'];
$sql = "SELECT *from nursing WHERE ID=$ID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$Disease = $row['Disease'];
$Nursingsteps = $row['Nursingsteps'];


if (isset($_POST['submit'])) {

    $Disease = $_POST['Disease'];
    $Nursingsteps = $_POST['Nursingsteps'];
    


    $sql = "UPDATE  nursing SET Disease='$Disease',Nursingsteps=$Nursingsteps WHERE ID = $ID";

    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data inserted successfully";
        header('location:display_n.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Nursing Information</title>
    <link rel="stylesheet" href="index.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Nursing</title>
</head>

<body>
<div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Disease</label>
                <input type="text" class="form-control" placeholder="Enter disease name" name="Disease" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Nursingsteps</label>
                <input type="text" class="form-control" placeholder="Enter medicine" name="Nursingsteps" autocomplete="off"value=<?php
                echo $Nursingsteps;?>require>       
            </div>
            
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>