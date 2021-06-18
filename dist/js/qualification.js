
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