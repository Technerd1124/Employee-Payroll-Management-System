<?php

include '../DB/config.php';

// Check if the employee is logged in
if (!isset($_SESSION['emp_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href='login.php';</script>";
    exit();
}

$emp_id = $_SESSION['emp_id'];

// Fetch employee details
$sql = "SELECT id, email, emp_name, dept, salary, homeaddress FROM employee WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $emp_id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if (!$employee) {
    echo "<script>alert('Employee not found.'); window.location.href='login.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .container {
            width: 50%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #27ae60;
            color: white;
        }

        td {
            background-color: #fff;
        }

        .logout-btn {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #c0392b;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .logout-btn:hover {
            background-color: #a93226;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Employee Profile</h2>
        <table>
            <tr>
                <th>Employee ID</th>
                <td><?php echo $employee['id']; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $employee['emp_name']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $employee['email']; ?></td>
            </tr>
            <tr>
                <th>Department</th>
                <td><?php echo $employee['dept']; ?></td>
            </tr>
            <tr>
                <th>Salary</th>
                <td><?php echo $employee['salary']; ?></td>
            </tr>
            <tr>
                <th>Home Address</th>
                <td><?php echo $employee['homeaddress']; ?></td>
            </tr>
        </table>
        <a href=" .../logout.php" class="logout-btn">Logout</a>
    </div>

</body>

</html>