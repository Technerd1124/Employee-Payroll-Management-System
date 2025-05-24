<?php
// Database connection
include '../DB/config.php';

// SQL Query
$sql = "SELECT
            e.id AS emp_id,
            e.emp_name,
            SUM(p.base_salary) AS total_base_salary,
            SUM(p.bonus) AS total_bonus,
            SUM(p.deductions) AS total_deductions,
            SUM(p.total_salary) AS total_salary
        FROM payroll p
        JOIN employee e ON p.employee_id = e.id
        GROUP BY e.id, e.emp_name";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #333;
            color: white;
        }

        .delete-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .primary-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .primary-btn:hover {
            background-color: darkgreen;
        }

        .delete-btn:hover {
            background-color: darkred;
        }

        .dwn-btn {
            background-color: blue;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 30%;

        }
    </style>
</head>

<body>
    <?php
    echo '
             <div style="margin: 20px 0;">
                    <form action="../Employee/make_pdf.php" method="post">
                        <button type="submit" style="padding: 10px 20px; font-size: 16px;" class ="dwn-btn">Download List</button>
                    </form>
                </div>
                ';

    ?>
    <h2 style="text-align:center;">Employee Payroll Report</h2>

    <table>
        <tr>
            <th>Emp ID</th>
            <th>Employee Name</th>
            <th>Total Base Salary</th>
            <th>Total Bonus</th>
            <th>Total Deductions</th>
            <th>Total Salary</th>
            <th> Action </th>
            <th> Salary Slip </th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['emp_id']}</td>
                    <td>{$row['emp_name']}</td>
                    <td>{$row['total_base_salary']}</td>
                    <td>{$row['total_bonus']}</td>
                    <td>{$row['total_deductions']}</td>
                    <td>{$row['total_salary']}</td>
                    <td>
                        <form action='../Employee/delete_emp.php' method='POST' onsubmit='return confirmDelete();'>
                            <input type='hidden' name='emp_id' value='" . $row["emp_id"] . "'>
                            <button type='submit' class='delete-btn'>Delete</button>
                        </form>
                    </td>
                     <td>
                        <form action='../Employee/get_salaryPDF.php' method='POST';'>
                            <input type='hidden' name='emp_id' value='" . $row["emp_id"] . "'>
                            <button type='submit' class='primary-btn'> Download PDF</button>
                        </form>
                    </td>
                  </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data available</td></tr>";
        }
        ?>
    </table>


    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this employee?");
        }
    </script>

</body>


</html>

<?php
$conn->close();
?>