<?php
    session_start();   
    
    if(isset($_POST['name_Submit']))
    {
        $firstName = $_POST['new_fName'];
        $lastName = $_POST['new_lName'];

        require_once 'db.inc.php';
        require_once 'functions.inc.php';

        //If there is no input
        if(emptyInputName($firstName, $lastName) !== false){
            header('Location: ../change-name.php?error=empty-field');
            exit();
        }

        changeName($connection, $firstName, $lastName, $_SESSION['user_ID']);
    }
    else{
        header('Location: ../change-name.php?error=none');
        exit();
    }