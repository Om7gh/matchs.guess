// variables
const form = document.querySelector("#form");
const userInput = document.querySelector("#username");
const mailInput = document.querySelector("#email");
const passInput = document.querySelector("#pass");
const cpassInput = document.querySelector("#cpass");

form.addEventListener("submit", checkInput);

function checkInput(e) {
  if (
    userInput.value.trim() === "" ||
    mailInput.value.trim() === "" ||
    !checkMail(mailInput.value) ||
    passInput.value.trim() == "" ||
    cpassInput.value.trim() === "" ||
    passInput.value !== cpassInput.value
  ) {
    e.preventDefault();
  } else {
    return true;
  }

  var userValue = userInput.value;
  var mailValue = mailInput.value;
  var passValue = passInput.value;
  var cPassValue = cpassInput.value.trim();

  if (userValue === "") {
    setError(userInput);
  } else {
    setSuccess(userInput);
  }

  if (mailValue === "") {
    setError(mailInput);
  } else if (!checkMail(mailValue)) {
    setError(mailInput);
    alert("البريد الاكتروني غير صالح للاستعمال");
  } else {
    setSuccess(mailInput);
  }

  if (passValue === "") {
    setError(passInput);
  } else {
    setSuccess(passInput);
  }

  if (cPassValue !== passValue) {
    setError(cpassInput);
    alert("هناك خطا في تكرار كلمة السر");
  } else {
    setSuccess(cpassInput);
  }
}

function setError(input) {
  input.style.borderBottom = "2px solid red";
}

function setSuccess(input) {
  input.style.borderBottom = "2px solid green";
}

function checkMail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}
