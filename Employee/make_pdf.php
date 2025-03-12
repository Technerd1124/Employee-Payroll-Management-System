<?php
// require('fpdf/fpdf.php');    // IncludeFPDF library
require('../fpdf186/fpdf.php'); // Go one level up to access fpdf186
include('../DB/config.php');    // Adjust the path if needed

// Query to fetch required employee details
$sql = "SELECT id, emp_name, salary, dept FROM employee";
$result = $conn->query($sql);

// Create a new PDF instance
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Employee List', 0, 1, 'C');
$pdf->Ln(5);

// Table header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'Employee ID', 1);
$pdf->Cell(60, 10, 'Employee Name', 1);
$pdf->Cell(40, 10, 'Salary', 1);
$pdf->Cell(40, 10, 'Department', 1);
$pdf->Ln();

// Table rows
$pdf->SetFont('Arial', '', 12);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['id'], 1);
        $pdf->Cell(60, 10, $row['emp_name'], 1);
        $pdf->Cell(40, 10, $row['salary'], 1);
        $pdf->Cell(40, 10, $row['dept'], 1);
        $pdf->Ln();
    }
}

// Force download the PDF as "Employee_List.pdf"
$pdf->Output('D', 'Employee_List.pdf');

// Close the database connection
$conn->close();
