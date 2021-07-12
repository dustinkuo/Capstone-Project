<?php
    session_start();

    //If 'Add to cart' is clicked
    if(isset($_POST['addToCart']))
    {
        $userID = $_SESSION['user_ID'];
        $productID = $_SESSION['productID'];
        $quantity = $_POST['quantity'];
        $price = $_POST['productPrice'];

        require_once 'db.inc.php';
        require_once 'functions.inc.php';

        $totalPrice = $quantity * $price;

        //If product exists in the database
        if(productExists($connection, $productID))
        {
            //Update the quantity of the product
            updateQuantity($connection, $quantity, $productID);
        }
        //If product doesn't exist in the database
        else
        {
            //Add new item to database
            addToCart($connection, $userID, $productID, $quantity, $totalPrice);
        } 
    }
    else{
        header('Location: ../product.php');
        exit();
    }
    
    