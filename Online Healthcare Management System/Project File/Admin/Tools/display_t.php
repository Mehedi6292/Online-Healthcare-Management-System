<?php
include_once '../include/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Tools Information</title>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="user_t.php" class="text-light">Insert Tools</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ToolID</th>
      <th scope="col">ToolName</th>
      <th scope="col">Description</th>
      <th scope="col">Disease</th>
      <th scope="col">Operations</th>
     
    </tr>
  </thead>
  <tbody>
    <?php
 $sql="SELECT* from tools order by ToolID desc";
 $result = mysqli_query($con, $sql);
 if($result){
    while($row=mysqli_fetch_assoc($result))
    {
        $ToolID = $row['ToolID'];
        $ToolName =$row['ToolName'];
        $Description = $row['Description'];
        $Disease = $row['Disease'];
        echo  '<tr>
        <th scope="row">'.$ToolID.'</th>
        <td>'.$ToolName.'</td>
        <td>'.$Description.'</td>
        <td>'.$Disease.'</td>
        <td>
        <button class="btn btn-primary my-4"><a href="update_t.php?
        updateID='.$ToolID.'" class="text-light">Update</a>
        </button>
        <button class="btn btn-danger"><a href="delete_t.php?
        deleteID='.$ToolID.'" class="text-light">Delete</a>
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