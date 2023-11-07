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
      _phone.classList = "collapse";  
      _mail.classList = "ms-0 row d-flex btn btn-light w-100 mb-3 py-3";
      
      _pan_mail.classList = "";
      _pan_tel.classList = "collapse";
      form_login.method_validate.value = "mail";
      break;

    case "mail":
      _phone.classList = "ms-0 row d-flex btn btn-light w-100 mb-3 py-3";
      _mail.classList = "collapse";

      _pan_mail.classList = "collapse";
      _pan_tel.classList = "";
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

async function fetchIPAddress() {
  return new Promise((resolve, reject) => {
    fetch("https://api.ipify.org?format=json")
      .then((response) => response.json())
      .then((data) => {
        const userIP = data.ip;
        resolve(userIP);
      })
      .catch((error) => {
        console.error(
          "Erreur lors de la récupération des données de géolocalisation par adresse IP : " +
            error
        );
      });
  });
}

async function getCountryFromIP(ip) {
  return new Promise((resolve, reject) => {
    fetch(`https://ipinfo.io/json?token=98406dd2b8e2b5`)
      .then((response) => response.json())
      .then((data) => resolve(data.country))
      .catch((error) => {
        reject(error);
      });
  });
}

async function loadJson(file) {
  return new Promise((resolve, reject) => {
    fetch(file)
      .then((response) => response.json())
      .then((data) => resolve(data))
      .catch((error) => {
        reject(error);
      });
  });
}

function loadCountryToSelect(selectedCountry) {
  fetchDataPhone("build/data/country.json").then((data) => {
    if (data) {
      // Ici, vous pouvez utiliser les données JSON récupérées
      // Par exemple, vous pouvez créer et remplir le select avec ces données
      const selectElement = document.getElementById("countrySelect");

      data.forEach((country) => {
        const option = document.createElement("option");
        option.value = country.indicatif;
        if (selectedCountry == country.name){
          option.text = `${country.name} +(${country.indicatif}) `;
          option.setAttribute("selected", true);
        }
        else option.text = `${country.name} +(${country.indicatif})`;
        selectElement.appendChild(option);
      });
    }
  });
}

async function getCountry() {
  let countries = [];

  const ip = await fetchIPAddress();
  const code = await getCountryFromIP(ip);
  countries = await loadJson("build/data/country.json");
  let val = countries.find((country) => country.code === code);
  return val;
}
