<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Management System</title>
</head>

<body>

    <h2>Complaint Management System</h2>

    <form method="POST">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required><br>

        <label for="location">Location: </label>
        <input type="text" id="location" name="location" placeholder="Enter your location" required><br>

        <label for="complaint">Complaint:</label><br>
        <textarea id="complaint" name="complaint" placeholder="Enter your complaint" required></textarea><br>

        <input type="submit" name="submit" value="Enter Complaint">
    </form>

    <h2>Applications List:</h2>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Complaint</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "complaint_ms";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Unsuccessful connection!" . mysqli_connect_error());
        }

        // INSERT if POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $location = $_POST['location'];
            $complaint = $_POST['complaint'];

            $sql = "INSERT INTO `complaint_table`(`Name`, `Location`, `Complaint`) VALUES ('$name','$location','$complaint')";
            $res = mysqli_query($conn, $sql);

            // Redirect to avoid duplicate insertion on refresh
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // SELECT data
        $sql = "SELECT * FROM `complaint_table`";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>
                    <td>{$row['Name']}</td>
                    <td>{$row['Location']}</td>
                    <td>{$row['Complaint']}</td>
                </tr>";
            }
        }
        ?>
    </table>

</body>

</html>
