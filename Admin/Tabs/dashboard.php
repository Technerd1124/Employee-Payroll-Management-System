<?php
include '../DB/config.php';

// Handle Delete Request
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $conn->query("DELETE FROM payroll WHERE id = $delete_id");
    header("Location: admin_payroll.php");
}

// Fetch payroll details
$sql = "SELECT p.id, e.emp_name, p.employee_id, p.base_salary, p.bonus, p.deductions, p.total_salary, p.payment_status 
        FROM payroll p 
        JOIN employee e ON p.employee_id = e.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - Payroll Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #2C3E50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .status-paid {
            color: green;
            font-weight: bold;
        }

        .status-unpaid {
            color: red;
            font-weight: bold;
        }

        .edit-btn,
        .delete-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .edit-btn {
            background: #3498db;
        }

        .delete-btn {
            background: #e74c3c;
        }

        .edit-btn:hover {
            background: #2980b9;
        }

        .delete-btn:hover {
            background: #c0392b;
        }

        /* Form Styling */
        .payroll-form {
            margin-top: 20px;
            text-align: center;
        }

        input,
        select {
            padding: 10px;
            margin: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            background: #27ae60;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .submit-btn:hover {
            background: #219150;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Admin - Payroll Management</h2>

        <table>
            <tr>
                <th>Payroll ID</th>
                <th>Employee</th>
                <th>Employee ID</th>
                <th>Base Salary</th>
                <th>Bonus</th>
                <th>Deductions</th>
                <th>Total Salary</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['emp_name']); ?></td>
                    <td><?php echo $row['employee_id']; ?></td>
                    <td><?php echo number_format($row['base_salary'], 2); ?></td>
                    <td><?php echo number_format($row['bonus'], 2); ?></td>
                    <td><?php echo number_format($row['deductions'], 2); ?></td>
                    <td><?php echo number_format($row['total_salary'], 2); ?></td>
                    <td class="<?php echo ($row['payment_status'] == 'Paid') ? 'status-paid' : 'status-unpaid'; ?>">
                        <?php echo $row['payment_status']; ?>
                    </td>
                    <td>
                        <a href="edit_payroll.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                        <a href="admin_payroll.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Add Payroll Form -->
        <div class="payroll-form">
            <h3>Add Payroll</h3>
            <form action="add_payroll.php" method="POST">
                <input type="text" name="employee_id" placeholder="Employee ID" required>
                <input type="text" name="base_salary" placeholder="Base Salary" required>
                <input type="text" name="bonus" placeholder="Bonus">
                <input type="text" name="deductions" placeholder="Deductions">
                <select name="payment_status" required>
                    <option value="Paid">Paid</option>
                    <option value="Unpaid">Unpaid</option>
                </select>
                <br>
                <button type="submit" class="submit-btn">Add Payroll</button>
            </form>
        </div>
    </div>

</body>

</html>