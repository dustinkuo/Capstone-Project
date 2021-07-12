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
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' rel='stylesheet'>
    <link href='css/form.css' rel='stylesheet'>
    <script src='js/validation.js' rel='javascript' async></script>
</head>

<body>
<div class='error'>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == 'invalid-credit-card'){
                echo '<span style="color:red; font-weight:bold; ">Please select a credit card!</span>';
            }
            else if($_GET['error'] == 'invalid-cardholder-name'){
                echo '<span style="color:red; font-weight:bold; ">Invalid cardholder name! Please try again!</span>';
            }
            else if($_GET['error'] == 'invalid-card-number'){
                echo '<span style="color:red; font-weight:bold; ">Invalid card number! Please try again!</span>';
            }
            else if($_GET['error'] == 'invalid-exp-month'){
                echo '<span style="color:red; font-weight:bold; ">Invalid expiration month! Please try again!</span>';
            }
            else if($_GET['error'] == 'invalid-exp-year'){
                echo '<span style="color:red; font-weight:bold; ">Invalid expiration year! Please try again!</span>';
            }
            else if($_GET['error'] == 'invalid-cvc'){
                echo '<span style="color:red; font-weight:bold; ">Invalid cvc! Please try again!</span>';
            }
        }
    ?>
    </div>
    <div id='form-center'>
        <form action='includes/payment.inc.php' name='paymentForm' onsubmit='return validateCardInfo()' method='post'>
            <p>Payment Information</p>
            <fieldset>
                <legend>Credit Card</legend>
                <input type='radio' name='payment-card' value='Visa' class='payment-card'>
                <i class="fab fa-cc-visa"></i>
                <input type='radio' name='payment-card' value='Mastercard' class='payment-card'>
                <i class="fab fa-cc-mastercard"></i>
                <input type='radio' name='payment-card' value='Discover' class='payment-card'>
                <i class="fab fa-cc-discover"></i>
            </fieldset><br>
            <div class='input-wrap'>
                <label for='cardholder'>Cardholder Name</label><br>
                <input type='text' class='input' name='cardholderName' id='cardholderName'><br>
            </div><br>
            <div class='input-wrap'>
                <label for='cardholder'>Card Number</label><br>
                <input type='text' class='input' name='cardNumber' id='cardNumber'><br>
            </div><br>
            <div class='month-year'>
            <label for='month'>Month</label>
            <label for='/'>/</label>
            <label for='year'>Year</label>
            <select id='month' name='expMonth' class='month'>
                <option value='0'>--</option>
                <option value='1'>01</option>
                <option value='2'>02</option>
                <option value='3'>03</option>
                <option value='4'>04</option>
                <option value='5'>05</option>
                <option value='6'>06</option>
                <option value='7'>07</option>
                <option value='8'>08</option>
                <option value='9'>09</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
            </select>
            <label for='/'>/</label>
            <select id='year' name='expYear' class='year'>
                <option value='0'>----</option>
                <option value='2021'>2021</option>
                <option value='2022'>2022</option>
                <option value='2023'>2023</option>
                <option value='2024'>2024</option>
                <option value='2025'>2025</option>
                <option value='2026'>2026</option>
                <option value='2027'>2027</option>
                <option value='2028'>2028</option>
                <option value='2029'>2029</option>
                <option value='2030'>2030</option>
            </select>
            <label for='cvc'>CVC</label>
            <input type='text' class='cvc' name='cvc' id='cvc'>
            </div>
            <br>
            <div class='button-group'>
                <button type='submit' class='buttons' name='payment-submit'>Next</button>
            </div>
        </form>
    </div>
</body>

</html>