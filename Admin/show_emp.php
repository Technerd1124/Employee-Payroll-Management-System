<?php
include 'db_connect.php';
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
?>

<table border="1">
<tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Department</th><th>Salary</th><th>Home Address</th>
</tr>
<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['emp_name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['dept']; ?></td>
    <td><?php echo $row['salary']; ?></td>
    <td><?php echo $row['homeaddress']; ?></td>
</tr>
<?php } ?>
</table>
