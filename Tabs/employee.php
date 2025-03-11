<?php
include 'DB/config.php';
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Records</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
</head>

<body>

    <h2>Employee Records</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Employee Name</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
            <th>Action</th> <!-- New column for delete button -->
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["emp_name"] . "</td>
                    <td>" . $row["dept"] . "</td>
                    <td>" . $row["salary"] . "</td>
                    <td>" . $row["homeaddress"] . "</td>
                    <td>
                        <form action='Tabs/delete_emp.php' method='POST' onsubmit='return confirmDelete();'>
                            <input type='hidden' name='emp_id' value='" . $row["id"] . "'>
                            <button type='submit' class='delete-btn'>Delete</button>
                        </form>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }

        $conn->close();
        ?>

    </table>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this employee?");
        }
    </script>

</body>

</html>