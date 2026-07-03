<?php
include 'db.php';
$enquiries = $conn->query("SELECT * FROM enquiries ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Enquiries</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #002b5b;
            color: white;
        }
    </style>
</head>

<body>
    <h2>User Enquiries</h2>
    <a href="admin_dashboard.php">Back to Dashboard</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $enquiries->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>