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
        if (selectedCountry == country.name) {
          option.text = `${country.name} +(${country.indicatif}) `;
          option.setAttribute("selected", true);
        } else option.text = `${country.name} +(${country.indicatif})`;
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

function alertVanish() {
  setTimeout(() => {
    const alert = bootstrap.Alert.getOrCreateInstance(
      document.querySelector(".alert")
    );
    if (alert) alert.close();
  }, 3000);
}
