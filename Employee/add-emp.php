<?php
// Include database connection
include "../DB/config.php"; // Move up one level to access DB folder


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empname = $_POST['empname'];
    $empid = $_POST['empid'];
    $empemail = $_POST['empemail'];
    $empdept = $_POST['empdept'];
    $empsalary = $_POST['empsalary'];
    $homeaddress = $_POST['homeaddress'];

    // Validate inputs (Ensure fields are not empty)
    if (!empty($empname) && !empty($empid) && !empty($empemail) && !empty($empdept) && !empty($empsalary) && !empty($homeaddress)) {

        // Check if Employee ID already exists
        $checkQuery = "SELECT id FROM employee WHERE id = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("i", $empid);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            echo "<script>alert('Error: Employee ID already exists!'); window.location.href='../index.php';</script>";
        } else {
            // Insert new employee record
            $sql = "INSERT INTO employee (id, email, emp_name, dept, salary, homeaddress) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssss", $empid, $empemail, $empname, $empdept, $empsalary, $homeaddress);

            if ($stmt->execute()) {
                echo '<script>
                 alert("Employee added successfully!");
                    window.location.href="../Admin/admin_page.php?page=dashboard";
                    </script>';
            } else {
                echo "<script>
                // alert('Error: " . $stmt->error . "');
            
                </script>";
            }
        }

        // Close statements
        $checkStmt->close();
        $stmt->close();
    } else {
        echo "<script>alert('Please fill all fields!');</script>";
    }
}

// Close database connection
$conn->close();
