let video = document.getElementById("video");
let img = document.getElementById("photo");
let captured = document.getElementsByClassName("captured");
let botonTwo = document.querySelector('#botonTwo');
let number = 0;
$('#btnSiguiente').css('opacity', '.5');

navigator.mediaDevices.getUserMedia({
    video: true
  })
  .then(stream => {
    let mediaStreamTrack = stream.getVideoTracks()[0];
    imageCapture = new ImageCapture(mediaStreamTrack);
  });

function snap() {
  return imageCapture.takePhoto()
    .then(blob => {
      const imageUrl = URL.createObjectURL(blob);
      img.src = imageUrl;
      return blob;
    });
}

const obtenerDispositivos = () => navigator
  .mediaDevices
  .enumerateDevices();


// Configure a few settings and attach camera
function configure() {

  var camara = document.getElementById("my_camera");
  camara.classList.toggle("displayhide");
    
  Webcam.set({
    width: 340,
    height: 260,
    image_format: "jpeg",
    jpeg_quality: 90,
    force_flash: false,
    flip_horiz: true,
    fps: 45
  });
  Webcam.set('constraints', {
    facingMode: "environment"
  });
  Webcam.attach('#my_camera');
  Webcam.on('error', function (err) {
    alert(err);
  });
  // botonTwo.innerHTML = 'icon';
}

botonTwo.addEventListener('click', function () {
  $("#my_camera").empty();
 
  if (number === 0) {
    number = 1;
    Webcam.on('error', function (err) {
      console.log(err);
    });
    Webcam.set({
      width: 340,
      height: 260,
      image_format: "jpeg",
      jpeg_quality: 90,
      force_flash: false,
      flip_horiz: true,
      fps: 45
    });
    Webcam.set('constraints', {
      facingMode: "user"
    });
    Webcam.attach('#my_camera');
    // botonTwo.innerHTML = '1';
  } else {
    number = 0;
    Webcam.on('error', function (err) {
      console.log(err);
    });
    Webcam.set({
      width: 340,
      height: 260,
      image_format: "jpeg",
      jpeg_quality: 90,
      force_flash: false,
      flip_horiz: true,
      fps: 45
    });
    Webcam.set('constraints', {
      facingMode: "environment"
    });
    Webcam.attach('#my_camera');
    // botonTwo.innerHTML = '2';
  }
});

function tomarotra() {
  $("#botonOne").prop('disabled', false);
  $("#botonTwo").css('display', 'block');
  $('#btnSiguiente').css('pointer-events', 'none');
  $('#btnSiguiente').css('opacity', '.5');
  var elementMycamera = document.getElementById("my_camera");
  elementMycamera.classList.toggle("displayhide");

  var elementResult = document.getElementById("results");
  elementResult.classList.toggle("displayhide");

  var elementReset = document.getElementById("botonreset");
  elementReset.classList.toggle("displayhide");

  Webcam.set({
    width: 340,
    height: 260,
    image_format: 'jpeg',
    jpeg_quality: 90,
    facingMode: "environment",
    force_flash: false,
    flip_horiz: true,
    fps: 45
  });
  Webcam.attach('#my_camera');
}


// A button for taking snaps


// preload shutter audio clip
var shutter = new Audio();
shutter.autoplay = false;
shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

function take_snapshot() {

  $("#botonOne").prop('disabled', true);
  $("#botonTwo").css('display', 'none');
  $('#btnSiguiente').css('pointer-events', 'all');
  $('#btnSiguiente').css('opacity', '8');

  var elementReset = document.getElementById("botonreset");
  elementReset.classList.toggle("displayhide");

  var elementResult = document.getElementById("results");
  elementResult.classList.toggle("displayhide");


  var elementMycamera = document.getElementById("my_camera");
  elementMycamera.classList.toggle("displayhide");

  // play sound effect
  shutter.play();

  // take snapshot and get image data
  Webcam.snap(function (data_uri) {
    // display results in page
    document.getElementById('results').innerHTML =
      '<img id="imageprev" src="' + data_uri + '" style=" width: 200px;height: 260px;"/>';
  });

  Webcam.reset();
}

function saveSnap() {
  // Get base64 value from <img id='imageprev'> source
  var base64image = document.getElementById("imageprev").src;
  
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'upload/upload.php', true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(encodeURIComponent(base64image)); //Codificar y enviar
  xhr.onreadystatechange = function() {
    if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
      console.log('Save successfully');
    }
  }
}