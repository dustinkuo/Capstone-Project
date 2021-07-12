<?php
    session_start(); 
       
    require_once 'db.inc.php';

    //If the checkout button has been pressed
    if(isset($_POST['checkout']))
    {
        //If no items exist in the cart for the current user, then redirect user back to cart.php
        $query = 'select * from cart where userID='.$_SESSION['user_ID'];

        if($result = mysqli_query($connection, $query))
        {
            header('Location: ../cart.php?error=empty-cart');
            exit();
        }
    }
    