<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>eCommerce website</title>
    <meta charset='UTF-8'>
    <meta name='author' content='Dustin Kuo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='css/form.css' rel='stylesheet'>
</head>

<body>
    <div id='form-center'>
        <div>
            <div>
                <a href='index.php'><img src='images/cardbreak_logo_vertical.png' width='256px' height='256px'></a>
            </div>
            <form action='includes/checkout.inc.php' method='post'>
                <label for='email'>Email Address</label><br>
                <input type='email' placeholder='Email Address' class='input' name='email'><br>
                <label for='password'>Password</label><br>
                <input type='password' placeholder='Password' class='input' name='password'><br>
                <div class='button-group'>
                    <input type='checkbox'>
                    <label for='checkbox'>Stay signed in</label>
                    <a href=''>Forgot password?</a><br>
                </div>
                <div class='button-group'>
                    <button type='submit' class='buttons' name='submit'>Sign in</button>
                </div>
            </form>
            <div class='button-group'>
                <p>-OR-</p>
                <a href='shipping.php'><button type='submit' class='buttons' name='guest'>Checkout as Guest</button></a>
            </div>
        </div>
    </div>
</body>

</html>