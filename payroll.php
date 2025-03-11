<?php
include 'DB/config.php';
$sql = "SELECT p.id, e.emp_name, p.base_salary, p.bonus, p.deductions, p.total_salary, p.payment_status 
        FROM payroll p 
        JOIN employee e ON p.employee_id = e.id";
$result = $conn->query($sql);
?>

<table border="1">
    <tr>
        <th>Payroll ID</th>
        <th>Employee</th>
        <th>Base Salary</th>
        <th>Bonus</th>
        <th>Deductions</th>
        <th>Total Salary</th>
        <th>Status</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['emp_name']; ?></td>
            <td><?php echo $row['base_salary']; ?></td>
            <td><?php echo $row['bonus']; ?></td>
            <td><?php echo $row['deductions']; ?></td>
            <td><?php echo $row['total_salary']; ?></td>
            <td><?php echo $row['payment_status']; ?></td>
        </tr>
    <?php } ?>
</table>