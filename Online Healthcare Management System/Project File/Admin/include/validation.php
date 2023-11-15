<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $deg = $_POST["deg"];
    $chmbr = $_POST["chmbr"];
    $addrs = $_POST["addrs"];
    $phn = $_POST["phn"];

    $namePattern = "/^[A-Za-z.]+$/";
    $degreePattern = "/^[A-Za-z,().]+$/";
    $chamberPattern = "/^[A-Za-z-]+$/";
    $addressPattern = "/^[A-Za-z0-9,\/()\#\.\- ]+$/";
    $phonePattern = "/^[0-9+]+$/";

    $errors = [];

    if (!preg_match($namePattern, $name)) {
        $errors[] = "Name should only contain alphabets and '.'";
    }

    if (!preg_match($degreePattern, $deg)) {
        $errors[] = "Degree should only contain alphabets, ',', '.', and '()'";
    }

    if (!preg_match($chamberPattern, $chmbr)) {
        $errors[] = "Chamber should only contain alphabets and '-'";
    }

    if (!preg_match($addressPattern, $addrs)) {
        $errors[] = "Address should only contain alphabets, numbers, ',', '/', '()', '#', and '.'";
    }

    if (!preg_match($phonePattern, $phn)) {
        $errors[] = "Phone should only contain numbers and '+'";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // The input is valid; you can process it further or save it to a database.
        echo "Form submitted successfully!";
    }
}
?>

