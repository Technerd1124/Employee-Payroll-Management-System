<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    $emp_id = $_POST['employee_id'];
    $leave_type = $_POST['leave_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO leave_requests (employee_id, leave_type, start_date, end_date, reason, status) 
            VALUES ('$emp_id', '$leave_type', '$start_date', '$end_date', '$reason', 'Pending')";
    if ($conn->query($sql) === TRUE) {
        echo "Leave requested successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Employee ID: <input type="number" name="employee_id"><br>
    Leave Type: 
    <select name="leave_type">
        <option value="Sick Leave">Sick Leave</option>
        <option value="Casual Leave">Casual Leave</option>
        <option value="Paid Leave">Paid Leave</option>
        <option value="Unpaid Leave">Unpaid Leave</option>
    </select><br>
    Start Date: <input type="date" name="start_date"><br>
    End Date: <input type="date" name="end_date"><br>
    Reason: <textarea name="reason"></textarea><br>
    <button type="submit">Request Leave</button>
</form>
