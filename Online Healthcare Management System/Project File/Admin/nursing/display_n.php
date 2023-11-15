<?php
include_once '../include/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Nursing Information</title>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nursing</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="insert_n.php" class="text-light">Add</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Disease</th>
      <th scope="col">Nursingsteps</th>
      <th scope="col">Operation</th>
      
     
    </tr>
  </thead>
  <tbody>
    <?php
 $sql="SELECT* from nursing order by ID desc";
 $result = mysqli_query($con, $sql);
 if($result){
    while($row=mysqli_fetch_assoc($result))
    {
        $ID = $row['ID'];
        $Disease = $row['Disease'];
        $Nursingsteps =nl2br($row['Nursingsteps']);
        
        echo  '<tr>
        <th scope="row">'.$ID.'</th>
        <td>'.$Disease.'</td>
        <td>'.$Nursingsteps.'</td>
        
        
        <td>
        <button class="btn btn-primary my-2"><a href="update_n.php?
        updateID='.$ID.'" class="text-light">Update</a>
        </button>
        <button class="btn btn-danger my-2"><a href="delete_n.php?
        deleteID='.$ID.'" class="text-light">Delete</a>
    </button>
    </td>
      </tr>';
    }
 }
  ?>
    
  </tbody>
</table>
    </div>
</body>
</html>