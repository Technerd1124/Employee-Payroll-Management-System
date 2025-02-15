<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboarc</title>
</head>
<body>
  
// Autherization of Admin from the HTML Form
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == "admin" && $password == "admin"){
        header("Location: admin_dashboard.php");
    }else{
        echo "Invalid username or password";
    }
}

?>

<h1>Welcome admin</h1>
</body>
</html>