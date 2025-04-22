<?php

session_start();

if(!isset($_SESSION['user_id']) || trim($_SESSION['user_id']) == '')
{
    header("location:index.php");
    exit();
}

include('conn.php');
$sql = "SELECT * FROM `cookie_table` WHERE user_id = {$_SESSION['user_id']}";

$res = mysqli_query($conn, $sql);

//surely present as checked above
$row = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
</head>
<body>
    <h2>Login Successful</h2>
    <?php echo $row['username'];  ?>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>