
<?php
include '../DB/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $base_salary = $_POST['base_salary'];
    $bonus = $_POST['bonus'];
    $deductions = $_POST['deductions'];

    // Validate Inputs
    if (empty($employee_id) || empty($base_salary) || empty($bonus) || empty($deductions)) {
        die("Error: Missing required fields.");
    }

    // Calculate total salary
    $total_salary = $base_salary + $bonus - $deductions;

    // Proper SQL query to prevent duplicate entries
    $query = "
        INSERT INTO payroll (employee_id, base_salary, bonus, deductions, total_salary)
        VALUES (?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE 
            base_salary = VALUES(base_salary), 
            bonus = VALUES(bonus), 
            deductions = VALUES(deductions), 
            total_salary = VALUES(base_salary) + VALUES(bonus) - VALUES(deductions);
    ";

    // Prepare and bind parameters to prevent SQL injection
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("idddd", $employee_id, $base_salary, $bonus, $deductions, $total_salary);

        if ($stmt->execute()) {
            echo '<script>
                alert("Payroll updated successfully");
                window.location.href="../Admin/admin_page.php?page=employee";
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
