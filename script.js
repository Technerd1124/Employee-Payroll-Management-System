function OpenAdmin() {
  document.location = "../Admin/Admin_log.html";
}
function OpenEmployee() {
  document.location = "../Employee/emp_login.php";
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

// Validation for Employee Registration

document
  .getElementById("employeeForm")
  .addEventListener("submit", function (event) {
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
