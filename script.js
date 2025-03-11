function OpenAdmin() {
  document.location = "Admin/admin_login.html";
}

function OpenEmployee() {
  document.location = "Employee/emp_login.html";
}

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
