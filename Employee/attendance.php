<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    $emp_id = $_POST['employee_id'];
    $check_in = date("Y-m-d H:i:s");

    $sql = "INSERT INTO attendance (employee_id, check_in, status) VALUES ('$emp_id', '$check_in', 'Present')";
    if ($conn->query($sql) === TRUE) {
        echo "Attendance marked!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Employee ID: <input type="number" name="employee_id"><br>
    <button type="submit">Check In</button>
</form>
