<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Sorting and Sum Calculation</h2>

    <form method = "post">

    <label for="number">Enter the Numbers (comma separated): </label>
    <input type="text" name = "number" id = "number" required>

    <br>

    <input type="submit" name = "submit" value = "Enter">

    </form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $num = $_POST['number'];//here we have received a string.
    //convert this into an array using the explode function

    $arr = explode(",",$num);//explode -> string to array
    sort($arr);//implode -> array to string

    //implode for array to string
    $string = implode(", ",$arr);

    echo "<h3>The sorted values are $string</h3>";

    $sum = 0;
    for($i = 0;$i < count($arr);$i++)
    {
        $sum += $arr[$i];
    }

    echo "<h3>The Sum of values entered is: $sum</h3>";

}

?>


</body>
</html>
