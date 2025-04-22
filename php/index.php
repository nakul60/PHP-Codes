<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login Form</h2>

    <form action="login.php" method="post">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username"
            value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"
            value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
        <br><br>

        <input type="checkbox" id="remember" name="remember"
            <?php if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) echo "checked"; ?>>
        <label for="remember">Remember me</label>
        <br><br>

        <input type="submit" id="login" name="login" value="Login">
    </form>

    <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
    ?>
</body>
</html>
