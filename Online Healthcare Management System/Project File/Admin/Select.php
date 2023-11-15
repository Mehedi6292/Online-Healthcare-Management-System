<?php
session_start();

$userprofile = $_SESSION['email'];

if($userprofile == true)
{
  
}

else
{
  header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="CSS/Select.css">
</head>
<body>
<div class="d-grid gap-2 col-6 mx-auto">
  <a href="user/display_user.php" class="btn btn-primary btn-lg "> User</a>
  <a href="doctor/display_doc.php" class="btn btn-primary btn-lg "> Doctor</a>
  <a href="workout/display_workout.php" class="btn btn-primary btn-lg "> Workout</a>
  <a href="nursing/display_n.php" class="btn btn-primary btn-lg "> Nursing</a>
  <a href="Tools/display_t.php" class="btn btn-primary btn-lg "> Tools</a>
  <a href="dietplan/display_dp.php" class="btn btn-primary btn-lg "> Dietplans</a>
  <a href="medicine/display.php" class="btn btn-primary btn-lg "> Medicine</a>
  

</div>
</body>
</html>