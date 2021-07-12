<?php
    session_start();
    
    $userID = $_SESSION['user_ID'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    emptyCart($connection, $userID);

    //Frees all session variables
    session_unset();

    //Destroy all data registered to a session
    session_destroy();


    //Redirect user to index.php after logging out
    header("Location: ../index.php");
    exit();