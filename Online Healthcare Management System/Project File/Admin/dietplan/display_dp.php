<?php
include_once '../include/connect.php';


if (isset($_POST['search'])) {
  $search = $_POST['search'];
  $sql = "SELECT * FROM dietplans WHERE Disease LIKE '%$search%' OR PlanName LIKE '%$search%'";
} else {
  $sql = "SELECT * from dietplans order by DietPlanID desc";
}

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DietPlan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5">
        <button class="btn btn-primary"><a href="user_dp.php" class="text-light">Add DietPlan</a></button>
        <form class="form-inline" method="post"> 
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search"> 
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button> 
                </div>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">DietPlanID</th>
                <th scope="col">Disease</th>
                <th scope="col">PlanName</th>
                <th scope="col">Description</th>
                <th scope="col">CarbohydrateLimit</th>
                <th scope="col">ProteinLimit</th>
                <th scope="col">FatLimit</th>
                <th scope="col">FiberLimit</th>
                <th scope="col">CalorieLimit</th>
                <th scope="col">SuitableFor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $DietPlanID = $row['DietPlanID'];
                    $Disease = $row['Disease'];
                    $PlanName = $row['PlanName'];
                    $Description = $row['Description'];
                    $CarbohydrateLimit = $row['CarbohydrateLimit'];
                    $ProteinLimit = $row['ProteinLimit'];
                    $FatLimit = $row['FatLimit'];
                    $FiberLimit = $row['FiberLimit'];
                    $CalorieLimit = $row['CalorieLimit'];
                    $SuitableFor = $row['SuitableFor'];
                    echo  '<tr>
                        <th scope="row">' . $DietPlanID . '</th>
                        <td>' . $Disease . '</td>
                        <td>' . $PlanName . '</td>
                        <td>' . $Description . '</td>
                        <td>' . $CarbohydrateLimit . '</td>
                        <td>' . $ProteinLimit . '</td>
                        <td>' . $FatLimit . '</td>
                        <td>' . $FiberLimit . '</td>
                        <td>' . $CalorieLimit . '</td>
                        <td>' . $SuitableFor . '</td>
                        <td>
                            <button class="btn btn-primary my-2"><a href="update_dp.php?updateID=' . $DietPlanID . '" class="text-light">Update</a></button>
                            <button class="btn btn-danger my-2 delete-button" data-deleteid="' . $DietPlanID . '">Delete</button>
                        </td>
                    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script>
  const deleteButtons = document.querySelectorAll('.delete-button');
  deleteButtons.forEach(button => {
    button.addEventListener('click', function(event) {
      const deleteId = event.target.getAttribute('data-deleteid');
      const confirmed = confirm("Are you sure you want to delete this data?");
      if (confirmed) {
        
        window.location.href = `delete_dp.php?deleteID=${deleteId}`;
      }
    });
  });
</script>

</body>
</html>
