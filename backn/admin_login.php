
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

