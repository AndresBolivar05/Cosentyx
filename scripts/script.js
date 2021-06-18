let numberCam = [];
let numberCamTwo = 0;

let botonTwo = document.querySelector('#botonTwo');

const tieneSoporteUserMedia = () =>
    !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
const _getUserMedia = (...arguments) =>
    (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);

// Declaramos elementos del DOM
const $video = document.querySelector("#video"),
    $canvas = document.querySelector("#canvas"),
    // $estado = document.querySelector("#estado"),
    $boton = document.querySelector("#boton"),
    $listaDeDispositivos = document.querySelector("#listaDeDispositivos");


// preload shutter audio clip
var shutter = new Audio();
shutter.autoplay = false;
shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';    
// const limpiarSelect = () => {
//     for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--)
//         $listaDeDispositivos.remove(x);
// };
const obtenerDispositivos = () => navigator
    .mediaDevices
    .enumerateDevices();

// La función que es llamada después de que ya se dieron los permisos
// Lo que hace es llenar el select con los dispositivos obtenidos
const llenarSelectConDispositivosDisponibles = () => {

    // limpiarSelect();
    obtenerDispositivos()
        .then(dispositivos => {
            const dispositivosDeVideo = [];
            dispositivos.forEach(dispositivo => {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            // if (dispositivosDeVideo.length > 0) {
            //     // Llenar el select
            //     let number = 0;
            //     dispositivosDeVideo.forEach(dispositivo => {
            //         number++;
            //         const option = document.createElement('option');
            //         option.value = dispositivo.deviceId;
            //         option.text = number;
            //         $listaDeDispositivos.appendChild(option);
            //     });
            // }
        });
}

(function() {
    // Comenzamos viendo si tiene soporte, si no, nos detenemos
    if (!tieneSoporteUserMedia()) {
        alert("Lo siento. Tu navegador no soporta esta característica");
        $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
        return;
    }
    //Aquí guardaremos el stream globalmente
    let stream;


    // Comenzamos pidiendo los dispositivos
    obtenerDispositivos()
        .then(dispositivos => {
            // Vamos a filtrarlos y guardar aquí los de vídeo
            const dispositivosDeVideo = [];

            // Recorrer y filtrar
            dispositivos.forEach(function(dispositivo) {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                    numberCam.push(dispositivo);
                }
            });
            console.log(dispositivosDeVideo.length);

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            // y le pasamos el id de dispositivo
            if (dispositivosDeVideo.length === 1) {
                // Mostrar stream con el ID del primer dispositivo, luego el usuario puede cambiar
                mostrarStream(dispositivosDeVideo[0].deviceId);
                // botonTwo.style.display = 'none';
                botonTwo.innerHTML = dispositivosDeVideo.length;
                numberCamTwo = 0;
            }else if(dispositivosDeVideo.length === 1){
                mostrarStream(dispositivosDeVideo[0].deviceId);
                botonTwo.style.display = 'block';
                botonTwo.innerHTML = dispositivosDeVideo.length;
                numberCamTwo = 1;
            }
        });



    const mostrarStream = idDeDispositivo => {
        _getUserMedia({
                video: {
                    // Justo aquí indicamos cuál dispositivo usar
                    deviceId: idDeDispositivo,
                }
            },
            (streamObtenido) => {
                // Aquí ya tenemos permisos, ahora sí llenamos el select,
                // pues si no, no nos daría el nombre de los dispositivos
                llenarSelectConDispositivosDisponibles();

                
                // Escuchar cuando seleccionen otra opción y entonces llamar a esta función
                botonTwo.onClick = () => {
                    // Detener el stream
                    alert('Si funciona');
                    if (stream) {
                        stream.getTracks().forEach(function(track) {
                            track.stop();
                        });
                    }
                    // Mostrar el nuevo stream con el dispositivo seleccionado
                    if(numberCamTwo === 1){
                        mostrarStream(numberCam[0].deviceId);
                    }else if(numberCamTwo === 0){
                        mostrarStream(numberCam[1].deviceId);
                    }

                }

                // Simple asignación
                stream = streamObtenido;

                // Mandamos el stream de la cámara al elemento de vídeo
                $video.srcObject = stream;
                $video.play();

                //Escuchar el click del botón para tomar la foto
                //Escuchar el click del botón para tomar la foto
                $boton.addEventListener("click", function() {
                    $('#listaDeDispositivos').css('display', 'none');
                    //Pausar reproducción
                    // play sound effect
                    shutter.play();
                    $video.pause();

                    //Obtener contexto del canvas y dibujar sobre él
                    let contexto = $canvas.getContext("2d");
                    $canvas.width = $video.videoWidth;
                    $canvas.height = $video.videoHeight;
                    contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);

                    let element = document.querySelector('#results');

                    let foto = $canvas.toDataURL(); //Esta es la foto, en base 64
                    fetch("./cc/guardar_foto.php", {
                            method: "POST",
                            body: encodeURIComponent(foto),
                            headers: {
                                "Content-type": "application/x-www-form-urlencoded",
                            }
                        })
                        .then(resultado => {
                            // A los datos los decodificamos como texto plano
                            return resultado.text()
                        })
                        .then(nombreDeLaFoto => {
                            element.innerHTML =
                            `
                            <img src="./cc/${nombreDeLaFoto}" alt="" style="width: 80%;margin: 0 auto">
                           `;
                            $('#video').css('display', 'none');
                            $('#botonreset').css('display', 'block');
                            $('#boton').css('margin-left', '25%');
                            $('#parrafo').css('margin-top', '20%');
                        });

                    //Reanudar reproducción
                    $video.play();
                });
            }, (error) => {
                console.log("Permiso denegado o error: ", error);
                $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
            });
    }
})();

document.querySelector('#botonreset').addEventListener('click', function(){
    $('#results').empty();
    $('#video').css('display', 'block');
    $('#parrafo').css('margin-top', '-2.5%');
    $('#botonreset').css('display', 'none');
    $('#listaDeDispositivos').css('display', 'block');
    $('#boton').css('margin-left', '22%');
});