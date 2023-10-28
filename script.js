const registerForm = document.getElementById("form");
const signInForm = document.getElementById("signInForm");
const registerBtn = document.getElementById("registerBtn");
const signInBtn = document.getElementById("signInBtn");
const signUpBtn = document.getElementById("signUpBtn"); 
const getStartedBtn = document.getElementById("getStartedBtn");
const signInSubmitBtn = document.getElementById("signInSubmitBtn");

function handleSingIn() {
  registerForm.style.display = "none";
  signUpBtn.style.display = "block";
  signInBtn.style.display = "none";
  signInForm.style.display = "block";
}
function handleSignUp() {
  registerForm.style.display = "block";
  signUpBtn.style.display = "none";
  signInBtn.style.display = "block";
  signInForm.style.display = "none";
}

// Validation function
function validateRegistrationForm() {
  const name = document.getElementById("name");
  const lastName = document.getElementById("last_name");
  const email = document.getElementById("email");
  const username = document.getElementById("username");
  const password = document.getElementById("password");
  const cpassword = document.getElementById("cpassword");
  const error = document.querySelector(".error");

  // Reset error message
  error.textContent = "";

  if (name.value.trim() === "") {
    error.textContent = "First name is required";
    name.focus();
    return false;
  }

  if (lastName.value.trim() === "") {
    error.textContent = "Last name is required";
    lastName.focus();
    return false;
  }

  if (email.value.trim() === "") {
    error.textContent = "Email is required";
    email.focus();
    return false;
  }


  if (username.value.trim() === "") {
    error.textContent = "Username is required";
    username.focus();
    return false;
  }

  if (password.value === "") {
    error.textContent = "Password is required";
    password.focus();
    return false;
  }

  if (cpassword.value === "") {
    error.textContent = "Confirm password is required";
    cpassword.focus();
    return false;
  }

  if (password.value !== cpassword.value) {
    error.textContent = "Passwords do not match";
    cpassword.focus();
    return false;
  }

  return true;
}

// Validation function for the sign-in form
function validateSignInForm() {
  const signInUsername = document.getElementById("signInUsername");
  const signInPassword = document.getElementById("signInPassword");
  const error = document.querySelector(".error");

  // Reset error message
  error.textContent = "";

  if (signInUsername.value.trim() === "") {
    error.textContent = "Email is required";
    signInUsername.focus();
    return false;
  }

  if (signInPassword.value === "") {
    error.textContent = "Password is required";
    signInPassword.focus();
    return false;
  }

  return true;
}
