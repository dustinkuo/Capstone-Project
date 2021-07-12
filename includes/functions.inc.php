<?php
//Checks for empty input in account creation
function emptyInput($firstName, $lastName, $email, $password, $verifyPassword)
{
    $result;

    //If any of these variables are empty, 
    if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($verifyPassword))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

function emptyInputEmail($email){
    $result;
    if(empty($email)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function emptyInputName($firstName, $lastName){
    $result;
    if(empty($firstName) || empty($lastName)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function emptyInputPassword($currentPass, $newPass, $verifyPass){
    $result;
    if(empty($currentPass) || empty($newPass) || empty($verifyPass)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//Checks for empty input at log in
function emptyInputLogIn($email, $password)
{
    $result;

    //If the email or password is empty
    if(empty($email) || empty($password))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

function loginUser($connection, $email, $password){

    //Return true or false if email exists in the database 
    $emailExists = emailExists($connection, $email);

    //If the email doesn't exist in the database, redirect user back to login.php with error message
    if($emailExists === false){
        header("Location: ../login.php?error=invalid-login");
        exit();
    }

    $passwordHashed=$emailExists['password'];

    //Checks if password matches the hash
    $checkPassword=password_verify($password, $passwordHashed);

    //If it doesn't match, then redirect user back to login.php with error message
    if($checkPassword === false){
        header("Location: ../login.php?error=password-match");
        exit();
    }
    //If password is valid, start a new session assign 
    else if($checkPassword === true){

        //Start new session if password matches
        session_start();

        //Give session variable for user ID from database
        $_SESSION['user_ID']=$emailExists['userID'];

        //Give session variable for first name from database
        $_SESSION['user_fname']=$emailExists['firstName'];

        //Give session variable for email from database
        $_SESSION['emailAddress'] = $emailExists['email'];

        //Give session variable for last name from database
        $_SESSION['user_lname'] = $emailExists['lastName'];

        header("Location: ../index.php?loggedin=true");
        exit();
    }
}

//Function that'll run a sql query to change the email account
function changeEmail($connection, $email, $userID){
    $sql = 'update customer_info set email=? where userID =?;';

    $stmt = mysqli_stmt_init($connection);

    //If the prepared statement failed
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../change-email.php?error=stmt-failed');
            exit();
    }

    //Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "si", $email, $userID);

    //Executes prepared statement
    mysqli_stmt_execute($stmt);

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);

    //Redirect user to change-name.php 
    header('Location: ../change-email.php?email-change-error=none');
    exit();
}

function changeName($connection, $firstName, $lastName, $userID){
    $sql = 'update customer_info set firstName=?, lastName=? where userID=?;';

    $stmt = mysqli_stmt_init($connection);

    //If the prepared statement failed
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../change-name.php?error=stmt-failed');
            exit();
    }

    //Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssi", $firstName, $lastName, $userID);

    //Executes prepared statement
    mysqli_stmt_execute($stmt);

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);

    //Update $_SESSION variables for first and last name
    $_SESSION['user_fname']=$firstName;

    $_SESSION['user_lname']=$lastName;

    //Redirect user to change-name.php 
    header('Location: ../change-name.php?name-change-error=none');
    exit();
}

function changePassword($connection, $verifyPass, $userID){
    $sql = 'update customer_info set password=? where userID=?;';

    $stmt = mysqli_stmt_init($connection);

    //If the prepared statement failed
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: ../change-password.php?error=stmt-failed');
            exit();
    }

    //'Rehash' password
    $hashedPassword = password_hash($verifyPass, PASSWORD_DEFAULT);

    //Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "si", $hashPassword, $userID);

    //Executes prepared statement
    mysqli_stmt_execute($stmt);

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);

    //Redirect user to change-name.php 
    header('Location: ../change-password.php?name-change-error=none');
    exit();
}

function invalidSearchInput($searchInput)
{
    $result;

    if(preg_match("/^[a-zA-Z ]$/", $searchInput))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

//Validate first and last name
function invalidName($firstName, $lastName)
{
    $result;
    
    if(!preg_match("/^[a-zA-Z]*$/", $firstName) && !preg_match("/^[a-zA-Z]*$/", $lastName))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

function invalidShippingAddress($shipAddress, $shipAddress2)
{
    $result;

    if(!preg_match("/^[a-zA-Z0-9 ]*$/", $shipAddress) && !preg_match("/^[a-zA-Z0-9 ]*$/", $shipAddress2))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

//Validates password
function invalidPassword($password)
{
    $result;

    //If the input doesn't match the criteria
    if(!preg_match("/^(?=.*\d)(?=.*[!@#$%])(?=.*[a-zA-Z])[0-9A-Za-z!@#$%]{8,30}$/", $password))
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//Validates email
function invalidEmail($email)
{
    $result;
    //Check if the value in the $email variable is a valid email address
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

//Validate the city
function invalidCity($city)
{
    $result;

    //If city doesn't match the criteria
    if(!preg_match("/^[a-zA-Z]*$/", $city))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result; 
}

//Validate the zipcode
function invalidZip($zip)
{
    $result;
    
    //If zip code doesn't match the criteria
    if(!preg_match("/^[0-9]{5}$/", $zip))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

//Validate the state
function invalidState($state)
{
    $result;
    
    //If zip code doesn't match the criteria
    if($state === 'N/A')
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

//Validate the country
function invalidCountry($country)
{
    $result;
    
    //If zip code doesn't match the criteria
    if($country === 'N/A')
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

function invalidBillingAddress($billAddress, $billAddress2)
{
    $result;

    if(!preg_match("/^[a-zA-Z0-9 ]*$/", $billAddress) && !preg_match("/^[a-zA-Z0-9 ]*$/", $billAddress2))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

//Validate the city
function invalidBillingCity($billCity)
{
    $result;

    //If city doesn't match the criteria
    if(!preg_match("/^[a-zA-Z]*$/", $billCity))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result; 
}

//Validate the zipcode
function invalidBillingZip($billZip)
{
    $result;
    
    //If zip code doesn't match the criteria
    if(!preg_match("/^[0-9]{5}$/", $billZip))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

//Validate the billingstate
function invalidBillingState($billState)
{
    $result;
    
    //If zip code doesn't match the criteria
    if($billState === 'N/A')
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

//Validate the country
function invalidBillingCountry($billCountry)
{
    $result;
    
    //If zip code doesn't match the criteria
    if($billCountry === 'N/A')
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

function invalidCreditCard($creditCard)
{
    $result;

    if(empty($creditCard))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidCardHolder($cardholder)
{
    $result;

    if(!preg_match("/^[a-zA-Z ]*$/", $cardholder))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidCardNumber($cardNumber, $creditCard)
{
    $result;

    //If the selected credit card is a "Visa"
    if($creditCard === 'Visa')
    {
        if(!preg_match("/^4[0-9]{12}(?=[0-9]{3})?$/", $cardNumber))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
    }
    //If the selected credit card is a "Mastercard"
    else if($creditCard === 'Mastercard')
    {
        if(!preg_match("/^5[1-5][0-9]{14}$/", $cardNumber))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
    }
    //If the selected credit card is a "Discover" card
    else
    {
        if(!preg_match("/^6(?=011|5[0-9]{2})[0-9]{12}$/", $cardNumber))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
    }
    return $result;
}

function invalidExpMonth($expMonth)
{
    $result;

    if($expMonth === 'N/A')
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidExpYear($expYear)
{
    $result;

    if($expYear === 'N/A')
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidCVC($cvc)
{
    $result;

    if(!preg_match("/^[0-9]{3,4}$/", $cvc))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $verifyPassword){
    $result;
    //If the value in $password is not the same as the value in $verifyPassword
    if($password !== $verifyPassword){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function addToCart($connection, $userID, $productID, $quantity, $price)
{
    $sql = 'insert ignore into cart(userID, product_id, quantity, price) values(?, ?, ?, ?);'; 

    //For prepared statement
    $stmt = mysqli_stmt_init($connection);

    //If the prepared statement failed
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header('Location: ../product.php?error=add-failed');
        exit();
    }

    //Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "iiid", $userID, $productID, $quantity, $price);

    //Executes prepared statement
    mysqli_stmt_execute($stmt);

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);

    header('Location: ../cart.php');
    exit();
}

function productExists($connection, $productID)
{
    $sql = 'select * from cart where product_id = ?';
    
    //For prepared statement
    $stmt = mysqli_stmt_init($connection);

    //If the prepared statement failed
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header('Location: ../register.php?error=stmt-failed');
        exit();
    }

    //Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $productID);

    //Executes prepared statement
    mysqli_stmt_execute($stmt);

    //Gets result set from the prepared statement
    $resultData = mysqli_stmt_get_result($stmt);

    //Fetches a result row as an associative array
    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);
}

function updateQuantity($connection, $quantity, $productID){
    //Run query that gets the current quantity for the product in the database
    $sql = 'select quantity, price from cart where product_id='.$productID;

    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    //Calculate the new quantity by adding both the current quantity with the quantitiy we're adding
    $newQuantity = $row['quantity'] + $quantity;

    //Calculate the new price by multiplying the new quantity with the price of the product
    $newPrice = $newQuantity * $row['price'];

    //Run query to update the quantity and price for the product
    $sql2 = 'update cart set quantity = '.$newQuantity.', price = '.$newPrice.' where product_id = '.$productID;
    $result2 = mysqli_query($connection, $sql2);

    header('Location: ../cart.php');
    exit();
}

function removeItem($connection, $productID)
{
    $sql = 'delete from cart where product_id = ?';
    //For prepared statement
    $stmt = mysqli_stmt_init($connection);

    //If the prepared statement failed
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header('Location: ../cart.php?error=delete-failed');
        exit();
    }

    //Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $productID);

    //Executes prepared statement
    mysqli_stmt_execute($stmt);

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);

    header('Location: ../cart.php');
    exit();
}

//Empties the cart in the database and the $_SESSION['cart']
function emptyCart($connection, $userID)
{
    $sql = 'delete from cart where userID = ?';

    $stmt = mysqli_stmt_init($connection);

    //If the prepared statement failed
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header('Location: ../review.php?error=delete-failed');
        exit();
    }

    //Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $userID);

    //Executes prepared statement
    mysqli_stmt_execute($stmt);

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);
}

//Checks if verified password matches with the current password
function previousMatch($currentPass, $verifyPass)
{
    $result;

    //If current password matches with the verified password
    if($currentPass === $verifyPass)
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function emailExists($connection, $email)
{
    //SQL statement to select all columns from customer_info table where the email is based on user input
    $sql = 'select * from customer_info where email = ?;';

    //For prepared statement
    $stmt = mysqli_stmt_init($connection);

    //If the prepared statement failed
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header('Location: ../register.php?error=stmt-failed');
        exit();
    }

    //Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $email);

    //Executes prepared statement
    mysqli_stmt_execute($stmt);

    //Gets result set from the prepared statement
    $resultData = mysqli_stmt_get_result($stmt);

    //Fetches a result row as an associative array
    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);
}

function createUser($connection, $firstName, $lastName, $email, $password)
{
    //SQL insert statement to insert new customer in customer_info table in database
    $sql = 'insert into customer_info(firstName, lastName, email, password) values(?, ?, ?, ?);';

    //Initialize a statement for prepared statement
    $stmt = mysqli_stmt_init($connection);

    //If SQL statement fails to work in the database.
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header('Location: ../register.php?error=stmtfailed');
        exit();
    }

    //Hashes password from user input
    //PASSWORD_DEFAULT - uses the bcrypt algorithm, recommended to store result in database column that can expand beyond 60 characters.
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //Bind variables to a prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $hashedPassword);

    //Execute prepared statement
    mysqli_stmt_execute($stmt);

    //Close prepared statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($connection);

    //Redirect back to home page
    header('Location: ../index.php?registered=true');
    exit();
}