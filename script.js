
function OpenAdmin() {
    document.location = "Dashboard/admin_login.html";

    
}

function OpenEmployee(){
    document.location = "Dashboard/emp_login.html";
}




function validateEmployee() { 

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username == "employee" && password == "employee") {
        openDashboad_Emp();
    } else {
        alert("Invalid Username or Password");
    }

}


function validate_admin() {
    // Get the email and password fields
    var email = document.getElementsByName("email")[0].value;
    var password = document.getElementsByName("AdminPassword")[0].value;

    // Check if email is empty
    if (email == "") {
        alert("Email field is required");
        return false;
    }

    // Check if password is empty
    if (password == "") {
        alert("Password field is required");
        return false;
    }

    // Check if email is in a valid format
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        alert("Invalid email format");
        return false;
    }

    // Check if password length is at least 8 characters
    if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    }

    // If all checks pass, submit the form
    return alert("submitted succesfully ! ");
}