<?php
include_once '../include/connect.php';

if (isset($_POST['submit'])) {

    $Disease = $_POST['Disease'];
    $Nursingsteps = $_POST['Nursingsteps'];

    $sql = "INSERT INTO nursing (Disease,Nursingsteps)
            VALUES ('$Disease','$Nursingsteps')";

  $result = mysqli_query($con, $sql);

if ($result) {
    //echo "Data inserted successfully";
    header('location:display_n.php');
} 
else {
    die(mysqli_error($con));
}
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Nursing Information</title>
   
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
                <input type="text" class="form-control" placeholder="Enter disease name" name="Disease" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Nursingsteps</label>
                <input type="text" class="form-control" placeholder="Enter nursingsteps" name="Nursingsteps" autocomplete="off" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
