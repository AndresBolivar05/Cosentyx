const webcamElement = document.getElementById('webcam');
const canvasElement = document.getElementById('canvas');
// const snapSoundElement = document.getElementById('snapSound');
let webcam = new Webcam(webcamElement, 'environment', canvasElement);
let cameraIOS = true;

// document.querySelector('#photo').src = picture;

var shutter = new Audio();
shutter.autoplay = false;
shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

$('#botonTwo').click(function () {
    if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod'){
        if(cameraIOS === true){
            webcam.stop();
            webcam = new Webcam(webcamElement, 'user', canvasElement);
            webcam.start();
            cameraIOS = false;
        }else{
            webcam.stop();
            webcam = new Webcam(webcamElement, 'environment', canvasElement);
            webcam.start();
            cameraIOS = true;
        }
    }else{
        webcam.flip();
        webcam.start();
    }
});


function take_snapshot() {
    let picture = webcam.snap();
    document.getElementById('results').innerHTML =
        `
    <img id="imageprev" src="${picture}" style="width: 100%;height: 100%;"/>
    `;
    $('#webcam').css('display', 'none');
    $("#botonOne").prop('disabled', true);
    $("#botonTwo").css('display', 'none');
    $('#btnSiguiente').css('pointer-events', 'all');
    $('#btnSiguiente').css('opacity', '8');
    $('#botonreset').css('display', 'flex');

    // play sound effect
    shutter.play();
}

function tomarotra() {
    $('#results').empty();
    $('#botonreset').css('display', 'none');
    $('#webcam').css('display', 'flex');
    $('#botonTwo').css('display', 'flex');
    $("#botonOne").prop('disabled', false);
}

function saveSnap() {
    // Get base64 value from <img id='imageprev'> source
    var base64image = document.getElementById("imageprev").src;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload/upload.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(encodeURIComponent(base64image)); //Codificar y enviar
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            console.log('Save successfully');
        }
    }
}

webcam.start()
    .then(result => {
        console.log("webcam started");
    })
    .catch(err => {
        console.log(err);
    });