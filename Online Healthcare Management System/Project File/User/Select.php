
<!DOCTYPE html>
<html>
<head>
    <title>Doctor Information</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Select Your Disease:</h1>
    <form action="display.php" method="POST">

        <select name="disease">
            <option value="Diabetes">Diabetes</option>
            <option value="Heart">Heart</option>
            <option value="Dental">Dental</option>
            <option value="Influenza">Influenza</option>
            <option value="Allergy">Allergy</option>
            <option value="Blood pressure">Blood pressure</option>
            
            
        </select>
        <input type="submit" name="submit" value="Submit">
    </form>

    

</body>
</html>
