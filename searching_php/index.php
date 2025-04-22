<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Employnee Name Searhing</h2>

    <form method = "post">

    <label for="name">Enter Employee Name: </label>
    <input type="text" name = "name" id = "name" required>

    <br>

    <input type="submit" name = "submit" value = "Check">

    </form>

<?php

$arr = ['Nakul Arora', 'Namish Arora', 'Nishant Gupta', 'Prnajal Godse', 'Ratul Kulkarni','Arnav Joshi', 'Sudharma Ballal', 'Adarsh Agarwal'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['name'];
    if(in_array($name, $arr))
    {
        echo "<h2 style = 'color : green;'>Employee Name Found!</h2>";
    }
    else
    {
        echo "<h2 style = 'color : red;'>Employee Name Not Found!</h2>";
    }
}

?>


</body>
</html>
