<?php
include_once '../include/connect.php';
if (isset($_POST['submit'])) {
    
    $ToolName = $_POST['ToolName'];
    $Description = $_POST['Description'];
    $Disease = $_POST['Disease'];
    
    $sql = "INSERT INTO tools (ToolName,Description,Disease)
            VALUES ('$ToolName','$Description','$Disease')";

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
                <input type="text" class="form-control" placeholder="Enter tool name" name="ToolName" pattern="[A-Za-z ]+" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter description" name="Description" pattern="[A-Za-z ]+" autocomplete="off" required>
            </div>
             <label>Disease</label>
            <select class="form-control" name="Disease">
                <option value="" disabled selected>Select Disease Name</option>
                <option value="Blood pressure">Blood pressure</option>
                <option value="Diabetes">Diabetes</option>
                <option value="Influenza">Influenza</option>
                <option value="Allergy">Allergy</option>
            </select>

            <!-- <div class="form-group">
                <label>Disease</label>
                <input type="text" class="form-control" placeholder="Enter disease name" name="Disease" autocomplete="off">
            </div> -->
            
            
            <button type="submit" class="btn btn-primary my-4" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>