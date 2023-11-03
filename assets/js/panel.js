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


