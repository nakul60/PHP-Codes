<?php

//first make a variable for checking whether login is done or not

$logged_in = $_POST['login'];//submit input
if(isset($logged_in))
{
    include('conn.php');
    session_start();

    $username = $_POST["username"];//username
    $password = $_POST["password"];//password
    $remember = $_POST["remember"];//check box

    $sql = "SELECT * FROM `cookie_table` WHERE username = '$username' && pass = '$password'";

    $res = mysqli_query($conn,$sql);

    $num = mysqli_num_rows($res);

    if($num == 0)//username and password not found
    {
        $_SESSION["message"] = "Login Failed! User not Found!";
        header("location:index.php");
    }
    else
    {
        $row = mysqli_fetch_assoc($res);
        //check if the cookie is set up or not
        if(isset($remember))
        {
            //set up the cookie
            setcookie("username", $row["username"], time() + (86400*30));
            setcookie("password", $row["password"], time() + (86400*30));
        }

        //assign a id to that user
        $_SESSION['user_id'] = $row['user_id'];
        header("location:success.php");
    }
}
else//user didnot logged in
{
    header('location:index.php');
    $_SESSION["message"] = "Please Login!";
}

?>