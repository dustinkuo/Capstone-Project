<?php
    session_start();

    //If the user clicked on next button
    if(isset($_POST['shipping-submit']))
    {
        $firstName = strtoupper($_POST['ship_firstName']);
        $lastName = strtoupper($_POST['ship_lastName']);
        $shipAddress = $_POST['ship_Address'];
        $shipAddress2 = $_POST['ship_Address2'];
        $city = strtoupper($_POST['ship_city']);
        $state = $_POST['ship_state'];
        $zip = $_POST['ship_zip'];
        $country = $_POST['ship_country'];
        
        $billAddress = $_POST['bill_Address'];
        $billAddress2 = $_POST['bill_Address2'];
        $billCity = strtoupper($_POST['bill_city']);
        $billState = $_POST['bill_state'];
        $billZip = $_POST['bill_zip'];
        $billCountry = $_POST['bill_country'];

        $_SESSION['shipInfo'] = array();
        $_SESSION['billInfo'] = array();

        require_once 'functions.inc.php';
 
        //Validation
        if(invalidName($firstName, $lastName) !== false){
            header('Location: ../shipping.php?error=invalid-name');
            exit();
        }

        if(invalidShippingAddress($shipAddress, $shipAddress2) !== false){
            header('Location: ../shipping.php?error=invalid-shipAddress');
            exit();
        }

        if(invalidCity($city) !== false){
            header('Location: ../shipping.php?error=invalid-city');
            exit();
        }

        if(invalidState($state) !== false){
            header('Location: ../shipping.php?error=invalid-state');
        }

        if(invalidZip($zip) !== false){
            header('Location: ../shipping.php?error=invalid-zip');
            exit();
        }

        if(invalidCountry($country) !== false){
            header('Location: ../shipping.php?error=invalid-country');
            exit();
        }

        if(invalidBillingAddress($billAddress, $billAddress2) !== false){
            header('Location: ../shipping.php?error=invalid-billAddress');
            exit();
        }

        if(invalidBillingCity($billCity) !== false){
            header('Location: ../shipping.php?error=invalid-billCity');
            exit();
        }

        if(invalidBillingState($billState)  !== false){
            header('Location: ../shipping.php?error=invalid-billState');
            exit();
        }

        if(invalidBillingZip($billZip)  !== false){
            header('Location: ../shipping.php?error=invalid-billZip');
            exit();
        }

        if(invalidBillingCountry($billCountry)){
            header('Location: ../shipping.php?error=invalid-billCountry');
            exit();
        }

        //After checking to see if there are any invalid inputs, push variables into array
        array_push($_SESSION['shipInfo'], $firstName, $lastName, $shipAddress, $shipAddress2, $city, $state, $zip, $country);
        array_push($_SESSION['billInfo'], $billAddress, $billAddress2, $billCity, $billState, $billZip, $billCountry);

        header('Location:../payment.php');
        exit();
    }
    else{
        header('Location: ../shipping.php');
        exit();
    }