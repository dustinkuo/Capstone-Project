<?php
    session_start();   
     
    if(isset($_POST['email_Submit']))
    {
        $email = $_POST['new_email'];

        require_once 'db.inc.php';
        require_once 'functions.inc.php';

        //If there is no input
        if(emptyInputEmail($email) !== false){
            header('Location: ../change-email.php?error=empty-field');
            exit();
        }

        //If the email exists in the database, return error
        if(emailExists($connection, $email) !== false){
            header('Location: ../change-email.php?error=email-exists');
            exit();
        }

        //If the email is not in the correct format
        if(invalidEmail($email) !== false){
            header('Location: ../change-email.php?error=invalid-email');
            exit();
        }

        changeEmail($connection, $email, $_SESSION['user_ID']);
    }
    else{
        header('Location: ../change-email.php?error=none');
        exit();
    }