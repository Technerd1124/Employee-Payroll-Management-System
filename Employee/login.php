<?php
session_start();

// Database connection
include '../DB/config.php';
// Handle form submission
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $emp_id = isset($_POST['emp_id']) ? trim($_POST['emp_id']) : '';

    if (!empty($email) && !empty($emp_id)) {
        // Check if employee exists
        $stmt = $conn->prepare("SELECT id, emp_name FROM employee WHERE email = ? AND id = ?");
        $stmt->bind_param("si", $email, $emp_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['emp_id'] = $emp_id;
            header("Location: empdash.php"); // Redirect to empdashboard.php
            exit();
        } else {
            $error = "Invalid Employee Email or ID.";
        }

        $stmt->close();
    } else {
        $error = "Please enter both Email and Employee ID.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Employee Dashboard </title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/brands.min.css"
        integrity="sha512-58P9Hy7II0YeXLv+iFiLCv1rtLW47xmiRpC1oFafeKNShp8V5bKV/ciVtYqbk2YfxXQMt58DjNfkXFOn62xE+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css"
        integrity="sha512-v8QQ0YQ3H4K6Ic3PJkym91KoeNT5S3PnDKvqnwqFD1oiqIl653crGZplPdU5KKtHjO0QKcQ2aUlQZYjHczkmGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assests/CSS/employee.css">

</head>

<body>



    <div class="login-container">
        <i class="fa-regular fa-user"></i>
        <h2> Employee Login </h2>
        <?php if (!empty($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>

        <form action="" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <br>
            <input type="text" name="emp_id" placeholder="Employee ID"
                required>

            <p id="warning"></p>
            <button type="submit">Log In</button>
        </form>
    </div>

</body>

</html>