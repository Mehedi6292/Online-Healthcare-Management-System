

<?php
include_once '../include/connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];


    $sql = "delete from doctor where id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:display_doc.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

