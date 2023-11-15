<?php
if (isset($_POST['submit'])) {
    $selectedDisease = $_POST['disease'];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $descQuery = "SELECT * FROM disease WHERE Disease_Name = '$selectedDisease'";
    $descResult = $conn->query($descQuery);

    $doctorQuery = "SELECT * FROM doctor WHERE specialities = '$selectedDisease'";
    $doctorResult = $conn->query($doctorQuery);

    $nurseQuery = "SELECT * FROM nursing WHERE Disease = '$selectedDisease'";
    $nurseResult = $conn->query($nurseQuery);

    $toolsQuery = "SELECT * FROM tools WHERE Disease = '$selectedDisease'";
    $toolsResult = $conn->query($toolsQuery);

    $medQuery = "SELECT * FROM medicines WHERE Disease = '$selectedDisease'";
    $medResult = $conn->query($medQuery);

    $dietQuery = "SELECT * FROM dietplans WHERE Disease = '$selectedDisease'";
    $dietResult = $conn->query($dietQuery);

    $workoutQuery = "SELECT exercise FROM workout WHERE name = '$selectedDisease'";
    $workoutResult = $conn->query($workoutQuery);

    $statQuery = "SELECT * FROM statistics WHERE Disease_Name = '$selectedDisease'";
    $statResult = $conn->query($statQuery);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="accordion.css">
    
</head>
<body>

<div class="accordion">
    <div class="accordion-item">
      <div class="accordion-title">Disease Description</div>
      <div class="accordion-content">
      <?php
        if ($descResult->num_rows > 0) {
            echo "<h2>Doctors for $selectedDisease:</h2>";
            echo "<ul>";

            while ($row = $descResult->fetch_assoc()) {
                
                echo "<br><strong>Disease Name: </strong>" . $row['Disease_Name'] . "</li>". "<br>";
                echo "<br><strong>Disease Type: </strong>" . nl2br($row['Disease_types']) . "</li>" . "<br>";
                echo "<br><strong>Disease Information: </strong>" . nl2br($row['Disease_info']) . "</li>" . "<br>";
                echo "<br><strong>Management: </strong>" . nl2br($row['Management']) . "</li>" . "<br>";
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "No doctors found for $selectedDisease.";
        }
        ?>
      </div>
    </div>

<div class="accordion">
    <div class="accordion-item">
      <div class="accordion-title">Doctor</div>
      <div class="accordion-content">
      <?php
        if ($doctorResult->num_rows > 0) {
            echo "<h2>Doctors for $selectedDisease:</h2>";
            echo "<ul>";

            while ($row = $doctorResult->fetch_assoc()) {
                echo "<strong>Name: </strong>" . $row['Name'] . "</li>" . "<br>";
                echo "<br><strong>Degree: </strong>" . $row['deg'] . "</li>". "<br>";
                echo "<br><strong>Chember: </strong>" . $row['chember'] . "</li>" . "<br>";
                echo "<br><strong>Address: </strong>" . $row['address'] . "</li>" . "<br>";
                echo "<br><strong>Contact: </strong>" . $row['phone'] . "</li>" . "<br>";
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "No doctors found for $selectedDisease.";
        }
        ?>
      </div>
    </div>

    <div class="accordion">
    <div class="accordion-item">
      <div class="accordion-title">Tools</div>
      <div class="accordion-content">
      <?php
        if ($toolsResult->num_rows > 0) {
            echo "<h2>Doctors for $selectedDisease:</h2>";
            echo "<ul>";

            while ($row = $toolsResult->fetch_assoc()) {
                echo "<strong>Disease: </strong>" . $row['Disease'] . "</li>" . "<br>";
                echo "<strong>Tools Name: </strong>" . $row['ToolName'] . "</li>" . "<br>";
                echo "<strong>Description:<br> </strong>" . nl2br ($row['Description']) . "</li>". "<br>";             
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "No doctors found for $selectedDisease.";
        }
        ?>
      </div>
    </div>

    <div class="accordion">
    <div class="accordion-item">
      <div class="accordion-title">Nursing</div>
      <div class="accordion-content">
      <?php
        if ($nurseResult->num_rows > 0) {
            echo "<h2>Doctors for $selectedDisease:</h2>";
            echo "<ul>";

            while ($row = $nurseResult->fetch_assoc()) {
                echo "<strong>Disease: </strong>" . $row['Disease'] . "</li>" . "<br>";
                echo "<br><strong>Nursing Steps:<br> </strong>" . nl2br($row['Nursingsteps']) . "<br>";
                
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "No Nursing Information found for $selectedDisease.";
        }
        ?>
      </div>
    </div>

    <div class="accordion">
    <div class="accordion-item">
      <div class="accordion-title">Medicines</div>
      <div class="accordion-content">
      <?php
        if ($medResult->num_rows > 0) {
            echo "<h2>Medicines for $selectedDisease:</h2>";
            echo "<ul>";

            while ($row = $medResult->fetch_assoc()) {
                echo "<strong>Disease: </strong>". $row['Disease'] . "</li>" . "<br>";
                echo "<strong>Medicine Name: </strong>" . $row['MedicineName'] . "</li>". "<br>";
                echo "<strong>Company Name: </strong>" . $row['CompanyName'] . "</li>" . "<br>";
                echo "<strong>Dosage Name: </strong>" . $row['Dosage'] . "</li>" . "<br>";
                echo "<br><strong>Description:<br> </strong>" .nl2br( $row['Description']) . "</li>" . "<br>";
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "No medicines found for $selectedDisease.";
        }
        ?>
      </div>
    </div>

    <div class="accordion">
    <div class="accordion-item">
      <div class="accordion-title">Diet plans</div>
      <div class="accordion-content">
      <?php
        if ($dietResult->num_rows > 0) {
            echo "<h2>Medicines for $selectedDisease:</h2>";
            echo "<ul>";

            while ($row = $dietResult->fetch_assoc()) {
                echo "<strong>Disease: </strong>" . $row['Disease'] . "</li>" . "<br>";
                echo "<strong>Plan Name: </strong>" . $row['PlanName'] . "</li>". "<br>";               
                
                echo "<strong>Carbohydrate Limit: </strong>" . $row['CarbohydrateLimit'] . "</li>" . "<br>";
                echo "<strong>Protein Limit: </strong>" . $row['ProteinLimit'] . "</li>" . "<br>";
                echo "<strong>Fat Lomit: </strong>" . $row['FatLimit'] . "</li>" . "<br>";
                echo "<strong>Fiber Limit: </strong>" . $row['FiberLimit'] . "</li>" . "<br>";
                echo "<strong>Calorie Limit: </strong>" . $row['CalorieLimit'] . "</li>" . "<br>";
                echo "<strong>Suitable For: </strong>" . $row['SuitableFor'] . "</li>" . "<br>";
                echo "<br><strong>Description:<br></strong>" . nl2br($row['Description']) . "</li>" . "<br>";
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "No diet plans found for $selectedDisease.";
        }
        ?>
      </div>
    </div>

    <div class="accordion-item">
      <div class="accordion-title">Workout</div>
      <div class="accordion-content">
      <?php
        if ($workoutResult->num_rows > 0) {
            echo "<h1>Workout Information for $selectedDisease:</h1>";
            echo "<ul>";

            while ($row = $workoutResult->fetch_assoc()) {
                // Use nl2br to convert newline characters to <br> tags
                $exercise = nl2br($row['exercise']);
                echo "$exercise";
            }
            echo "</ul>";
        } else {
            echo "No workout information found for $selectedDisease.";
        }
        ?>
      </div>
    </div>

    <div class="accordion">
    <div class="accordion-item">
    <div class="accordion-title" $selectedDisease>Statistics</div>
      <div class="accordion-content">
      <?php
        if ($statResult->num_rows > 0) {
            echo "<h2>Doctors for $selectedDisease:</h2>";
            echo "<ul>";

            while ($row = $statResult->fetch_assoc()) {
                echo "<strong>Disease Name: </strong>" . $row['Disease_Name'] . "</li>" . "<br>";
                echo "<strong>World Stats: </strong>" . nl2br($row['World_stats']) . "</li>" . "<br>";
                echo "<strong>Bangladesh Stats:<br> </strong>" . nl2br ($row['Bangladesh_stats']) . "</li>". "<br>";             
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "No doctors found for $selectedDisease.";
        }
        ?>
      </div>
    </div>
    
</div>
<script>
    const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach(item => {
  const title = item.querySelector('.accordion-title');
  const content = item.querySelector('.accordion-content');

  title.addEventListener('click', () => {
    for (i = 0; i < accordionItems.length; i++) {
      if(accordionItems[i] != item){
        accordionItems[i].classList.remove('active');
      }else{
        // toggle the accordion item
        item.classList.toggle('active');
      }
    }

  });
});
</script>
</body>
</html>