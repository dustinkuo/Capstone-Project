<?php
    //If the login submit button is pressed
    if(isset($_POST['log_Submit'])){

        //Store login information to variables
        $email = $_POST['log_email'];
        $password = $_POST['log_password'];

        require_once 'db.inc.php';
        require_once 'functions.inc.php';

        //Checks for empty input
        if(emptyInputLogIn($email, $password) !== false){
            header('Location: ../login.php?error=empty-field');
            exit();
        }

        //Logs user into website if email and password matches the record in database
        loginUser($connection, $email, $password);
    }
    else{
        header('Location: ../login.php');
        exit();
    }