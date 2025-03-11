<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css"
        integrity="sha512-v8QQ0YQ3H4K6Ic3PJkym91KoeNT5S3PnDKvqnwqFD1oiqIl653crGZplPdU5KKtHjO0QKcQ2aUlQZYjHczkmGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/brands.min.css"
        integrity="sha512-58P9Hy7II0YeXLv+iFiLCv1rtLW47xmiRpC1oFafeKNShp8V5bKV/ciVtYqbk2YfxXQMt58DjNfkXFOn62xE+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 320px;
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: center;
            align-items: center;
            gap: 12px;
            backdrop-filter: blur(10px);
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 13px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        .login-container input:focus {
            outline: none;
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.5);
        }

        .login-container i {
            font-size: xxx-large;
            color: #4f39de;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container button:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        #warning {
            color: red;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <i class="fa-solid fa-user-tie"></i>
        <h2>Admin Login</h2>
        <form method="post">
            <input type="email" placeholder="Email" value="admin@gmail.com" name="email" required>
            <input type="password" placeholder="Password" required name="AdminPassword">
            <br>
            <br>
            <button type="button" onclick="validate_admin()">Log
                In</button> 
            <p id="warning"> </p>
        </form>
    </div>

    <script>
        function validate_admin() {
            var mail = document.forms[0].email.value;
            var adminPassword = document.forms[0].AdminPassword.value;
            var error = document.getElementById("warning");

            if (mail == "" && adminPassword == "") {
                error.innerHTML = "Enter Both Feilds  ";
            } else {
                if (mail == "admin@gmail.com" && adminPassword == "admin24") {
                    window.location = "index.php";
                } else {
                    error.innerHTML = " wrong details  ";
                }
            }
        }
    </script>
</body>