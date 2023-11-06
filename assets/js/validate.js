function checkLogin() {
  let email = document.querySelector("#mail");
  const emailValue = email.value.trim();
  if (emailValue === "") {
    setErrorFor(email, "Adresse mail vide");
  } else if (!isEmail(emailValue)) {
    setErrorFor(email, "Adresse mail invalide");
  } else {
    setSuccessFor(email);
    return true;
  }
  return false;
}

function onValidateLogin() {
  if (checkLogin()) {
  }
  return false;
}

function checkName(_elem, message = "nom vide") {
  const nameValue = _elem.value.trim();
  if (nameValue === "") {
    setErrorFor(_elem, message);
  } else {
    setSuccessFor(_elem);
    return true;
  }
  return false;
}

function checkMail(_elem) {
  const emailValue = _elem.value.trim();
  if (emailValue === "") {
    setErrorFor(_elem, "Adresse mail vide");
  } else if (!isEmail(emailValue)) {
    setErrorFor(_elem, "Adresse mail invalide");
  } else {
    setSuccessFor(_elem);
    return true;
  }
  return false;
}

function checkDate(_day, _month, _year) {
  let ret = true;
  if (_day.value === "0") {
    setErrorFor(_day, "Jour non renseigné");
    ret = false;
  } else {
    setSuccessFor(_day);
  }
  if (_month.value === "0") {
    setErrorFor(_month, "Mois non renseigné");
    ret = false;
  } else {
    setSuccessFor(_month);
  }
  if (_year.value === "0") {
    setErrorFor(_year, "Année non renseignée");
    ret = false;
  } else {
    setSuccessFor(_year);
  }
  return ret;
}

function checkPhone(_elem, message = "Numéro de téléphone vide") {
  const nameValue = _elem.value.trim();

  if (nameValue === "") {
    setErrorFor(_elem, message);
  } else if (nameValue.length<10) {
    setErrorFor(_elem, "doit avoir 10 chiffres");
  } else if (!isPhone(nameValue)) {
    setErrorFor(_elem, "Format incorrect");
  } else {
    setSuccessFor(_elem);
    return true;
  }
  return false;
}

function checkCode(_elem, message = "Code absent ou imcomplet") {
  const nameValue = _elem.value.trim();
  if (nameValue === "") {
    setErrorFor(_elem, message);
  } else {
    setSuccessFor(_elem);
    return true;
  }
  return false;
}

function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}

function isPhone(phone) {
  return /^0[1-9][0-9]{8}$/.test(phone);
}

function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");
  formControl.className = "form-control error";
  small.innerText = message;
}

function setSuccessFor(input) {
  const formControl = input.parentElement;
  formControl.className = "form-control success";
}
