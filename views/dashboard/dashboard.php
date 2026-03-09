<?php

require '../../middleware/auth.php';
require '../../config/database.php';

$result = $conn->query("SELECT * FROM reservations ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../../assets/css/core.css">

    <title>Dashboard</title>

</head>

<body>

    <h3>Hello <?php echo $_SESSION['username']; ?></h3>

    <a href="/dapaglyn_prebooking/logout.php">Logout</a>

    <br><br>

    <a href="/dapaglyn_prebooking/export">Download CSV</a>

    <br><br>

    <table border="1">

        <tr>
            <th>Doctor</th>
            <th>Contact</th>
            <th>City</th>
            <th>Email</th>
            <th>Speciality</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $row['doctor_name']; ?></td>
                <td><?php echo $row['contact_number']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['speciality']; ?></td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>