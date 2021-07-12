<?php
    //If the sign up submit button is pressed
    if(isset($_POST['reg_Submit']))
    {
        //Assign values from form inputs to variables
        $firstName = $_POST['reg_firstName'];
        $lastName = $_POST['reg_lastName'];
        $email = $_POST['reg_email'];
        $password = $_POST['reg_password'];
        $verifyPassword = $_POST['verifyPass']; 

        require_once 'db.inc.php';
        require_once 'functions.inc.php';

        //Check for empty inputs
        if(emptyInput($firstName, $lastName, $email, $password, $verifyPassword) !== false)
        {
            header('Location: ../register.php?error=empty-field');
            exit();
        }

        //Check for invalid password
        if(invalidPassword($password) !== false)
        {
            header('Location: ../register.php?error=invalid-password');
            exit();
        }

        //Check for invalid email format
        if(invalidEmail($email) !== false)
        {
            header('Location: ../register.php?error=invalid-email');
            exit();
        }

        //Check for password validation
        if(passwordMatch($password, $verifyPassword) !== false)
        {
            header('Location: ../register.php?error=password-match');
            exit();
        }

        //Check if email exists in database
        if(emailExists($connection, $email) !== false)
        {
            header('Location: ../register.php?error=email-exist');
            exit();
        }

        //Function to create a user from form input
        createUser($connection, $firstName, $lastName, $email, $password);  
    }
    else
    {
        header('Location: ../register.php');
        exit();
    }