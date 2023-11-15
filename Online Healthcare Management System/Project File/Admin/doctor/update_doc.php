<?php
include_once '../include/connect.php';

$id=$_GET['updateid'];

$sql= "select * from doctor where id=$id ";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
        $name=$row['Name'];
        $deg=$row['deg'];
        $spcs=$row['specialities'];
        $cmbr=$row['chember'];
        $addrs=$row['address'];
        $phne=$row['phone'];
if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $deg= $_POST['deg'];
    $spcs= $_POST['spcs'];
    $chmbr= $_POST['Chmbr'];
    $adrs= $_POST['addrs'];
    $phn= $_POST['phn'];

    $sql="update doctor set id=$id, name='$name',deg='$deg',specialities='$spcs',chember='$chmbr',
    address='$adrs',phone='$phn' where id=$id";

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
            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo $name; ?>" required>
        </div>
        <div class="mb-3">
            <label>Degree</label>
            <input type="text" class="form-control" placeholder="Enter Degree" name="deg" value="<?php echo $deg; ?>" required>
        </div>
        <div class="mb-3">
            <label>Specialities</label>
            <select class="form-control" name="spcs" required>
                <?php
                $specialities = array("Heart", "Diabetes", "Influenza");
                foreach ($specialities as $speciality) {
                    echo '<option value="' . $speciality . '"';
                    if ($spcs === $speciality) {
                        echo ' selected="selected"';
                    }
                    echo '>' . $speciality . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Chamber</label>
            <input type="text" class="form-control" placeholder="Enter Chamber" name="Chmbr" value="<?php echo $cmbr; ?>" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Enter Address" name="addrs" value="<?php echo $addrs; ?>" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" class="form-control" placeholder="Enter Phone" name="phn" value="<?php echo $phne; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
    </div>
</body>
</html>
