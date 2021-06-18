let form = document.getElementById("form-id");
let qOne =   document.querySelector("[name='qOne']");
let qTwo =   document.querySelector("[name='qTwo']");
let qthree =   document.querySelector("[name='qThree']");
let qFour =   document.querySelector("[name='qFour']");
let button =  document.getElementById("your-id");
let radioOne = 0; 
let radioTwo = 0; 
let radioThree = 0; 
let radioFour = 0; 

var radiosOne = document.querySelectorAll('input[type=radio][name=q1]');
radiosOne.forEach(radioOne => radioOne.addEventListener('change', validarOne));

function validarOne(){
    let pregOne = document.querySelector("input[name='q1']:checked");
    if(pregOne.value != 0){
        radioOne = 1
    }else {
      if(pregOne.value != 1){
        radioOne = 2;
      }
    }

    if(radioOne === 2 || radioTwo === 2 || radioThree === 2 || radioFour === 2){
      document.getElementById("form-id").setAttribute("action", "finalno"); 
      document.getElementById("form-id").setAttribute( "method" , "post"); 
    }else if(radioOne === 0 || radioTwo === 0 || radioThree === 0 || radioFour === 0){
      document.getElementById("your-id").disabled = true;
    }else {
      document.getElementById("form-id").setAttribute("action", "diagnostico"); 
      document.getElementById("form-id").setAttribute( "method" , "post"); 
    }

    if(radioOne > 0 && radioTwo > 0 && radioThree > 0 && radioFour > 0){
      document.getElementById("your-id").disabled = false;
    }
}    

var radiosTwo = document.querySelectorAll('input[type=radio][name=q2]');
radiosTwo.forEach(radioTwo => radioTwo.addEventListener('change', validarTwo));

function validarTwo(){
    let pregTwo = document.querySelector("input[name='q2']:checked");
    if(pregTwo.value != 0){
        radioTwo = 1
    }else {
      if(pregTwo.value != 1){
        radioTwo = 2;
      }
    }

    if(radioOne === 2 || radioTwo === 2 || radioThree === 2 || radioFour === 2){
      document.getElementById("form-id").setAttribute("action", "finalno"); 
      document.getElementById("form-id").setAttribute( "method" , "post"); 
    }else if(radioOne === 0 || radioTwo === 0 || radioThree === 0 || radioFour === 0){
      document.getElementById("your-id").disabled = true;
    }else {
      document.getElementById("form-id").setAttribute("action", "diagnostico"); 
      document.getElementById("form-id").setAttribute( "method" , "post"); 
    }

    if(radioOne > 0 && radioTwo > 0 && radioThree > 0 && radioFour > 0){
      document.getElementById("your-id").disabled = false;
    }
}

var radiosThree = document.querySelectorAll('input[type=radio][name=q3]');
radiosThree.forEach(radioThree => radioThree.addEventListener('change', validarThree));

function validarThree(){
    let pregThree = document.querySelector("input[name='q3']:checked");
    if(pregThree.value != 0){
        radioThree  = 1
    }else {
      if(pregThree.value != 1){
        radioThree  = 2;
      }
    }

    if(radioOne === 2 || radioTwo === 2 || radioThree === 2 || radioFour === 2){
      document.getElementById("form-id").setAttribute("action", "finalno"); 
      document.getElementById("form-id").setAttribute( "method" , "post"); 
    }else if(radioOne === 0 || radioTwo === 0 || radioThree === 0 || radioFour === 0){
      document.getElementById("your-id").disabled = true;
    }else {
      document.getElementById("form-id").setAttribute("action", "diagnostico"); 
      document.getElementById("form-id").setAttribute( "method" , "post"); 
    }

    if(radioOne > 0 && radioTwo > 0 && radioThree > 0 && radioFour > 0){
      document.getElementById("your-id").disabled = false;
    }
}

var radiosFour = document.querySelectorAll('input[type=radio][name=q4]');
radiosFour.forEach(radioFour => radioFour.addEventListener('change', validarFour));

function validarFour(){
  let pregFour = document.querySelector("input[name='q4']:checked");
  if(pregFour.value != 0){
      radioFour = 1
      console.log(radioFour);
  }else {
    if(pregFour.value != 1){
      radioFour = 2;
      console.log(radioFour);
    }
  }

  
  if(radioOne === 2 || radioTwo === 2 || radioThree === 2 || radioFour === 2){
    document.getElementById("form-id").setAttribute("action", "finalno"); 
    document.getElementById("form-id").setAttribute( "method" , "post"); 
  }else if(radioOne === 0 || radioTwo === 0 || radioThree === 0 || radioFour === 0){
    document.getElementById("your-id").disabled = true;
  }else {
    document.getElementById("form-id").setAttribute("action", "diagnostico"); 
    document.getElementById("form-id").setAttribute( "method" , "post"); 
  }

  if(radioOne > 0 && radioTwo > 0 && radioThree > 0 && radioFour > 0){
    document.getElementById("your-id").disabled = false;
  }
}


document.getElementById("your-id").addEventListener("click", function () {
  sessionStorage.setItem('response', 'Ningun sintoma presentado');
  form.submit();
});
