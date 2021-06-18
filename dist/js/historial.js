let ultiDia;
let ultiMes;
let ultiAño;
let ultiAplicacion;
let historial = document.getElementById('historial');
let meses = ['', "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

$(document).ready(function(){
    let data = new FormData();

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'dist/models/model-historial.php', true);
    xhr.onload = function () {
        if (this.status === 200) {
            var respuesta = JSON.parse(xhr.responseText);
            if (respuesta.numApplications > 1) {
                for(i = 1; i < respuesta.numApplications; i++){
                    let dateBD = respuesta[`date${i}`];
                    let sep  = dateBD.split('-');
                    let mes_name = meses[parseInt(sep[1])];
                    ultiDia = sep[2];
                    ultiMes = parseInt(sep[1]) + 1;
                    ultiAño = sep[0];
                    ultiAplicacion = parseInt(respuesta[`number${i}`]) + 1;
                    historial.innerHTML += 
                    `
                        <div class="divhistorial">
                            <table class="table table-sm" style="margin-bottom:0">
                                <tbody>
                                  <tr>
                                    <td><img src="./assets/logos/yeslogo.png" alt="" style="width:15px;height:auto">${respuesta[`status${i}`]}</td>
                                    <td>${sep[2] + ' de ' + mes_name + ' ' + sep[0]}</td>
                                  </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm" style="margin-bottom:0">
                                <tr>
                                    <td style="background-color:#3c2052!important;color:#fff">${respuesta[`status${i}`]}</td>
                                </tr>
                            </table>
                        </div> 
                    `;
                }
                historial.innerHTML += 
                `
                <div class="divhistorial">
                <table class="table table-sm" style="margin-bottom:0">
                  <tbody>
                    <tr>
                      <td><img src="./assets/logos/warning.png" alt="" style="width:15px;height:auto">Por aplicar</td>
                      <td>${ultiDia + ' ' + meses[ultiMes] + ' ' + ultiAño}</td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-sm" style="margin-bottom:0">
                  <tr>
                    <td style="background-color: #d8b423!important;color: #212529;">Por aplicar</td>
                  </tr>
                </table>
              </div>

                `;
            } else {
                let hoy = new Date();
                let date = hoy.getDate() + " de " + (meses[hoy.getMonth() + 1]) + " " + hoy.getFullYear();
                historial.innerHTML = 
                `
                <div class="divhistorial">
                <table class="table table-sm" style="margin-bottom:0">
                  <tbody>
                    <tr>
                      <td><img src="./assets/logos/warning.png" alt="" style="width:15px;height:auto">Por aplicar</td>
                      <td>${date}</td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-sm" style="margin-bottom:0">
                  <tr>
                    <td style="background-color: #d8b423!important;color: #212529;">Por aplicar</td>
                  </tr>
                </table>
              </div>

                `;
            }
        }
    }
    xhr.send(data);
});