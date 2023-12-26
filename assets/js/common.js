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

async function fetchCountry(file = "https://ip-api.io/json") {
  fetch(file, {
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

async function fetchIPAddress(file = "https://api.ipify.org?format=json") {
  return new Promise((resolve, reject) => {
    fetch(file)
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

function loadCountryToSelect(file, selectedCountry) {
  fetchDataPhone(file).then((data) => {
    if (data) {
      const selectElement = document.getElementById("countrySelect");

      data.forEach((country) => {
        const option = document.createElement("option");
        option.value = country.indicatif;
        if (selectedCountry == country.name) {
          option.text = `${country.name} +(${country.indicatif}) `;
          option.setAttribute("selected", true);
        } else option.text = `${country.name} +(${country.indicatif})`;
        selectElement.appendChild(option);
      });
    }
  });
}

async function getCountry(filename) {
  let countries = [];
  const ip = await fetchIPAddress();
  const code = await getCountryFromIP(ip);
  countries = await loadJson(filename);
  let val = countries.find((country) => country.code === code);
  return val;
}

function alertVanish() {
  let _alert = document.querySelector(".alert");
  setTimeout(() => {
    if (_alert == null) return;
    const alert = bootstrap.Alert.getOrCreateInstance(_alert);
    if (alert) {
      alert.close();
    }
  }, 3000);
}

async function loadPanelAccount(file) {
  let _grid = document.querySelector(".grid-3");
  const data = await loadJson(file);
  data.forEach((panel) => {
    _grid.innerHTML += `<div onclick="onNavigate('${panel.path}');" class="card-xs shadow rounded p-3">${panel.icon}<h6 class="mt-3"><b>${panel.title}</b></h6><span class="gray">${panel.text}</span></div>`;
  });
}

function loadCountryOnlyToSelect(
  file,
  selectedCountry,
  tagId = "countryOnlySelect",
  isOnlyCountry = true
) {
  fetchDataPhone(file).then((data) => {
    if (data) {
      // Ici, vous pouvez utiliser les données JSON récupérées
      // Par exemple, vous pouvez créer et remplir le select avec ces données
      const selectElement = document.getElementById(tagId);

      data.forEach((country) => {
        const option = document.createElement("option");
        option.value = country.indicatif;
        if (selectedCountry == country.name) {
          option.setAttribute("selected", true);
        }
        if (isOnlyCountry == true) {
          option.text = `${country.name}`;
        } else {
          option.text = `${country.name} +(${country.indicatif}) `;
        }
        selectElement.appendChild(option);
      });
    }
  });
}

// Telephone
const maskTelOptions = {
  mask: "+00[0] 0 00 00 00 00",
  lazy: false, // rendre placeholder toujours visible
  placeholderChar: "X",
};

// Carte CB
const maskCardOptions = {
  mask: "0000 0000 0000 0000",
  lazy: false, // rendre placeholder toujours visible
  //placeholderChar: '0'
};

// Date MM/AA
const maskExpireOptions = {
  mask: "00/00",
  lazy: false, // rendre placeholder toujours visible
  //placeholderChar: '_'
};

function animerCompteur(cible = 9999, tag = "compteur-chiffre", delay = 2000) {
  const compteurChiffre = document.getElementById(tag);
  const tempsAnimation = delay;

  function easeInOutCubic(x) {
    return x < 0.5 ? 4 * x * x * x : 1 - Math.pow(-2 * x + 2, 3) / 2;
  }

  const startTime = performance.now();

  function incrementerCompteur(timestamp) {
    const elapsedTime = timestamp - startTime;
    let progress = Math.min((elapsedTime * 3) / tempsAnimation, 1);
    let easedProgress = easeInOutCubic(Math.abs(progress));
    if (easedProgress <= 0) easedProgress = 0.025;
    const chiffreActuel = Math.floor(easedProgress * cible);

    // Ajout du formatage sur 4 chiffres
    const chiffreFormate = chiffreActuel.toString().padStart(2, "0") + " €";

    compteurChiffre.textContent = chiffreFormate;

    if (progress < 1) {
      requestAnimationFrame(incrementerCompteur);
    } else {
      compteurChiffre.textContent = cible.toString().padStart(2, "0") + " €";
    }
  }

  requestAnimationFrame(incrementerCompteur);
}

function togglePasswordVisibility(elem) {
  let el=elem.parentElement.children[0];
  if (el.type === "password") {
    el.type = "text";
    elem.innerHTML = "<i class='bi bi-eye-slash'></i>";
  } else {
    el.type = "password";
    elem.innerHTML = "<i class='bi bi-eye'></i>";
  }
}
