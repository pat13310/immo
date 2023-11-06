class LeafLet {
  constructor(div="map") {
    this.root = document.getElementById(div);
    this.zoom = 3;
    this.map = null;
    this.position = [51.505, -0.09];
    this.maxZoom = 19;
  }

  setPosition(position) {
    this.position = position;
  }

  setZoom(zoom) {
    this.zoom = zoom;
  }

  load() {
    this.map = L.map(this.root).setView(this.position, this.zoom);
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: this.maxZoom,
      attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(this.map);
  }

  async loadMarkers(file) {
    let response = await fetch(file);
    let markers = await response.json();
    markers.forEach((element) => {
      this.newMarker(element);
    });
  }

  newMarker(el, className="my-labels") {
    var stepIcon = L.icon({
        iconUrl: './img/poi.png', // the background image you want
        iconSize: [40, 40], // size of the icon
    });
    let marker = new L.marker(el.pos, { icon: stepIcon });
    marker.bindTooltip(el.text, {
      permanent: true,
      direction: "center",
      className: className,
    });
    marker.addTo(this.map);
  }

  orginMarker(text = "origine", className) {
    let elem = { pos: this.position, text: text };
    this.newMarker(elem, className);
  }
}
