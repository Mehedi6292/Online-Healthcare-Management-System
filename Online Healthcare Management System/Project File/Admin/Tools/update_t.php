<?php
include_once '../include/connect.php';

$ToolID = $_GET['updateID'];
$sql = "SELECT *from tools WHERE ToolID=$ToolID";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


$ToolName = $row['ToolName'];
$Description = $row['Description'];
$Disease = $row['Disease'];

if (isset($_POST['submit'])) {

    
    $ToolName = $_POST['ToolName'];
    $Description = $_POST['Description'];
    $Disease = $_POST['Disease'];


    $sql = "UPDATE  tools SET ToolName='$ToolName',Disease='$Disease',Description='$Description' WHERE ToolID = $ToolID";

    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data inserted successfully";
        header('location:display_t.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Tools Information</title>
    <link rel="stylesheet" href="index.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Tools</title>
</head>

<body>
<div class="container my-5">
        <form method="post">
           
            <div class="form-group">
                <label>ToolName</label>
                <input type="text" class="form-control" placeholder="Enter tool name" name="ToolName" autocomplete="off"value=<?php
                echo $Disease;?>>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter description" name="Description" autocomplete="off"value=<?php
                echo $Disease;?>>
            </div>
            <div class="form-group">
                <label>Disease</label>
                <input type="text" class="form-control" placeholder="Enter disease name" name="Disease" autocomplete="off">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>