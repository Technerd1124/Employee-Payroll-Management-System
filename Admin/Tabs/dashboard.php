<?php
include '../DB/config.php';

// Fetch employees
$sql = "SELECT id, emp_name, salary FROM employee";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Payroll List </title>
    <link rel="stylesheet" href="../assests/CSS/dash.css">
</head>

<div class="box">
    <h2>Enter Payroll Details</h2>
    <form action="process_payroll.php" method="POST">
        <label for="employee_id">Select Employee:</label>
        <select name="employee_id" id="employee_id" onchange="fetchSalary()" required>
            <option value="">-- Select Employee --</option>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo htmlspecialchars($row['id']); ?>" data-salary="<?php echo htmlspecialchars($row['salary']); ?>">
                    <?php echo htmlspecialchars($row['id'] . " - " . $row['emp_name']); ?>
                </option>
            <?php } ?>
        </select>

        <label for="base_salary">Base Salary:</label>
        <input type="number" name="base_salary" id="base_salary" required readonly>

        <label for="bonus">Bonus:</label>
        <input type="number" name="bonus" id="bonus" required>

        <label for="deductions">Deductions:</label>
        <input type="number" name="deductions" id="deductions" required>

        <button type="submit" id="paybtn">Submit Payroll</button>
    </form>
</div>

<script>
    function fetchSalary() {
        let select = document.getElementById("employee_id");
        let salary = select.options[select.selectedIndex].getAttribute("data-salary");
        document.getElementById("base_salary").value = salary || "";
    }
</script>

</html>