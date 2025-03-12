<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    <script>
        document.getElementById("employeeForm").addEventListener("submit", function(event) {
            let isValid = true;

            // Get input values
            let empname = document.getElementById("empname").value.trim();
            let empid = document.getElementById("empid").value.trim();
            let empemail = document.getElementById("empemail").value.trim();
            let empdept = document.getElementById("empdept").value.trim();
            let empsalary = document.getElementById("empsalary").value.trim();

            // Clear previous errors
            document.getElementById("nameError").textContent = "";
            document.getElementById("idError").textContent = "";
            document.getElementById("emailError").textContent = "";
            document.getElementById("deptError").textContent = "";
            document.getElementById("salaryError").textContent = "";

            // Validate Employee Name
            if (empname === "") {
                document.getElementById("nameError").textContent =
                    "Employee name is required.";
                isValid = false;
            }

            // Validate Employee ID (should be a number)
            if (empid === "" || isNaN(empid)) {
                document.getElementById("idError").textContent =
                    "Valid Employee ID is required.";
                isValid = false;
            }

            // Validate Email Format
            let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!empemail.match(emailPattern)) {
                document.getElementById("emailError").textContent =
                    "Invalid email format.";
                isValid = false;
            }

            // Validate Employee Department
            if (empdept === "") {
                document.getElementById("deptError").textContent =
                    "Department is required.";
                isValid = false;
            }

            // Validate Salary (should be a positive number)
            if (empsalary === "" || isNaN(empsalary) || parseFloat(empsalary) <= 0) {
                document.getElementById("salaryError").textContent =
                    "Enter a valid positive salary.";
                isValid = false;
            }

            // If validation fails, prevent form submission
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>