<?php
require('fpdf/fpdf.php');  // Include FPDF Library
include 'DB/config.php';   // Include Database Connection

// Create a PDF instance
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(190, 10, 'Employee Details', 1, 1, 'C');
$pdf->Ln(10);  // Line break

// Table Header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Emp ID', 1);
$pdf->Cell(50, 10, 'Name', 1);
$pdf->Cell(50, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Dept', 1);
$pdf->Cell(30, 10, 'Salary', 1);
$pdf->Ln();

// Fetch Data from Database
$query = "SELECT id, emp_name, email, dept, salary FROM employee";
$result = $conn->query($query);

// Table Content
$pdf->SetFont('Arial', '', 12);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(30, 10, $row['id'], 1);
    $pdf->Cell(50, 10, $row['emp_name'], 1);
    $pdf->Cell(50, 10, $row['email'], 1);
    $pdf->Cell(30, 10, $row['dept'], 1);
    $pdf->Cell(30, 10, $row['salary'], 1);
    $pdf->Ln();
}

// Output the PDF
$pdf->Output('D', 'Employee_Details.pdf');  // 'D' for Download

// Close database connection
$conn->close();
?>
