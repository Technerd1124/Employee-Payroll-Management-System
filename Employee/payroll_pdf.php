<?php
require '../fpdf186/fpdf.php';
include '../DB/config.php';

// Fetch payroll data
$sql = "SELECT p.id, e.emp_name, p.base_salary, p.bonus, p.deductions, p.total_salary, p.payment_status 
        FROM payroll p 
        JOIN employee e ON p.employee_id = e.id";
$result = $conn->query($sql);

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, "Payroll Report", 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(50, 10, 'Employee Name', 1);
$pdf->Cell(25, 10, 'Base Salary', 1);
$pdf->Cell(20, 10, 'Bonus', 1);
$pdf->Cell(25, 10, 'Deductions', 1);
$pdf->Cell(30, 10, 'Total Salary', 1);
$pdf->Cell(20, 10, 'Status', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20, 10, $row['id'], 1);
    $pdf->Cell(50, 10, $row['emp_name'], 1);
    $pdf->Cell(25, 10, $row['base_salary'], 1);
    $pdf->Cell(20, 10, $row['bonus'], 1);
    $pdf->Cell(25, 10, $row['deductions'], 1);
    $pdf->Cell(30, 10, $row['total_salary'], 1);
    $pdf->Cell(20, 10, ucfirst($row['payment_status']), 1);
    $pdf->Ln();
}

$pdf->Output();
