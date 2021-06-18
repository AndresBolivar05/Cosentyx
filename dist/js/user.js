let applications = document.getElementById('applications');
let params = new URLSearchParams(location.search);
let pin_user = params.get('pin');
let click = 1;
let ultiDia;
let ultiMes;
let ultiAño;
let ultiAplicacion;

if(pin_user === ''){
    console.log('Vacio');
}else{
    let data = new FormData();

    data.append('pin_user', pin_user);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'dist/models/model-pin.php', true);
    xhr.onload = function () {
        if (this.status === 200) {
            var respuesta = JSON.parse(xhr.responseText);
            //  si la respuesta es correcta
            if (respuesta.numApplications > 0) {
                let meses = ['', "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                let i = 1;
                for(let i = 1; i < respuesta.numApplications; i++){
                    let date = respuesta[`date${i}`];
                    let sep  = date.split('-');
                    let mes_name = meses[parseInt(sep[1])];
                    ultiDia = sep[2];
                    ultiMes = parseInt(sep[1]) + 1;
                    ultiAño = sep[0];
                    ultiAplicacion = parseInt(respuesta[`number${i}`]) + 1;
                    applications.innerHTML += 
                    `
                    <div class="col-lg-12">
                        <a onclick="cargar(${i})" data-toggle="collapse" href="#collapseExample${`number${i}`}" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none; color:#000000;">
                            <div class="card" style="background-color: #ffffff; border-color: #ab1862 !important; width: 60%; margin: 2% auto .1% auto; cursor: pointer;">
                                <div class="card-body" style="display: flex;justify-content: space-between;">
                                    <p>${sep[2] + '-' + mes_name + '-' + sep[0]}</p>
                                    <p>Aplicacion # ${respuesta[`number${i}`]}</p>
                                </div>
                            </div>
                        </a>
                        <div class="collapse" id="collapseExample${`number${i}`}" style="width: 60%; margin: 1% auto 0 auto;">
                            <div class="card card-body" id="dataApplication${`number${i}`}" style="border-color: #ab1862;"></div>
                        </div>
                    </div>  
                    `;
                }
                if(i == 1){
                    console.log('No hay registros');
                }else{
                    applications.innerHTML += 
                    `
                    <div class="col-lg-12" disabled>
                        <div class="card" style="background-color: #e6e6e6; border-color: #ab1862 !important; opacity: 4; width: 60%; margin: 2% auto .1% auto;">
                            <div class="card-body" style="display: flex;justify-content: space-between;">
                                <p>${ultiDia + '-' + meses[parseInt(ultiMes)] + '-' + ultiAño}</p>
                                <p>Proxima aplicacion # ${ultiAplicacion}</p>
                            </div>
                        </div>
                    </div>  
                    `;
                }

            } else {
                console.log('Pin no existe');
            }
        }
    }
    xhr.send(data);
}

function cargar(dataId){
    if(click === 1){
        let number = dataId;
        let container = 'dataApplicationnumber' + number; 
        let data = new FormData();

        data.append('number', number);
        data.append('pin', pin_user);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'dist/models/model-data.php', true);
        xhr.onload = function () {
            if (this.status === 200) {
                var respuesta = JSON.parse(xhr.responseText);
                //  si la respuesta es correcta
                if (respuesta.status === '0') {
                    console.log('datos no encontados');
                } else {
                    document.getElementById(container).innerHTML = `
                        <div class="text-center" style="margin: 0 auto;">
                            <img src="/v2/upload/${respuesta.name_photo}">
                            <div class="mt-3">
                                <p>Encuesta: ${respuesta.response}</p>
                                <p>Patologia: ${respuesta.pathology}</p>
                                <p>Dosis aplicada: ${respuesta.applied_dose}</p>
                                <p>¿Cómo califica esta herramienta según su experiencia?: ${respuesta.responseTwo}</p>
                                <p>¿Esto facilitó la aplicación de su producto?: ${respuesta.responseOne}</p>
                                <p>¿Utilizaria nuevamente esta herramienta para la aplicacion de Cosentyx?: ${respuesta.responseThree}</p>
                            </div>
                        </div>
                    `;
                }
            }
        }
        xhr.send(data);
        click = 2;
    }else{
        $('#dataApplication').empty();
        click = 1;
    }
}