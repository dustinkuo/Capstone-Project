<?php
    session_start();   
    
    if(isset($_POST['newPass_Submit']))
    {
        $currentPass = $_POST['current_password'];
        $newPass = $_POST['new_password'];
        $verifyPass = $_POST['newVerifyPassword'];

        require_once 'db.inc.php';
        require_once 'functions.inc.php';

        //If there is no input
        if(emptyInputPassword($currentPass, $newPass, $verifyPass) !== false){
            header('Location: ../change-password.php?error=empty-field');
            exit();
        }

        //Checks if the current password matches with new password
        if(previousMatch($currentPass, $verifyPass) !== false){
            header('Location: ../change-password.php?error=previous-match');
            exit();
        }

        //If the password doesn't match criteria
        if(invalidPassword($newPass) !== false){
            header('Location: ../change-password.php?error=invalid-password');
            exit();
        }

        //If password doesn't match with verified password
        if(passwordMatch($newPass, $verifyPass) !== false){
            header('Location: ../change-password.php?error=password-match');
            exit();
        }

        changePassword($connection, $verifyPass, $_SESSION['user_ID']);
        
    }
    else{
        header('Location: ../change-password.php?error=none');
        exit();
    }