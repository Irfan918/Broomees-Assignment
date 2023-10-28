const registerForm = document.getElementById("form");
const signInForm = document.getElementById("signInForm");
const registerBtn = document.getElementById("registerBtn");
const signInBtn = document.getElementById("signInBtn");
const getStartedBtn = document.getElementById("getStartedBtn");
const signInSubmitBtn = document.getElementById("signInSubmitBtn");

registerBtn.addEventListener("click", () => {
  registerForm.style.display = "block";
  signInForm.style.display = "none";
});

signInBtn.addEventListener("click", () => {
  registerForm.style.display = "none";
  signInForm.style.display = "block";
});
