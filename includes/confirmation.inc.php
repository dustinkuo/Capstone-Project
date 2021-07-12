<?php
    session_start();

    if(isset($_POST['confirm-button']))
    {
        $firstName = $_POST['fName'];
        $lName = $_POST['lName'];
        $sAddress = $_POST['sAddress'];
        $sAddress2 = $_POST['sAddress2'];
        $sCity = $_POST['sCity'];
        $sState = $_POST['sState'];
        $sZIP = $_POST['sZIP'];
        $sCountry = $_POST['sCountry'];
        $bAddress = $_POST['bAddress'];
        $bAddress2 = $_POST['bAddress2'];
        $bCity = $_POST['bCity'];
        $bState = $_POST['bState'];
        $bZIP = $_POST['bZIP'];
        $bCountry = $_POST['bCountry'];
        $creditCard = $_POST['creditCard'];
        $cardNumber = $_POST['cardNumber'];
        $shipping = $_POST['shipping'];
        $subtotal = $_POST['subtotal'];
        $tax = $_POST['tax'];
        $orderTotal = $_POST['order-total'];

        $userID = $_SESSION['user_ID'];

        require_once 'functions.inc.php';
        require_once 'db.inc.php';

        //Delete contents of the cart in the database based on userID
        emptyCart($connection, $userID);
        
        //'Empty' the cart, ship information, bill information, and payment information
        unset($_SESSION['shipInfo']);
        unset($_SESSION['billInfo']);
        unset($_SESSION['paymentInfo']);

        header('Location: ../confirmation.php');
        exit();
    }
    else{
        header('Location: ../review.php');
        exit();
    }