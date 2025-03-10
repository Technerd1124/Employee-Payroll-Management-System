<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "ifb21";
    $dbname = "payroll";
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
