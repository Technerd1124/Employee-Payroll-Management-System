<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];

    $sql = "INSERT INTO employee (emp_name, email, dept, salary, homeaddress) VALUES ('$name', '$email', '$dept', '$salary', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "Employee added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Department: <input type="text" name="dept"><br>
    Salary: <input type="number" name="salary"><br>
    Address: <textarea name="address"></textarea><br>
    <button type="submit">Add Employee</button>
</form>
