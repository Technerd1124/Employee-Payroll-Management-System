<?php
session_start();
include '../DB/config.php';

// Redirect to login if not logged in
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// Fetch employee name from database
$email = $_SESSION["email"];
$query = "SELECT emp_name FROM employee WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$emp_name = $row ? $row["emp_name"] : "Employee"; // Default to "Employee" if not found
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="../assests/CSS/employee.css"> Update this if needed -->
</head>

<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    /* Navbar */
    .navbar {
        background: #2C3E50;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
    }

    .navbar .logo {
        font-size: 20px;
        font-weight: bold;
    }

    .navbar div {
        display: flex;
        gap: 15px;
    }

    .navbar a {
        text-decoration: none;
        color: white;
        padding: 10px 15px;
        transition: 0.3s;
    }

    .navbar a:hover {
        background: #1ABC9C;
        border-radius: 5px;
    }

    /* Logout Button */
    .logout {
        background: #E74C3C;
        border: none;
        padding: 10px 15px;
        color: white;
        cursor: pointer;
        font-size: 14px;
        border-radius: 5px;
    }

    .logout:hover {
        background: #C0392B;
    }

    /* Content Area */
    .content {
        padding: 20px;
        background: white;
        margin: 20px auto;
        max-width: 80%;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    /* Forms */
    form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: auto;
    }

    input,
    button {
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background: #1ABC9C;
        color: white;
        cursor: pointer;
        font-size: 16px;
        border: none;
    }

    button:hover {
        background: #16A085;
    }
</style>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">Welcome, <?php echo htmlspecialchars($emp_name); ?></div>

        <div>
            <a href="empdash.php?page=home"><i class="fa fa-home"></i> Home</a>
            <a href="empdash.php?page=leave_req"><i class="fa fa-calendar"></i> Leave Request</a>
            <a href="empdash.php?page=payroll"><i class="fa fa-money-bill"></i> Payroll</a>
            <a href="empdash.php?page=profile"><i class="fa fa-user"></i> Profile</a>
        </div>
        <button class="logout" onclick="logout()">Logout</button>
    </div>

    <div class="content">
        <!-- Dynamic Content -->
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        // Allowed pages
        $allowed_pages = ['home', 'leave_req', 'payroll', 'profile'];

        if (in_array($page, $allowed_pages)) {
            include "Tabs/$page.php"; // Ensure Tabs folder exists
        } else {
            echo "<h2>Page not found</h2>";
        }
        ?>
    </div>
    <script>
        function logout() {
            document.location = "logout.php";
        }
    </script>

</body>

</html>