<?php
include '../DB/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $base_salary = $_POST['base_salary'];
    $bonus = $_POST['bonus'] ?? 0;
    $deductions = $_POST['deductions'] ?? 0;
    $payment_status = $_POST['payment_status'];

    // Calculate total salary
    $total_salary = ($base_salary + $bonus) - $deductions;

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO payroll (employee_id, base_salary, bonus, deductions, total_salary, payment_status) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("idddds", $employee_id, $base_salary, $bonus, $deductions, $total_salary, $payment_status);

    if ($stmt->execute()) {
        echo "<script>alert('Payroll added successfully'); window.location.href='admin_payroll.php';</script>";
    } else {
        echo "<script>alert('Error adding payroll'); window.history.back();</script>";
    }
}
?>
