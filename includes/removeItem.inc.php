<?php
    session_start();

    if(isset($_POST['remove']))
    {
        $productID = $_POST['remove'];

        require_once 'db.inc.php';
        require_once 'functions.inc.php';

        //Iterate through $_SESSION['cart'] array, search by key/value
        foreach($_SESSION['cart'] as $key => $value){
            //If the productID of each item equals to the productID of the item
            if($value['productID'] == $productID){
                //Delete the array containing that productID from $_SESSION['cart']
                unset($_SESSION['cart'][$key]);
            }
        }

        //Reindex arrays in the cart
        foreach($_SESSION['cart'] as $key => $value){
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }

        removeItem($connection, $productID);
    }