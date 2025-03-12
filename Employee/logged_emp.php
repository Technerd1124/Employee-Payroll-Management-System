<?php
session_start();
include '../DB/config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['emp_id']);

    // Check if the email exists in the employee table
    $sql = "SELECT employee_id, email, FROM employee WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify password (if stored hashed, use password_verify)
        if (password_verify($password, $hashed_password)) { 
            $_SESSION['employee_id'] = $row['id'];
            $_SESSION['employee_email'] = $row['email'];
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Employee not found"]);
    }

    $stmt->close();
    $conn->close();
}
?>
