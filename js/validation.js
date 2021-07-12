function validateSearchForm(){
    var searchForm = document.forms['searchForm']['search'].value;

    if(searchForm.replace(/\s+/g, '').length == 0){
        alert('Invalid input! Please try again!');
        return false;
    }
}

function validateLogin(){
    var loginEmail = document.forms['loginForm']['log_email'].value;
    var loginPassword = document.forms['loginForm']['log-password'].value;

    if(loginEmail.replace(/\s+/g, '').length == 0 || loginPassword.replace(/\s+/g, '').length == 0)
    {
        alert('Please fill in all fields!');
        return false;
    }
}

function validateNameChange(){
    var changeFirstName = document.forms['changeNameForm']['new_fName'].value;
    var changeLastName = document.forms['changeNameForm']['new_lName'].value;

    if(changeFirstName.replace(/\s+/g, '').length == 0 || changeLastName.replace(/\s+/g, '').length == 0){
        alert('Please fill in all fields!');
        return false;
    }
    else if(!changeFirstName.match(/^[a-zA-Z]$/)){
        alert('Please enter first name in the correct format:\n-Alphabetical letters only\n-No numbers\n-No special characters');
        return false;
    }
    else if(!changeLastName.match(/^[a-zA-Z]$/)){
        alert('Please enter last name in the correct format:\n-Alphabetical letters only\n-No numbers\n-No special characters');
        return false;
    }
}

function validateEmail(){
    var changeEmail = document.forms['changeEmailForm']['new_email'].value;

    if(changeEmail.replace(/\s+/g, '').length == 0){
        alert('Please enter your email!');
        return false;
    }
    else if(!changeEmail.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
        alert('Invalid email address! Please try again!');
        return false;
    }
}

function validatePassword(){
    var changeCurrentPassword = document.forms['changePasswordForm']['current_password'].value;
    var newPassword = document.forms['changePasswordForm']['new_password'].value;
    var verifyNewPassword = document.forms['changePasswordForm']['verifyPass'].value;

    if(changeCurrentPassword.replace(/\s+/g, '').length == 0 || newPassword.replace(/\s+/g, '').length == 0 || verifyNewPassword.replace(/\s+/g, '').length == 0){
        alert('Please fill in all fields!');
        return false;
    }
    else if(!newPassword.match(/^(?=.*\d)(?=.*[!@#$%])(?=.*[a-zA-Z])[0-9A-Za-z!@#$%]{8,30}$/)){
        alert('Please enter new password in the correct format:\n-Minimum of 8 characters, max of 30 characters\n-At least one uppercase character\n-At least one lowercase character\n-At least one number\n-At least one special character');
    }
    else if(newPassword != verifyNewPassword){
        alert('The passwords do not match! Please try again!');
        return false;
    }
    else if(newPassword == verifyNewPassword){
        if(changeCurrentPassword == newPassword){
            alert('Your new password cannot be the same as the current password!');
            return false;
        }
    }
}

function validateShipping(){
    var firstName = document.forms['InfoForm']['ship_firstName'].value;
    var lastName = document.forms['InfoForm']['ship_lastName'].value;
    var shipAddress = document.forms['InfoForm']['ship_Address'].value;
    var shipAddress2 = document.forms['InfoForm']['ship_Address2'].value;
    var shipCity = document.forms['InfoForm']['ship_city'].value;
    var shipState = document.forms['InfoForm']['ship_state'].value;
    var shipZip = document.forms['InfoForm']['ship_zip'].value;
    var shipCountry = document.forms['InfoForm']['ship_country'].value;
    var billAddress = document.forms['InfoForm']['bill_Address'].value;
    var billAddress2 = document.forms['InfoForm']['bill_Address2'].value;
    var billCity = document.forms['InfoForm']['bill_city'].value;
    var billState = document.forms['InfoForm']['bill_state'].value;
    var billZip = document.forms['InfoForm']['bill_zip'].value;
    var billCountry = document.forms['InfoForm']['bill_country'].value;

    if(firstName.replace(/\s+/g, '').length == 0 || lastName.replace(/\s+/g, '').length == 0 ||
    shipAddress.replace(/\s+/g, '').length == 0 || shipAddress2.replace(/\s+/g, '').length == 0 ||
    shipCity.replace(/\s+/g, '').length == 0 || shipZip.replace(/\s+/g, '').length == 0 ||
    billAddress.replace(/\s+/g, '').length == 0 || billAddress2.replace(/\s+/g, '').length == 0 ||
    billCity.replace(/\s+/g, '').length == 0 || billZip.replace(/\s+/g, '').length == 0){
        alert('Please fill in all fields!');
        return false;
    }
    else if(shipState == 'N/A' || shipCountry == 'N/A' || billState == 'N/A' || billCountry == 'N/A'){
        alert('Please make a valid selection!');
        return false;
    }
    else if(!firstName.match(/^[a-zA-Z]*$/)){
        alert('Please enter your first name in the correct format!');
        return false;
    }
    else if(!lastName.match(/^[a-zA-Z]*$/)){
        alert('Please enter your last name in the correct format!');
        return false;
    }
    else if(!shipAddress.match(/^[a-zA-Z0-9 ]*$/)){
        alert('Please enter a valid address!');
        return false;
    }
    else if(!billAddress.match(/^[a-zA-Z0-9 ]*$/)){
        alert('Please enter a valid address!');
        return false;
    }
    else if(!shipCity.match(/^[a-zA-Z]*$/) || !billCity.match(/^[a-zA-Z]*$/)){
        alert('Please enter a valid city!');
        return false;
    }
    else if(!shipZip.match(/^[0-9]{5}$/) || !billZip.match(/^[0-9]{5}$/)){
        alert('Please enter a valid zip code!');
        return false;
    }
}

function validateCardInfo(){
    var cardholderName = document.forms['paymentForm']['cardholderName'].value;
    var cardNumber = document.forms['paymentForm']['cardNumber'].value;
    var expMonth = document.forms['paymentForm']['month'].value;
    var expYear = document.forms['paymentForm']['year'].value;
    var cvc = document.forms['paymentForm']['cvc'].value;

    if(cardholderName.replace(/\s+/g, '').length == 0 || cardNumber.replace(/\s+/g, '').length == 0 || cvc.replace(/\s+/g, '').length == 0){
        alert('Please fill in all fields');
        return false;
    }
    else if(expMonth == '0'){
        alert('Please select the card\'s expiration month!');
        return false;
    }
    else if(expYear == '0'){
        alert('Please select the card\'s expiration year!');
        return false;
    }
    else if(creditCardValidate() == ''){
        alert('Please select a payment method!');
        return false;
    }
    else if(!cardholderName.match(/^[a-zA-Z ]*$/)){
        alert('Please enter the card holder\'s name in the correct format!');
        return false;
    }
    else if(creditCardValidate() == 'Visa'){
        if(!cardNumber.match(/^4[0-9]{12}(?=[0-9]{3})?$/)){
            alert('Please enter the Visa credit card number in the correct format!');
            return false;
        }
    }
    else if(creditCardValidate() == 'Mastercard'){
        if(!cardNumber.match(/^5[1-5][0-9]{14}$/)){
            alert('Please enter the Mastercard credit card number in the correct format!');
            return false;
        }
    }
    else if(creditCardValidate() == 'Discover'){
        if(!cardNumber.match(/^6(?=011|5[0-9]{2})[0-9]{12}$/)){
            alert('Please enter the Discover credit card number in the correct format!');
            return false;
        }
    }

    function creditCardValidate(){
        var creditCard = document.getElementsByName('payment-card');
        var selectedCard;
        for(var i = 0; i < creditCard.length; i++){
            if(creditCard[0].checked == true){
                selectedCard = 'Visa';
                return selectedCard;
            }
            else if(creditCard[1].checked == true){
                selectedCard = 'Mastercard';
                return selectedCard;
            }
            else if(creditCard[2].checked == true)
            {
                selectedCard = 'Discover';
                return selectedCard;
            }
            else{
                selectedCard = '';
                return selectedCard;
            }
        }
    }
}

function validateRegistration(){
    var firstName = document.forms['registrationForm']['reg_firstName'].value;
    var lastName = document.forms['registrationForm']['reg_lastName'].value;
    var email = document.forms['registrationForm']['reg_email'].value;
    var newPassword = document.forms['registrationForm']['new_password'].value;
    var verifyPass = document.forms['registrationForm']['verifyPass'].value;

    if(firstName.replace(/\s+/g, '').length == 0 || lastName.replace(/\s+/g, '').length == 0 || email.replace(/\s+/g, '').length == 0 ||
    newPassword.replace(/\s+/g, '').length == 0 || verifyPass.replace(/\s+/g, '').length == 0){
        alert('Please fill in all fields');
        return false;
    }
    else if(!firstName.match(/^[a-zA-Z ]*$/)){
        alert('Please enter your first name in the correct format!');
        return false;
    }
    else if(!lastName.match(/^[a-zA-Z ]*$/)){
        alert('Please enter your last name in the correct format!');
        return false;
    }
    else if(!newPassword.match(/^(?=.*\d)(?=.*[!@#$%])(?=.*[a-zA-Z])[0-9A-Za-z!@#$%]{8,30}$/)){
        alert('Please enter the password in the correct format!');
        return false;
    }
    else if(!verifyPass.match(/^(?=.*\d)(?=.*[!@#$%])(?=.*[a-zA-Z])[0-9A-Za-z!@#$%]{8,30}$/)){
        alert('Please enter the password in the correct format!');
        return false;
    }
    else if(newPassword != verifyPass){
        alert('Passwords must match! Please try again!');
        return false;
    }
}