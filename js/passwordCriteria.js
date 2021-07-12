//Gets reference of each criteria
var criteria1 = document.getElementById('criteria1');
var criteria2 = document.getElementById('criteria2');
var criteria3 = document.getElementById('criteria3');
var criteria4 = document.getElementById('criteria4');
var criteria5 = document.getElementById('criteria5');

//Password value
var input = document.getElementById('new_password');

input.onkeyup = function(){
    //If the length of the input is between 8 and 30 characters, toggle the class for criteria1
    if(input.value.length >= 8 && input.value.length <= 30){
        criteria1.classList.remove('criteriaInvalid');
        criteria1.classList.add('criteriaValid');

    }
    else{
        criteria1.classList.remove('criteriaValid');
        criteria1.classList.add('criteriaInvalid');
    }

    //If there is at least one uppercase character, toggle the class for criteria3
    if(input.value.match(/[A-Z]/)){
        criteria2.classList.remove('criteriaInvalid');
        criteria2.classList.add('criteriaValid');
    }
    else{
        criteria2.classList.remove('criteriaValid');
        criteria2.classList.add('criteriaInvalid');
    }

    //If there is at least one lowercase character, toggle the class for criteria3
    if(input.value.match(/[a-z]/)){
        criteria3.classList.remove('criteriaInvalid');
        criteria3.classList.add('criteriaValid');
    }
    else{
        criteria3.classList.remove('criteriaValid');
        criteria3.classList.add('criteriaInvalid');
    }

    //If there is at least one number, toggle the class for criteria2
    if(input.value.match(/[0-9]/)){
        criteria4.classList.remove('criteriaInvalid');
        criteria4.classList.add('criteriaValid');
    }
    else{
        criteria4.classList.remove('criteriaValid');
        criteria4.classList.add('criteriaInvalid');
    }

    //If there is at least one special character, toggle the class for criteria3
    if(input.value.match(/[!@#$%]/)){
        criteria5.classList.remove('criteriaInvalid');
        criteria5.classList.add('criteriaValid');

    }
    else{
        criteria5.classList.remove('criteriaValid');
        criteria5.classList.add('criteriaInvalid');
    } 
}
