const panels_sel = document.querySelectorAll(".choose");
const panels_fav = document.querySelectorAll(".prefered");
const panels_dev = document.querySelectorAll(".devise");

function deselectAll(panels) {
  for (let i = 0; i < panels.length; i++) {
    panels[i].classList.remove("selected");
  }
}

function selectPanel(panels, className = "choose") {
  for (let i = 0; i < panels.length; i++) {
    panels[i].addEventListener("click", (elem) => {
      deselectAll(panels_sel);
      deselectAll(panels_fav);

      let item = elem.target;
      if (!item.classList.contains(className)) {
        item = elem.target.parentElement;
      }
      item.classList.add("selected");
    });
  }
}

function selectPanel2(panels) {
  for (let i = 0; i < panels.length; i++) {
    panels[i].addEventListener("click", (elem) => {
      deselectAll(panels);

      let item = elem.target;
      if (!item.classList.contains("devise")) {
        item = elem.target.parentElement;
      }
      item.classList.add("selected");
    });
  }
}

function findLangageSelected() {
  const _selected = document.querySelectorAll(".selected");
  for (let i = 0; i < _selected.length; i++) {
    if (_selected[i].classList.contains("choose")) {
      console.log("choose selected");
    }
    if (_selected[i].classList.contains("prefered")) {
      console.log("preferred selected");
    }
    if (_selected[i].classList.contains("devise")) {
      console.log("devise selected");
    }
  }
}

function onAction(action) {
  switch (action) {
    case "facebook":
      break;
    case "google":
      break;

    case "tel":
      _mail.classList = "ms-0 row d-flex btn btn-light w-100 mb-3 py-3";
      _phone.classList = "collapse";
      _pan_tel.classList = "collapse";
      _pan_mail.classList = "";
      form_login.method_validate.value = "mail";
      break;

    case "mail":
      _phone.classList = "ms-0 row d-flex btn btn-light w-100 mb-3 py-3";
      _mail.classList = "collapse";
      _pan_tel.classList = "";
      _pan_mail.classList = "collapse";
      form_login.method_validate.value = "phone";

      break;
  }
}

async function fetchDataPhone(file) {
  try {
    const response = await fetch(file);
    if (response.ok) {
      const data = await response.json();
      return data;
    } else {
      throw new Error("Échec de la récupération des données");
    }
  } catch (error) {
    console.error("Erreur lors de la récupération des données : " + error);
  }
}

async function fetchCountry() {
  fetch("https://ip-api.io/json", {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      const country = data.country;
      return country;
    })
    .catch((error) => {
      console.error(
        "Erreur lors de la récupération des données de géolocalisation par adresse IP : " +
          error
      );
    });
}

async function fetchIPAddress(){
  fetch("https://api.ipify.org?format=json")
    .then(response => response.json())  
    .then((data) => {   
      const userIP=data.ip;     
      return userIP;
    })
    .catch((error) => {
      console.error(
        "Erreur lors de la récupération des données de géolocalisation par adresse IP : " +
          error
      );
    });

}
