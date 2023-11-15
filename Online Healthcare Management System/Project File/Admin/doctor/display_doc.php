<?php
include_once '../include/connect.php';

$searchTerm = "";
if (isset($_GET['search'])) {
  $searchTerm = $_GET['searchTerm'];
  $sql = "SELECT * FROM doctor WHERE 
            Name LIKE '%" . $searchTerm . "%' OR 
            specialities LIKE '%" . $searchTerm . "%' OR 
            phone LIKE '%" . $searchTerm . "%' 
            ORDER BY id DESC";
  $result = mysqli_query($con, $sql);
} else {
  $sql = "SELECT * FROM doctor ORDER BY id DESC";
  $result = mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <button class="btn btn-primary my-5">
          <a href="insert_doc.php" class="text-light"> Add Doctor</a>
        </button>
      </div>
      <div class="col-md-3">
        <form method="GET">
          <div class="input-group my-5">
            <input type="text" class="form-control" placeholder="Search" name="searchTerm">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
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
          <th scope="col">Degree</th>
          <th scope="col">Specialities</th>
          <th scope="col">Chamber</th>
          <th scope="col">Address</th>
          <th scope="col">Phone</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['Name'];
            $deg = $row['deg'];
            $spcs = $row['specialities'];
            $chmbr = $row['chember'];
            $adrs = $row['address'];
            $phn = $row['phone'];
            echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $deg . '</td>
                        <td>' . $spcs . '</td>
                        <td>' . $chmbr . '</td>
                        <td>' . $adrs . '</td>
                        <td>' . $phn . '</td>
                        <td>
                            <button class="btn btn-primary my-2">
                                <a href="update_doc.php?updateid=' . $id . '" class="text-light">Update Doctor</a>
                            </button>
                            <button class="btn btn-danger">
                                <a href="#" class="text-light" onclick="confirmDelete(' . $id . ')">Delete Doctor</a>
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
    function confirmDelete(doctorId) {
      if (confirm("Are you sure you want to delete this doctor?")) {
        
        window.location.href = "delete_doc.php?deleteid=" + doctorId;
      } else {
        
      }
    }
  </script>
</body>
</html>
