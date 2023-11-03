const anywhere = document.querySelector("#anywhere");
const _cards = document.querySelector("#cards");
const _slides = document.querySelector(".slides");
const _global = document.querySelector("#global");

let cards = [
    {
    name: "Arles",
    type: "Particulier",
    src: "img1.jpeg",
    "ratings": 7.5,
    "date": "2-15 avr",
    "price": 749
    },
    {
    name: "Arles",
    type: "Professionnel",
    src: "img2.jpeg",
    "ratings": 7.9,
    "date": "12-15 avr",
    "price": 629
    },
    {
    name: "Salon de provence",
    type: "Particulier",
    src: "img3.jpeg",
    "ratings": 5.5,
    "date": "20-25 avr",
    "price": 529
    },
    {
    name: "Marseille",
    type: "Particulier",
    src: "img4.jpeg",
    "ratings": 6.5,
    "date": "5-25 avr",
    "price": 649
    }, {
    name: "Marseille",
    type: "Professionnel",
    src: "img7.jpeg",
    "ratings": 8.5,
    "date": "8-19 avr",
    "price": 249
    }, {
    name: "Salon de provence",
    type: "Professionnel",
    src: "img5.jpeg",
    "ratings": 6.4,
    "date": "12-19 avr",
    "price": 449
    }, {
    name: "Salon de provence",
    type: "Professionnel",
    src: "img5.jpeg",
    "ratings": 6.8,
    "date": "22-29 avr",
    "price": 419
    }, {
    name: "Salon de provence",
    type: "Professionnel",
    src: "img7.jpeg",
    "ratings": 6.4,
    "date": "12-19 mai",
    "price": 549
    }, {
    name: "Salon de provence",
    type: "Professionnel",
    src: "img9.jpeg",
    "ratings": 5.4,
    "date": "22-29 juin",
    "price": 1549
    }, {
    name: "Salon de provence",
    type: "Professionnel",
    src: "img10.jpeg",
    "ratings": 9.4,
    "date": "12-19 juil",
    "price": 526
    }, {
    name: "Salon de provence",
    type: "Professionnel",
    src: "img11.jpeg",
    "ratings": 8.4,
    "date": "12-19 août",
    "price": 629
    }, {
    name: "Salon de provence",
    type: "Professionnel",
    src: "img12.jpeg",
    "ratings": 6.4,
    "date": "12-19 oct",
    "price": 539
    },
    ];
    

let slides = [
  {
    name: "entrepôt",
    icon: '<i class="fa-solid fa-warehouse"></i>',
  },
  {
    name: "cave",
    icon: '<i class="fa-solid fa-wine-bottle"></i>',
  },
  {
    name: "maison",
    icon: '<i class="fa-solid fa-people-roof"></i>',
  },
  {
    name: "usine",
    icon: '<i class="fa-solid fa-city"></i>',
  },
  {
    name: "local",
    icon: '<i class="fa-solid fa-paint-roller"></i>',
  },
  {
    name: "magasin",
    icon: '<i class="fa-solid fa-shop"></i>',
  },
  {
    name: "lieu",
    icon: '<i class="fa-solid fa-landmark"></i>',
  },
  {
    name: "lieu insolite",
    icon: '<i class="fa-solid fa-igloo"></i>',
  },
];

function CreateCard(card) {
  const _card = document.createElement("div");
  _card.innerHTML = `
            <div class="card">
                <img src="/build/images/${card.src}" class="top-rounded" />
                <div class="mt-1 px-1"><div class="ratings"><div>${card.name}</div><div><i class="fa-solid fa-star"></i>&nbsp;${card.ratings}</div></div></div>
                <div class="px-1"><span class="gray">${card.type}</span></div>
                <div class="px-1"><div class="gray">${card.date}<div></div>
                <div ><div class="darkgray">${card.price} € <span class="darkgray2">par jour</span><div></div>
            </div>`;
  _cards.append(_card);
}


function CreateCardSlide(card) {
  const _slide = document.createElement("div");
  _slide.classList.add("slide-card");
  _slide.innerHTML += `<div>${card.icon}</div><div>${card.name}</div>`;
  _slides.appendChild(_slide);
}

