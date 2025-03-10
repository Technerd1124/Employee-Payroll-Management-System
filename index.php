<?php
// Start session if needed
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #98e1ef, #7077c9);
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        /* Navbar Styling */
        .navbar {
            /* background: linear-gradient(135deg, #6a11cb, #2575fc); */
            background: linear-gradient(224deg, #151415, #3a4861);
            ;
            width: 100%;
            padding: 15px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(14, 143, 203, 0.2);
        }

        .navbar .logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
            padding-left: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin: 0 10px;
            display: inline-block;
            font-size: 18px;
            transition: 0.3s;
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 6px;
        }

        /* Logout Button */
        .logout {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 20px;
        }

        .logout:hover {
            background: #e60000;
        }

        /* Content Box */
        .content {
            margin-top: 15vh;
            text-align: center;
            width: 90vw;
            height: 99vh;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>


<body>

    <!-- Navbar (Always Visible) -->
    <div class="navbar">
        <div class="logo">Admin <br>
            {name} </div>
        <div>
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=dashboard">Dashboard</a>
            <a href="index.php?page=profile"> Employees</a>
        </div>
        <button class="logout" onclick="logout()">Logout</button>
    </div>

    <div class="content">
        <!-- Dynamic Content Section -->
        <?php
        // Get the page parameter from the URL
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        // Allowed pages
        $allowed_pages = ['home', 'dashboard', 'profile'];

        // Include the corresponding page or show error
        if (in_array($page, $allowed_pages)) {
            include "$page.php";
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