<?php
$servername = "localhost";
$username = "root";
$password = "ifb21";
$dbname = "payroll";

// Enable MySQLi error reporting (for try-catch to work)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    echo "Database connected successfully!";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
