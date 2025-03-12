function OpenAdmin() {
  // document.location = "./Admin/Admin_log.html";
  document.location = "Admin/Admin_log.html";
}
function OpenEmployee() {
  document.location = "Employee/emp_login.html";
}

/// Validation  Codes

// 1. Admin Login  Validition
function validate_admin() {
  var mail = document.forms[0].email.value;
  var adminPassword = document.forms[0].AdminPassword.value;
  var error = document.getElementById("warning");

  if (mail == "" && adminPassword == "") {
    error.innerHTML = "Enter Both Feilds  ";
  } else {
    if (mail == "admin@gmail.com" && adminPassword == "admin24") {
      window.location = "../Admin/admin_page.php";
    } else {
      error.innerHTML = " wrong details  ";
    }
  }
}

// 2. Employee Login  Validition

function validate_emp() {
  var mail = document.forms[1].email.value;
  var empPassword = document.forms[1].EmpPassword.value;
  var error = document.getElementById("warning");
}
