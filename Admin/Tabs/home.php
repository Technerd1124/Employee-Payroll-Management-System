<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script defer src="script.js"></script>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
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

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header>
        <center>
            <h1>Add Employee</h1>
        </center>
    </header>

    <form id="employeeForm" action="Employee/empdash.php" method="post">
        <input type="text" id="empname" name="empname" placeholder="Employee Name">
        <span class="error" id="nameError"></span>

        <input type="text" id="empid" name="empid" placeholder="Employee ID">
        <span class="error" id="idError"></span>

        <input type="text" id="empemail" name="empemail" placeholder="Employee Email">
        <span class="error" id="emailError"></span>

        <input type="text" id="empdept" name="empdept" placeholder="Employee Department">
        <span class="error" id="deptError"></span>
        <input type="text" id="homeaddress" name="homeaddress" placeholder="Home Address">
        <span class="error" id="addressError"></span>


        <input type="text" id="empsalary" name="empsalary" placeholder="Employee Salary">
        <span class="error" id="salaryError"></span>

        <input type="submit" name="submit" value="Add Employee">
    </form>

    <script src="../script.js">

    </script>
</body>

</html>