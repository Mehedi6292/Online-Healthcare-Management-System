<?php
include_once '../include/connect.php';
if(isset($_POST['submit'])){
    $name= $_POST['Name'];
    $deg= $_POST['deg'];
    $spcs= $_POST['spcs'];
    $chmbr= $_POST['Chmbr'];
    $adrs= $_POST['addrs'];
    $phn= $_POST['phn'];

    $sql="insert into doctor (Name,deg,specialities,chember,address,phone)
    values('$name','$deg','$spcs','$chmbr','$adrs','$phn')";

    $result=mysqli_query($con,$sql);
    if($result){
        header('location:display_doc.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body>
    <div class="container my-5">
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="Name" pattern="[A-Za-z. ]+" required>
        </div>
        <div class="mb-3">
            <label>Degree</label>
            <input type="text" class="form-control" placeholder="Enter Degree" name="deg" pattern="[A-Za-z .()]+" required>
        </div>
        <div class="mb-3">
            <label>Specialities</label>
            <select class="form-control" name="spcs" required>
                <option value="" disabled selected>Select Speciality</option>
                <option value="Heart">Heart</option>
                <option value="Diabetes">Diabetes</option>
                <option value="Influenza">Influenza</option>
                
            </select>
        </div>
        <div class="mb-3">
            <label>Chamber</label>
            <input type="text" class="form-control" placeholder="Enter Chamber" name="Chmbr" pattern="[A-Za-z.,- ]+" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Enter Address" name="addrs" pattern="[A-Za-z0-9.,/ ]+" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" class="form-control" placeholder="Enter Phone" name="phn" pattern="[0-9+]+" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
</body>
</html>
