<?php
include '../DB/config.php';

// Check if ID is passed
if (!isset($_GET['id'])) {
    echo "<script>alert('No payroll ID provided'); window.location.href='admin_payroll.php';</script>";
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM payroll WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$payroll = $result->fetch_assoc();

if (!$payroll) {
    echo "<script>alert('Payroll record not found'); window.location.href='admin_payroll.php';</script>";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base_salary = $_POST['base_salary'];
    $bonus = $_POST['bonus'];
    $deductions = $_POST['deductions'];
    $payment_status = $_POST['payment_status'];

    // Calculate total salary
    $total_salary = ($base_salary + $bonus) - $deductions;

    // Update payroll record
    $update_stmt = $conn->prepare("UPDATE payroll SET base_salary=?, bonus=?, deductions=?, total_salary=?, payment_status=? WHERE id=?");
    $update_stmt->bind_param("ddddsi", $base_salary, $bonus, $deductions, $total_salary, $payment_status, $id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Payroll updated successfully'); window.location.href='admin_payroll.php';</script>";
    } else {
        echo "<script>alert('Error updating payroll'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Payroll</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .container {
            width: 40%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        input,
        select {
            padding: 10px;
            margin: 8px;
            width: 90%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            background: #27ae60;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .submit-btn:hover {
            background: #219150;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Payroll</h2>
        <form action="" method="POST">
            <input type="text" name="base_salary" value="<?php echo $payroll['base_salary']; ?>" required>
            <input type="text" name="bonus" value="<?php echo $payroll['bonus']; ?>">
            <input type="text" name="deductions" value="<?php echo $payroll['deductions']; ?>">
            <select name="payment_status" required>
                <option value="Paid" <?php echo ($payroll['payment_status'] == 'Paid') ? 'selected' : ''; ?>>Paid</option>
                <option value="Unpaid" <?php echo ($payroll['payment_status'] == 'Unpaid') ? 'selected' : ''; ?>>Unpaid</option>
            </select>
            <br>
            <button type="submit" class="submit-btn">Update Payroll</button>
        </form>
    </div>

</body>

</html>