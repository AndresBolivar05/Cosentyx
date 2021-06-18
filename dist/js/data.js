let final = document.getElementById('fin');

let dayString;


let testOne = document.querySelectorAll('input[type=radio][name=testOne]');
testOne.forEach(testtOne => testtOne.addEventListener('change', testOneValidation));

function testOneValidation(){
    let testOne = document.querySelector("input[name='testOne']:checked");
    let testOneNumber = testOne.value;
    if(testOneNumber == 1){
        sessionStorage.setItem('testOne', 'Malo');
    }else if(testOneNumber == 2){
        sessionStorage.setItem('testOne', 'Bueno');
    }else{
        sessionStorage.setItem('testOne', 'Muy Bueno');
    }
}

let testTwo = document.querySelectorAll('input[type=radio][name=testTwo]');
testTwo.forEach(testtTwo => testtTwo.addEventListener('change', testTwoValidation));

function testTwoValidation(){
    let testTwo = document.querySelector("input[name='testTwo']:checked");
    let testTwoNumber = testTwo.value;
    if(testTwoNumber == 1){
        sessionStorage.setItem('testTwo', 'Malo');
    }else if(testTwoNumber == 2){
        sessionStorage.setItem('testTwo', 'Bueno');
    }else{
        sessionStorage.setItem('testTwo', 'Muy Bueno');
    }
}

let testThree = document.querySelectorAll('input[type=radio][name=testThree]');
testThree.forEach(testtThree => testtThree.addEventListener('change', testThreeValidation));

function testThreeValidation(){
    let testThree = document.querySelector("input[name='testThree']:checked");
    let testThreeNumber = testThree.value;
    if(testThreeNumber == 1){
        sessionStorage.setItem('testThree', 'Malo');
    }else if(testThreeNumber == 2){
        sessionStorage.setItem('testThree', 'Bueno');
    }else{
        sessionStorage.setItem('testThree', 'Muy Bueno');
    }
}

final.addEventListener('click', function () {
    registerFour();
});

function registerOne(){
    let response = sessionStorage.getItem('response');

    let data = new FormData();

    data.append('response', response);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'dist/models/model-quiz.php', true);

    xhr.send(data);
}

function registerTwo(){
    let diagnostic = sessionStorage.getItem('diagnostic');

    let data = new FormData();

    data.append('pathology', JSON.parse(diagnostic).pathology);
    data.append('number_dosis', JSON.parse(diagnostic).numberDosis);
    data.append('applied_dose', JSON.parse(diagnostic).applied_dose);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'dist/models/model-diagnostic.php', true);

    xhr.send(data);
}

function registerThree(){
    let testOne = sessionStorage.getItem('testOne');
    let testTwo = sessionStorage.getItem('testTwo');
    let testThree = sessionStorage.getItem('testThree');

    let data = new FormData();

    data.append('responseOne', testOne);
    data.append('responseTwo', testTwo);
    data.append('responseThree', testThree);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'dist/models/model-qualification.php', true);

    xhr.send(data);
    sessionStorage.clear();
}

function registerFour(){

    // let fecha = new Date();
    // let day = fecha.getUTCDate().toString();
    // let currentMonth = new Intl.DateTimeFormat('es-ES', { month: 'long'}).format(new Date());
    

    // if(day.length === 1){
    //     dayString = '0' + day;
    // }else{
    //     dayString = day;
    // }

    // let fech = dayString + ' de ' + currentMonth;
    const hoy = new Date();
    let day = hoy.getFullYear().toString();
    let month = (hoy.getMonth() + 1).toString();
    if(day.length == 1){
        day = '0' + day; 
    }
    if(month.length == 1){
        month = '0' + month;
    }
    let fech = day + "-" + month + "-" + hoy.getFullYear();
    let data = new FormData();

    // data.append('number_applications', '1');
    data.append('date', fech);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'dist/models/model-applications.php', true);

    xhr.send(data);
    registerOne();
    registerTwo();
    registerThree();
}
