<?php
    session_start();

    //If user has not logged in
    if(!isset($_SESSION['user_ID']))
    {
        //Set $_SESSION['user_ID] to guest
        $_SESSION['user_ID'] = 0;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>CardBreak Hobby Shop</title>
    <link rel='shortcut icon' type='image/jpg' href='images/cardBreak_logo_favicon-03.png'>
    <meta charset='UTF-8'>
    <meta name='author' content='Dustin Kuo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' rel='stylesheet'>

    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link href='css/card.css' rel='stylesheet'>
    <link href='css/main.css' rel='stylesheet'>
    <link href='css/form.css' rel='stylesheet'>
    <link href='css/content-area.css' rel='stylesheet'>
    <script src='js/passwordCriteria.js' rel='javascript' async></script>
    <script src='js/passwordVisibility.js' rel='javascript' async></script>
    <script src='js/validation.js' rel='javascript' async></script>
</head>

<body>
    <header id='header'>
        <div class='nav'>
            <a href='index.php'>
                <div>
                    <img src='images/cardbreak_logo_horizontal.png' alt='CardBreak Logo' id='logo'>
                </div>
            </a>
            <form name='searchForm' action='search.php' onsubmit='return validateSearchForm()' method='get'>
                <input type="text" name='search' placeholder="What are you looking for..." id='search'>
            </form>
            <?php
                if(isset($_SESSION['user_fname'])){
                    //Replace the sign-in/register button with the profile button
                    echo "<a href='profile.php' class='link'><button type='button' name='signin' class='buttons'><span class='hello'>Hello ".$_SESSION['user_fname']."</span></button></a>";
                    echo "<a href='cart.php' class='link'><button type='button' name='cart' class='buttons'>Cart</button></a>";
                }
                else{
                    //If username is not logged in, revert back to default
                    echo "<a href='login.php' class='link'><button type='button' name='signin' class='buttons'>Sign-in/Register</button></a>";
                    echo "<a href='cart.php' class='link'><button type='button' name='cart' class='buttons'>Cart</button></a>";
                }
            ?>
        </div>
        <div class='nav-categories'>
            <a href="games.php" class='menu'>Toys & Games</a>
            <a href="sports.php" class='menu'>Sports</a>
            <a href="supplies.php" class='menu'>Supplies</a>
        </div>
    </header>

    