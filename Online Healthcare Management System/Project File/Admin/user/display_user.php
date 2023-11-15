<?php
include_once '../include/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<body>
    
    <table class="table">
  <thead>
    <tr>
      
    <th scope="col">ID</th>  
    <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql="select * from reg order by id desc";
  $result=mysqli_query($con,$sql);

  if($result){
   
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $f_name=$row['F_name'];
        $l_name=$row['L_name'];
        $email=$row['email'];
        $pass=$row['pass'];
        
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$f_name.'</td>
        <td>'.$l_name.'</td>
        <td>'.$email.'</td>
        <td>'.$pass.'</td>
        
        <td>
        
        <button class="btn btn-danger"><a href="delete_doc.php? deleteid='.$id.'" class="text-light">Delete</a></button>
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