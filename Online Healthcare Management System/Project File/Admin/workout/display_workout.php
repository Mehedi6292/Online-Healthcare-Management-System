<?php
include_once '../include/connect.php';

$searchTerm = "";
if (isset($_GET['search'])) {
  $searchTerm = $_GET['searchTerm'];
  $sql = "SELECT * FROM workout WHERE 
            Name LIKE '%" . $searchTerm . "%' OR 
            exercise LIKE '%" . $searchTerm . "%' 
            ORDER BY id DESC";
  $result = mysqli_query($con, $sql);
} else {
  $sql = "SELECT * FROM workout ORDER BY id DESC";
  $result = mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <button class="btn btn-primary my-5">
                <a href="insert_workout.php" class="text-light"> Add Workout</a>
            </button>
        </div>
        <div class="col-md-3">
            <form method="GET">
                <div class="input-group my-5">
                    <input type="text" class="form-control" placeholder="Search" name="searchTerm">
                    <div class="input-group-append">
                        <button class="btn btn-primary " type="submit" name="search">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Workout</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['Name'];
                    $exrs = nl2br($row['exercise']);
                    echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $exrs . '</td>
                        <td>
                            <button class="btn btn-primary my-2">
                                <a href="update_workout.php?updateid=' . $id . '" class="text-light">Update Workout</a>
                            </button>
                            <button class="btn btn-danger">
                                <a href="#" class="text-light" onclick="confirmDelete(' . $id . ')">Delete Workout</a>
                            </button>
                        </td>
                    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script>
function confirmDelete(workoutId) {
  if (confirm("Are you sure you want to delete this workout?")) {
    // If the user clicks "OK" in the confirmation dialog, proceed with the delete operation
    window.location.href = "delete_workout.php?deleteid=" + workoutId;
  } else {
    // If the user clicks "Cancel" in the confirmation dialog, do nothing
  }
}
</script>
</body>
</html>
