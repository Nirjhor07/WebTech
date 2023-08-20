<?php
require_once 'controller/registation_info.php';

$users = fetchAllusers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #f2f2f2;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>All Registered Users From Database</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>password</th>
                <th>Email</th>
                <th>Profile Picture</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Religion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['ID'] ?></td>
                <td><?php echo $user['firstName'] ?></td>
                <td><?php echo $user['lastName'] ?></td>
                <td><?php echo $user['passWord'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['uploadPicture'] ?></td>
                <td><?php echo $user['contact'] ?></td>
                <td><?php echo $user['Gender'] ?></td>
                <td><?php echo $user['dob'] ?></td>
                <td><?php echo $user['religion'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
