
<?php
include './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $emp_name = $_POST['emp_name'];
    $dept = $_POST['dept'];
    $salary = $_POST['salary'];
    $homeaddress = $_POST['homeaddress'];

    $stmt = $conn->prepare("INSERT INTO employee (email, emp_name, dept, salary, homeaddress)
    VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $email, $emp_name, $dept, $salary, $homeaddress);

    if ($stmt->execute()) {
        echo "Employee record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}



?>