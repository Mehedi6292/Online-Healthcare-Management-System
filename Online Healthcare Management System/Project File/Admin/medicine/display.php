<?php
include_once '../include/connect.php';

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM medicines WHERE Disease LIKE '%$search%' OR MedicineName LIKE '%$search%' OR CompanyName LIKE '%$search%' OR Dosage LIKE '%$search%' OR Description LIKE '%$search%'";
} else {
    $sql = "SELECT * from medicines order by ID desc";
}

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicines</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5">
        <button class="btn btn-primary"><a href="user.php" class="text-light">Add Medicine</a></button>
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
            <th scope="col">ID</th>
            <th scope="col">Disease</th>
            <th scope="col">MedicineName</th>
            <th scope="col">CompanyName</th>
            <th scope="col">Dosage</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $ID = $row['ID'];
                $Disease = $row['Disease'];
                $MedicineName = $row['MedicineName'];
                $CompanyName = $row['CompanyName'];
                $Dosage = $row['Dosage'];
                $Description = $row['Description'];
                echo '<tr>
                <th scope="row">' . $ID . '</th>
                <td>' . $Disease . '</td>
                <td>' . $MedicineName . '</td>
                <td>' . $CompanyName . '</td>
                <td>' . $Dosage . '</td>
                <td>' . $Description . '</td>
                <td>
                <button class="btn btn-primary my-2"><a href="update.php?updateID=' . $ID . '" class="text-light">Update</a></button>
                <button class="btn btn-danger my-2 delete-button" data-deleteid="' . $ID . '">Delete</button>
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
        button.addEventListener('click', function (event) {
            const deleteId = event.target.getAttribute('data-deleteid');
            const confirmed = confirm("Are you sure you want to delete this data?");
            if (confirmed) {
              
                window.location.href = `delete.php?deleteID=${deleteId}`;
            }
        });
    });
</script>

</body>
</html>
