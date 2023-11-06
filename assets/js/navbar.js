const anywhere = document.querySelector("#anywhere");
const _cards = document.querySelector("#cards");
const _slides = document.querySelector(".slides");
const _menu_login = document.querySelector(".menu-login");
const _pop_login = document.querySelector(".menu-log");

document.addEventListener("click", (evnt) => {
  let parent = evnt.target.parentElement.parentElement;
  switch (parent) {
    case _menu_login:
      _pop_login.classList.toggle("collapse");
      break;
    default:
      _pop_login.classList.add("collapse");
      break;
  }
  if (evnt.target === _menu_login) {
    _pop_login.classList.toggle("collapse");
  }
});

function CreateCard(card) {
  const _card = document.createElement("div");
  _card.classList.add("card");
  _card.innerHTML = `
        
            <img src="${card.src}"></img>
            <div><div class="ratings"><div>${card.name}</div><div><i class="fa-solid fa-star"></i>&nbsp;${card.ratings}</div></div></div>
            <div><span class="gray">${card.type}</span></div>
            <div><div class="gray">${card.date}<div></div>
            <div><div class="darkgray">${card.price} € <span class="darkgray2">par jour</span><div></div>
        `;
  _cards.append(_card);
}

async function loadCards(file) {
  let response = await fetch(file);
  let cards = await response.json();
  cards.forEach((card) => {
    CreateCard(card);
  });
  if (cards.length === 0) {
    displayVoid();
  }
}

function displayVoid() {
  _cards.innerHTML = `<div class='flex'>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" height="160" width="160" version="1.0">
            <g fill="#4b4b4b">
            <path d="m80 15c-35.88 0-65 29.12-65 65s29.12 65 65 65 65-29.12 65-65-29.12-65-65-65zm0 10c30.36 0 55 24.64 55 55s-24.64 55-55 55-55-24.64-55-55 24.64-55 55-55z"/>
            <path d="m57.373 18.231a9.3834 9.1153 0 1 1 -18.767 0 9.3834 9.1153 0 1 1 18.767 0z" transform="matrix(1.1989 0 0 1.2342 21.214 28.75)"/>
            <path d="m90.665 110.96c-0.069 2.73 1.211 3.5 4.327 3.82l5.008 0.1v5.12h-39.073v-5.12l5.503-0.1c3.291-0.1 4.082-1.38 4.327-3.82v-30.813c0.035-4.879-6.296-4.113-10.757-3.968v-5.074l30.665-1.105"/>
            </g>
            </svg>
        </div>
        <div>Pas de locaux disponibles</div>
        </div>`;
}

function CreateCardSlide(card) {
  const _slide = document.createElement("div");
  _slide.classList.add("slide-card");
  _slide.innerHTML += `<div>${card.icon}</div><div>${card.name}</div>`;
  _slides.appendChild(_slide);
}

async function loadCardsSlide(file) {
  let response = await fetch(file);
  let cards = await response.json();
  cards.forEach((card) => {
    CreateCardSlide(card);
  });
}



