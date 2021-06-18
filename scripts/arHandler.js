var isOnMarker = false;

AFRAME.registerComponent("markerhandler", {
  init: function () {
    var model = document.querySelector("#model3D");

    this.el.sceneEl.addEventListener("markerFound", () => {
      isOnMarker = true;
      model.setAttribute("animation-mixer", {
        timeScale: 1
      });
      var sonido = document.querySelector("#sound");
      sonido.components.sound.playSound();
      console.log("marcador encontrado...");
    });
    this.el.sceneEl.addEventListener("markerLost", () => {
      isOnMarker = false;
      model.setAttribute("animation-mixer", {
        timeScale: 0
      });
      var sonido = document.querySelector("#sound");
      sonido.components.sound.stopSound();
      console.log("marcador perdido...");
    });
  },
});

let asset = document.querySelector("a-assets");
let loader = document.getElementById("loader");
asset.addEventListener("loaded", loadedHandler);
function loadedHandler() {
  loader.style.display = "none";
}

let model = document.querySelector("#model3D");
let sound = document.querySelector("#sound");
let title = document.getElementById("stepTitle");
let progress = document.getElementById('progress');
let step = 1;
let time = false;
let progressWidth = 26.64;

load();
function load(){
  var url = jQuery(location).attr('href');
  var paso = url.indexOf('?paso=7');
  if(paso > 0) {
    step = 7;
    title.innerHTML = `<h2>Paso ${step}</h2>`;
    progressWidth = 66.6;
    progress.style.width = progressWidth + '%';
  }else{
    title.innerHTML = `<h2>Paso 1</h2>`;
    progress.style.width = progressWidth + '%';
  }
}

function timeOutNextModel() {
  if (!time) {
    setTimeout(function () {
      NextModel();
      time = false;
    }, 500);
    time = true;
  }
}

function timeOutPrevModel() {
  if (!time) {
    setTimeout(function () {
      PrevModel();
      time = false;
    }, 500);
    time = true;
  }
}

function NextModel() {
  if (step > 6) {
    window.location.replace("./fotopage");
  } else {
    step++;
    model.removeAttribute("gltf-model");
    model.setAttribute("gltf-model", `#model${step}`);

    sound.components.sound.stopSound();
    sound.removeAttribute("sound");
    sound.setAttribute("sound", `src: #audio${step}`);
    loader.style.display = "block";
    setTimeout(() => {
      loader.style.display = "none";
    }, 1000);
    if (isOnMarker) {
      sound.components.sound.playSound();
    }

    title.innerHTML = `<h2>Paso ${step}</h2>`;
    $('#animation').removeClass('btnAnimation');
    progressWidth = progressWidth + 6.66;
    progress.style.width = progressWidth + '%';

    analyticsEvent("Pagina1", 200);
  }
}

function PrevModel() {
  if (step < 2) {
    window.location.replace("./welcome");
  } else {
    step--;
    model.removeAttribute("gltf-model");
    model.setAttribute("gltf-model", `#model${step}`);

    sound.components.sound.stopSound();
    sound.removeAttribute("sound");
    sound.setAttribute("sound", `src: #audio${step}`);
    loader.style.display = "block";
    setTimeout(() => {
      loader.style.display = "none";
    }, 1000);
    if (isOnMarker) {
      sound.components.sound.playSound();
    }

    title.innerHTML = `<h2>Paso ${step}</h2>`;
    progressWidth = progressWidth - 6.66;
    progress.style.width = progressWidth + '%';

    analyticsEvent("Pagina1", 200);
  }
}

function analyticsEvent(evento, tiempo) {
  gtag("event", "click", {
    event_category: "pagina",
    event_label: evento,
    value: tiempo,
  });
}

sound.addEventListener('sound-ended', () => {
  $('#animation').addClass('btnAnimation');
});