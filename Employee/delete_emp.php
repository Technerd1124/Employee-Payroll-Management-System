<?php
include "../DB/config.php"; // Corrected path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];

    // Delete query
    $sql = "DELETE FROM employee WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $emp_id);

    if ($stmt->execute()) {
        echo "<script>alert('Employee deleted successfully!'); window.location = '../index.php?page=employee' </script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
