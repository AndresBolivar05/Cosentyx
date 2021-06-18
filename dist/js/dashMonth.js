let applications = document.getElementById('applications');
let applicationsPro = document.getElementById('applicationsPro');
let countApli = document.getElementById('countApli');
let ultiDia;
let ultiMes;
let ultiAño;
let ultiAplicacion;
let pin_user;
let number;
let dateIni = '';
let dateFin = '';

let data = new FormData();

data.append('vc', 'vc');

let xhr = new XMLHttpRequest();
xhr.open('POST', 'dist/models/model-registerMonth.php', true);
xhr.onload = function () {
    if (this.status === 200) {
        var respuesta = JSON.parse(xhr.responseText);
        if (!respuesta == '') {
            let meses = ['', "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            let pin = 0;
            let cuenta_pin = 0;
            for (let i = 1; i < respuesta.numApplications; i++) {
                let date = respuesta[`date${i}`];
                let sep = date.split('-');
                let mes_name = meses[parseInt(sep[1])];
                let mes_namePro = meses[parseInt(sep[1]) + 1];
                ultiDia = sep[2];
                ultiMes = parseInt(sep[1]);
                ultiAño = sep[0];
                applications.innerHTML +=
                `
                    <a href="/v2/user?pin=${respuesta[`pin_user${i}`]}" class="tdHref">
                        <div class="card" style="background-color: #ffffff; border-color: #ab1862 !important; width: 60%; margin: 2% auto .1% auto;">
                            <div class="card-body" style="display: flex;justify-content: space-between;">
                            <p>${respuesta[`pin_user${i}`]}</p>
                            <p>${sep[2] + '-' + mes_name + '-' + sep[0]}</p>
                                <p>Aplicacion # ${respuesta[`number${i}`]}</p>
                            </div>
                        </div> 
                    </a>
                `;
                if (respuesta[`pin_user${i}`] !== pin) {
                    cuenta_pin = 1;
                    pin = respuesta[`pin_user${i}`];
                    applicationsPro.innerHTML +=
                        `
                        <div class="card" style="background-color: #ffffff; border-color: #ab1862; width: 60%; margin: 2% auto .1% auto;">
                            <div class="card-body" style="display: flex;justify-content: space-between;" id="${respuesta[`pin_user${i}`]}">
                                <p>${respuesta[`pin_user${i}`]}</p>
                                <p>${sep[2] + '-' + mes_namePro + '-' + sep[0]}</p>
                                <p>Proxima aplicacion # ${cuenta_pin + 1}</p>
                            </div>
                        </div> 
                    `;
                } else {
                    cuenta_pin = cuenta_pin + 1;
                }
                let pin_us = document.getElementById(pin);
                let pin_concat = '#' + pin;
                $(pin_concat).empty();
                let fecha = new Date();
                let hoy = fecha.getDate();
                let mes = fecha.getMonth();
                let año = fecha.getFullYear();
                let fecha_one = año + '-' + mes + '-' + hoy
                let fecha_two = ultiAño + '-' + parseInt(ultiMes + 1) + '-' + ultiDia
                let fecha_ini = new Date(fecha_one);
                let fecha_pro = new Date(fecha_two);
                let milisegundosDia = 24 * 60 * 60 * 1000;
                let milisegundosTranscurridos = Math.abs(fecha_ini.getTime() - fecha_pro.getTime());
                let diasTranscurridos = Math.round(milisegundosTranscurridos / milisegundosDia);
                if (diasTranscurridos >= 20) {
                    pin_us.parentNode.className = "card colorsOne"
                } else if (diasTranscurridos >= 10) {
                    pin_us.parentNode.className = "card colorsTwo"
                } else {
                    pin_us.parentNode.className = "card colorsThree"
                }
                pin_us.innerHTML +=
                    `
                    <p>${respuesta[`pin_user${i}`]}</p>
                    <p>${sep[2] + '-' + mes_namePro + '-' + sep[0]}</p>
                    <p>Proxima aplicacion # ${cuenta_pin + 1}</p>
                `;
            }
            countApli.innerHTML = 
            `
                <p class="text-center">Total de aplicaciones ${respuesta.numApplications - 1}</p>
            `;
        } else {
            console.log('No hay aplicaciones');
        }
    }
}
xhr.send(data);

function getObjectIni(object) {
    dateIni = object.value;
    // let sep = feIni.split('-');
    // let año = parseInt(sep[0]);
    // let mes = parseInt(sep[1]);
    // let dia = parseInt(sep[2]);
    // dateIni = año + '-' + mes + '-' + dia;
    if (dateFin !== '') {
        consultData();
    }
}

function getObjectFin(object) {
    dateFin = object.value;
    // let sep = feIni.split('-');
    // let año = parseInt(sep[0]);
    // let mes = parseInt(sep[1]);
    // let dia = parseInt(sep[2]);
    // dateFin = año + '-' + mes + '-' + dia;
    console.log(dateIni);
    console.log(dateFin);
    if (dateIni !== '') {
        consultData();
    }
}

function consultData() {
    let data = new FormData();

    data.append('dateIni', dateIni);
    data.append('dateFin', dateFin);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'dist/models/model-registerMonth.php', true);
    xhr.onload = function () {
        if (this.status === 200) {
            var respuesta = JSON.parse(xhr.responseText);
            if (!respuesta == '') {
                $(applications).empty();
                $(applicationsPro).empty();
                $(countApli).empty();
                countApli.innerHTML = 
                `
                    <p class="text-center">Total de aplicaciones ${respuesta.numApplications - 1}</p>
                `;
                let meses = ['', "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                let pin = 0;
                let cuenta_pin = 0;
                for (let i = 1; i < respuesta.numApplications; i++) {
                    let date = respuesta[`date${i}`];
                    let sep = date.split('-');
                    let mes_name = meses[parseInt(sep[1])];
                    let mes_namePro = meses[parseInt(sep[1]) + 1];
                    ultiDia = sep[2];
                    ultiMes = parseInt(sep[1]);
                    ultiAño = sep[0];
                    applications.innerHTML +=
                        `
                    <a href="/v2/user?pin=${respuesta[`pin_user${i}`]}" class="tdHref">    
                        <div class="card" style="background-color: #ffffff; border-color: #ab1862 !important; width: 60%; margin: 2% auto .1% auto;">
                            <div class="card-body" style="display: flex;justify-content: space-between;">
                            <p>${respuesta[`pin_user${i}`]}</p>
                            <p>${sep[2] + '-' + mes_name + '-' + sep[0]}</p>
                                <p>Aplicacion # ${respuesta[`number${i}`]}</p>
                            </div>
                        </div> 
                    </a>    
                `;
                    if (respuesta[`pin_user${i}`] !== pin) {
                        cuenta_pin = 1;
                        pin = respuesta[`pin_user${i}`];
                        applicationsPro.innerHTML +=
                            `
                        <div class="card" style="background-color: #ffffff; border-color: #ab1862; width: 60%; margin: 2% auto .1% auto;">
                            <div class="card-body" style="display: flex;justify-content: space-between;" id="${respuesta[`pin_user${i}`]}">
                                <p>${respuesta[`pin_user${i}`]}</p>
                                <p>${sep[2] + '-' + mes_namePro + '-' + sep[0]}</p>
                                <p>Proxima aplicacion # ${cuenta_pin + 1}</p>
                            </div>
                        </div> 
                    `;
                    } else {
                        cuenta_pin = cuenta_pin + 1;
                    }
                    let pin_us = document.getElementById(pin);
                    let pin_concat = '#' + pin;
                    $(pin_concat).empty();
                    let fecha = new Date();
                    let hoy = fecha.getDate();
                    let mes = fecha.getMonth();
                    let año = fecha.getFullYear();
                    let fecha_one = año + '-' + mes + '-' + hoy
                    let fecha_two = ultiAño + '-' + parseInt(ultiMes + 1) + '-' + ultiDia
                    let fecha_ini = new Date(fecha_one);
                    let fecha_pro = new Date(fecha_two);
                    let milisegundosDia = 24 * 60 * 60 * 1000;
                    let milisegundosTranscurridos = Math.abs(fecha_ini.getTime() - fecha_pro.getTime());
                    let diasTranscurridos = Math.round(milisegundosTranscurridos / milisegundosDia);
                    if (diasTranscurridos >= 20) {
                        pin_us.parentNode.className = "card colorsOne"
                    } else if (diasTranscurridos >= 10) {
                        pin_us.parentNode.className = "card colorsTwo"
                    } else {
                        pin_us.parentNode.className = "card colorsThree"
                    }
                    pin_us.innerHTML +=
                        `
                    <p>${respuesta[`pin_user${i}`]}</p>
                    <p>${sep[2] + '-' + mes_namePro + '-' + sep[0]}</p>
                    <p>Proxima aplicacion # ${cuenta_pin + 1}</p>
                `;
                }

            } else {
                console.log('No hay aplicaciones');
            }
        }
    }
    xhr.send(data);
}