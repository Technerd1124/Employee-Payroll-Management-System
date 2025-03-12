<?php
include "./DB/config.php";
// Function to Submit a Leave Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_leave"])) {
    $employee_id = $_POST["employee_id"];
    $leave_type = $_POST["leave_type"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $reason = $_POST["reason"];

    $sql = "INSERT INTO leave_requests (employee_id, leave_type, start_date, end_date, reason, status) 
            VALUES ('$employee_id', '$leave_type', '$start_date', '$end_date', '$reason', 'Pending')";

    if ($conn->query($sql) === TRUE) {
        echo "Leave request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to Update Leave Status
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_status"])) {
    $leave_id = $_POST["leave_id"];
    $status = $_POST["status"];

    $sql = "UPDATE leave_requests SET status='$status' WHERE id='$leave_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Leave status updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Function to Delete Leave Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_leave"])) {
    $leave_id = $_POST["leave_id"];

    $sql = "DELETE FROM leave_requests WHERE id='$leave_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Leave request deleted!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch All Leave Requests
$sql = "SELECT * FROM leave_requests ORDER BY id DESC";
$result = $conn->query($sql);
?>

<body>

    <h2>Submit Leave Request</h2>
    <form method="post">
        Employee ID: <input type="number" name="employee_id" required><br>
        Leave Type:
        <select name="leave_type">
            <option value="Sick Leave">Sick Leave</option>
            <option value="Casual Leave">Casual Leave</option>
            <option value="Paid Leave">Paid Leave</option>
            <option value="Unpaid Leave">Unpaid Leave</option>
        </select><br>
        Start Date: <input type="date" name="start_date" required><br>
        End Date: <input type="date" name="end_date" required><br>
        Reason: <textarea name="reason"></textarea><br>
        <button type="submit" name="submit_leave">Submit Leave</button>
    </form>

    <h2>All Leave Requests</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Employee ID</th>
            <th>Leave Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["employee_id"]; ?></td>
                <td><?php echo $row["leave_type"]; ?></td>
                <td><?php echo $row["start_date"]; ?></td>
                <td><?php echo $row["end_date"]; ?></td>
                <td><?php echo $row["reason"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="leave_id" value="<?php echo $row['id']; ?>">
                        <select name="status">
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                        <button type="submit" name="update_status">Update</button>
                    </form>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="leave_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_leave" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>

<?php
$conn->close();
?>