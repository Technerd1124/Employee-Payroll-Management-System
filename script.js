function OpenAdmin() {
  document.location = "Dashboard/admin_login.html";
}

function OpenEmployee() {
  document.location = "Dashboard/emp_login.html";
}

function validateEmployee() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (username == "employee" && password == "employee") {
    return console.log("Login Successful");
  } else {
    return console.log("Login Failed");
  }
}

function validate_admin() {
  // Get the email and password fields
  var email = document.getElementsByName("email")[0].value;
  var password = document.getElementsByName("AdminPassword")[0].value;

  // Check if email is empty
  if (email == "") &&  (password == "") {
     return false console.log("Email field is required");
  }


else{
  var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
if (!emailRegex.test(email)) {
  alert("Invalid email format");
  return false;
} 
  if (password.length < 8) {
    alert("Password must be at least 8 characters long");
    return false;
  }

  return alert("submitted succesfully ! ");
}

}