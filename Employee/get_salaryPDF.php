<?php
require('../fpdf186/fpdf.php');
include '../DB/config.php';

if (isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];

    // Fetch employee salary details
    $sql = "SELECT 
                e.id AS emp_id, 
                e.emp_name, 
                SUM(p.base_salary) AS total_base_salary, 
                SUM(p.bonus) AS total_bonus, 
                SUM(p.deductions) AS total_deductions, 
                SUM(p.total_salary) AS total_salary 
            FROM payroll p 
            JOIN employee e ON p.employee_id = e.id 
            WHERE e.id = ? 
            GROUP BY e.id, e.emp_name";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Create PDF instance
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Title
        $pdf->Cell(190, 10, 'Employee Salary Slip', 1, 1, 'C');
        $pdf->Ln(10);

        // Employee Details
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Employee ID:', 0, 0);
        $pdf->Cell(50, 10, $row['emp_id'], 0, 1);

        $pdf->Cell(50, 10, 'Employee Name:', 0, 0);
        $pdf->Cell(50, 10, $row['emp_name'], 0, 1);

        $pdf->Ln(5);

        // Salary Breakdown
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(80, 10, 'Description', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Amount', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(80, 10, 'Base Salary', 1, 0);
        $pdf->Cell(50, 10, number_format($row['total_base_salary'], 2), 1, 1);

        $pdf->Cell(80, 10, 'Bonus', 1, 0);
        $pdf->Cell(50, 10, number_format($row['total_bonus'], 2), 1, 1);

        $pdf->Cell(80, 10, 'Deductions', 1, 0);
        $pdf->Cell(50, 10, number_format($row['total_deductions'], 2), 1, 1);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(80, 10, 'Total Salary', 1, 0);
        $pdf->Cell(50, 10, number_format($row['total_salary'], 2), 1, 1);

        // Output PDF
        $pdf->Output('D', "Salary_Slip_{$row['emp_id']}.pdf");
    } else {
        echo "No employee found with ID: $emp_id";
    }
} else {
    echo "Invalid request.";
}
