<?php
    session_start();

    if(isset($_POST['payment-submit']))
    {
        $creditCard = $_POST['payment-card'];
        $cardholder = $_POST['cardholderName'];
        $cardNumber = $_POST['cardNumber'];
        $expMonth = $_POST['expMonth'];
        $expYear = $_POST['expYear'];
        $cvc = $_POST['cvc'];

        $_SESSION['paymentInfo'] = array();

        require_once 'functions.inc.php';

        //Validation
        if(invalidCreditCard($creditCard) !== false){
            header('Location: ../payment.php?error=invalid-credit-card');
            exit();
        }

        if(invalidCardHolder($cardholder) !== false){
            header('Location: ../payment.php?error=invalid-cardholder-name');
            exit();
        }

        if(invalidCardNumber($cardNumber, $creditCard) !== false){
            header('Location: ../payment.php?error=invalid-card-number');
            exit();
        }

        if(invalidExpMonth($expMonth) !== false){
            header('Location: ../payment.php?error=invalid-exp-month');
            exit();
        }

        if(invalidExpYear($expYear) !== false){
            header('Location: ../payment.php?error=invalid-exp-year');
            exit();
        }

        if(invalidCVC($cvc) !== false){
            header('Location: ../payment.php?error=invalid-cvc');
            exit();
        }

        //After validation, push values into array
        array_push($_SESSION['paymentInfo'], $creditCard, $cardholder, $cardNumber, $expMonth, $expYear, $cvc);

        header('Location: ../review.php');
        exit();
    }
    else{
        header('Location: ../payment.php');
        exit();
    }