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

function onPanelAction(action) {
  showInput(action);
  switch (action) {
    case "facebook":
      form_login.action="/facebook/connect";
      form_login.submit();
      break;
    case "google":
      form_login.action="/google/connect";
      form_login.submit();
      break;
    case "init":
  }
}

function showInput(action) {
  switch (action) {
    case "tel":     
      btn_mail.classList = "ms-0 row d-flex btn btn-light w-100 mb-3 py-3";
      btn_phone.classList = "collapse";
      input_mail.classList = "collapse";
      input_tel.classList = "";
      form_login.method_validate.value = "tel";
      form_login.action="/phone/connect";
      break;

    case "mail":
      btn_mail.classList = "collapse";
      btn_phone.classList = "ms-0 row d-flex btn btn-light w-100 mb-3 py-3";
      input_mail.classList = "";
      input_tel.classList = "collapse";
      form_login.method_validate.value = "mail";
      break;
  }
}
