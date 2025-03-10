<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard Navbar</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            /* border: 1px solid; */
        }

        form input {
            width: 300px;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            width: 150px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        header {
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <header>
        <center>
            <h1>Add Employee</h1>
        </center>
    </header>

    <form action="empdash.php" method="post">
        <input type="text" name="empname" placeholder="Employee Name">
        <input type="text" name="empid" placeholder="Employee ID">
        <input type="text" name="empemail" placeholder="Employee Email">
        <input type="text" name="empdept" placeholder="Employee Department">
        <input type="text" name="empsalary" placeholder="Employee Salary">
        <input type="submit" name="submit" value="Add Employee">

    </form>


    <script>
        function toggleMenu() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navLinks = document.querySelector('.nav-links');
            menuToggle.classList.toggle('active');
            navLinks.classList.toggle('active');
        }
    </script>
</body>

</html>