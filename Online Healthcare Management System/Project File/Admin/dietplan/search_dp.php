<?php
include_once '../include/connect.php';


if (isset($_POST['search'])) {
    $Disease = $_POST['Disease'];
    $PlanName = $_POST['PlanName'];
    $Description = $_POST['Description'];
    $CarbohydrateLimit = $_POST['CarbohydrateLimit'];
    $ProteinLimit = $_POST['ProteinLimit'];
    $FatLimit = $_POST['FatLimit'];
    $FiberLimit = $_POST['FiberLimit'];
    $CalorieLimit = $_POST['CalorieLimit'];
    $SuitableFor = $_POST['SuitableFor'];

    // Check if the connection is successful
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Define the SQL INSERT statement
    $sql = "INSERT INTO dietplans (Disease, PlanName, Description, CarbohydrateLimit, ProteinLimit, FatLimit, FiberLimit, CalorieLimit, SuitableFor)
        VALUES ('$Disease', '$PlanName', '$Description', '$CarbohydrateLimit', '$ProteinLimit', '$FatLimit', '$FiberLimit', '$CalorieLimit', '$SuitableFor')";


    // Execute the SQL query
    $items = mysqli_query($con, $sql);

    if ($items) {
        // Data inserted successfully
        header('location: display_dp.php');
    } else {
        die("Error: " . mysqli_error($con)); // Add error handling
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
        <div class="row">
            <div class="col-md-7">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                    echo $_GET['search'];
                                                                } ?>" class="form-control" placeholder="Search Data">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card mt-4">
                    <table class="table table borderred">
                        <thead>
                            <tr>
                                <th>DietPlanID</th>
                                <th>Disease</th>
                                <th>PlanName</th>
                                <th>Description</th>
                                <th>CarbohydrateLimit</th>
                                <th>ProteinLimit</th>
                                <th>FatLimit</th>
                                <th>FiberLimit</th>
                                <th>CalorieLimit</th>
                                <th>SuitableFor</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "register");

                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];
                                $query = "SELECT * FROM dietplans WHERE CONCAT(Disease,PlanName) LIKE '%$filtervalues%' ";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $items) {
                            ?>
                                        <tr>
                                            <td><?= $items['DietPlanID']; ?></td>
                                            <td><?= $items['Disease']; ?></td>
                                            <td><?= $items['PlanName']; ?></td>
                                            <td><?= $items['Description']; ?></td>
                                            <td><?= $items['CarbohydrateLimit']; ?></td>
                                            <td><?= $items['ProteinLimit']; ?></td>
                                            <td><?= $items['FatLimit']; ?></td>
                                            <td><?= $items['FiberLimit']; ?></td>
                                            <td><?= $items['CalorieLimit']; ?></td>
                                            <td><?= $items['SuitableFor']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10">No Record Found</td>

                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>