<?php
include '../DB/config.php';

// Fetch payroll details
$sql = "SELECT p.id, e.emp_name, p.base_salary, p.bonus, p.deductions, p.total_salary, p.payment_status 
        FROM payroll p 
        JOIN employee e ON p.employee_id = e.id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payroll</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        h2 {
            text-align: center;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
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

        .download-btn {
            background: #1ABC9C;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .download-btn:hover {
            background: #16A085;
        }
    </style>
</head>

<body>

    <h2>Employee Payroll Details</h2>

    <table>
        <tr>
            <th>Payroll ID</th>
            <th>Employee</th>
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
                <td><?php echo number_format($row['base_salary'], 2); ?></td>
                <td><?php echo number_format($row['bonus'], 2); ?></td>
                <td><?php echo number_format($row['deductions'], 2); ?></td>
                <td><?php echo number_format($row['total_salary'], 2); ?></td>
                <td class="<?php echo ($row['payment_status'] == 'Paid') ? 'status-paid' : 'status-unpaid'; ?>">
                    <?php echo $row['payment_status']; ?>
                </td>
                <td>
                    <a href="download_slip.php?id=<?php echo $row['id']; ?>" class="download-btn">
                        Download Slip
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>