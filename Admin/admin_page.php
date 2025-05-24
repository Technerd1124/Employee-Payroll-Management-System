<?php
// Start session if needed
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../assests/CSS/admin.css">

</head>

<body>

    <!-- Navbar (Always Visible) -->
    <div class="navbar">
        <div class="logo"> Welcome Admin <br> </div>
        <div>
            <a href="admin_page.php?page=home">Home</a>
            <a href="admin_page.php?page=dashboard"> Manage Payroll </a>
            <a href="admin_page.php?page=employee"> Employees</a>
        </div>
        <button class="logout" onclick="logout()">Logout</button>
    </div>
    <div class="content">
        <!-- Dynamic Content Section -->
        <?php
        // Get the page parameter from the URL
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        // Allowed pages
        $allowed_pages = ['home', 'dashboard', 'employee'];

        // Include the corresponding page or show error
        if (in_array($page, $allowed_pages)) {
            include "Tabs/$page.php";
        } else {
            echo "<h2>Page not found</h2>";
        }

        ?>
        <!-- <form>
            <div class="boxofForm">
                <label for="name"> Name </label>
                <input type="text" id="Name">
            </div>
            <div class="boxofForm"></div>
            <div class="boxofForm"></div>
            <div class="boxofForm"></div>
        </form> -->
        <script>
            function logout() {
                // document.location = "../logout.php";
                document.location = "../logout.php";
            }
        </script>
</body>

</html>