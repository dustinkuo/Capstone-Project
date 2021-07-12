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
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' rel='stylesheet'>
</head>

<body>
    <?php
        //Trouble shoot for shipping information, and billing information
        /*
        echo var_dump($_SESSION['shipInfo']);
        echo var_dump($_SESSION['billInfo']);
        */
    ?>
    <span style='text-align:center;'><h1>Review & Submit</h1></span>
    <div id='user-info-container'>
        <form action='includes/confirmation.inc.php' method='post'>
            <div id='shipping-information'>
                <div>
                    <h3>Shipping Address:</h3>
                    <?php
                        $shipInfo = $_SESSION['shipInfo'];

                        echo $shipInfo[0].' '.$shipInfo[1].'</br>';
                        echo '<input type="hidden" value="'.$shipInfo[0].'" name="fName"'.'>';
                        echo '<input type="hidden" value="'.$shipInfo[1].'" name="lName"'.'>';
                        echo $shipInfo[2].'</br>';
                        echo '<input type="hidden" value="'.$shipInfo[2].'" name="sAddress"'.'>';
                        echo $shipInfo[3].'</br>';
                        echo '<input type="hidden" value="'.$shipInfo[3].'" name="sAddress2"'.'>';
                        echo $shipInfo[4].', '.$shipInfo[5].' '.$shipInfo[6].'</br>';
                        echo '<input type="hidden" value="'.$shipInfo[4].'" name="sCity"'.'>';
                        echo '<input type="hidden" value="'.$shipInfo[5].'" name="sState"'.'>';
                        echo '<input type="hidden" value="'.$shipInfo[6].'" name="sZIP"'.'>';
                        echo $shipInfo[7];
                        echo '<input type="hidden" value="'.$shipInfo[7].'" name="sCountry"'.'>';
                    ?>
                </div>
                </br>
                <div id='shipping-column-2'>
                    <div class='billingAddress'>
                        <h3>Billing Address:</h3>
                        <?php
                            $billInfo = $_SESSION['billInfo'];
                            $shipInfo = $_SESSION['shipInfo'];

                            //If shipping information matches with billing information (excluding customer name)
                            if($shipInfo[2] == $billInfo[0] && $shipInfo[3] == $billInfo[1] && 
                            $shipInfo[4] == $billInfo[2] && $shipInfo[5] == $billInfo[3] && 
                            $shipInfo[6] == $billInfo[4] && $shipInfo[7] == $billInfo[5])
                            {
                                //Display 'Same as Shipping Address'
                                echo 'Same as shipping address';
                                echo '<input type="hidden" value="'.$billInfo[0].'" name="bAddress"'.'>';
                                echo '<input type="hidden" value="'.$billInfo[1].'" name="bAddress2"'.'>';
                                echo '<input type="hidden" value="'.$billInfo[2].'" name="bCity"'.'>';
                                echo '<input type="hidden" value="'.$billInfo[3].'" name="bState"'.'>';
                                echo '<input type="hidden" value="'.$billInfo[4].'" name="bZIP"'.'>';
                                echo '<input type="hidden" value="'.$billInfo[5].'" name="bCountry"'.'>';
                            }
                            //Otherwise
                            else
                            {
                                //Display the billing information
                                echo $billInfo[0].'</br>';
                                echo '<input type="hidden" value="'.$billInfo[0].'" name="bAddress"'.'>';
                                echo $billInfo[1].'</br>';
                                echo '<input type="hidden" value="'.$billInfo[1].'" name="bAddress2"'.'>';
                                echo $billInfo[2].', '.$shipInfo[3].' '.$shipInfo[4].'</br>';
                                echo '<input type="hidden" value="'.$shipInfo[2].'" name="bCity"'.'>';
                                echo '<input type="hidden" value="'.$shipInfo[3].'" name="bState"'.'>';
                                echo '<input type="hidden" value="'.$shipInfo[4].'" name="bZIP"'.'>';
                                echo $shipInfo[5];
                                echo '<input type="hidden" value="'.$billInfo[5].'" name="bCountry"'.'>';
                            }
                        ?>
                    </div>
                    <div id='payment-container'>
                        <h3>Payment Method:</h3>
                        <?php
                            $paymentInfo = $_SESSION['paymentInfo'];
            
                            if($paymentInfo[0] == 'Visa')
                            {
                                echo '<input type="hidden" value="Visa" name="creditCard"'.'>';
                                echo '<i class="fab fa-cc-visa"></i>';
                            }
                            else if($paymentInfo[0] == 'Mastercard')
                            {
                                echo '<input type="hidden" value="Mastercard" name="creditCard"'.'>';
                                echo '<i class="fab fa-cc-mastercard"></i>';
                            }
                            else
                            {
                                echo '<input type="hidden" value="Discover" name="creditCard"'.'>';
                                echo '<i class="fab fa-cc-discover"></i>';
                            }

                            $stringCardNumber = $paymentInfo[2];
                            $lastFourDigits = substr($stringCardNumber, -4);
                            echo '<input type="hidden" value="'.substr($stringCardNumber, -4).'" name="cardNumber"'.'>';
                            echo ' ending in '.$lastFourDigits;
                        ?>
                    </div>
                </div>
            </div>
            <div id='productInfo'>
                <h3>Product(s):</h3></br>
                <div id='product-section'>
                    <?php
                        $userID = $_SESSION['user_ID'];

                        require_once 'includes/db.inc.php';

                        $sql = 'select product_name, product_image, quantity, price from cart join product on cart.product_id = product.product_id where userID = '.$userID;

                        if($result2= mysqli_query($connection, $sql))
                        {
                            while($row = mysqli_fetch_assoc($result2)){
                                echo '<div class="product-container">';
                                echo '<img src="'.$row['product_image'].'" width="auto" height="100px"></br>';
                                echo $row['product_name'].'</br>';
                                echo 'Quantity:'.$row['quantity'].'</br>';
                                echo '$'.$row['price'].'</br></br>';
                                echo '</div>';
                            }
                        } 
                    ?>
                </div>
            </div>
            <div id='order-container'>
                <h3>Order Summary</h3>
                    <?php

                        $userID = $_SESSION['user_ID'];

                        $total = 0;
                            

                        require_once 'includes/db.inc.php';

                        $sql = 'select price from cart join product on cart.product_id = product.product_id where userID = '.$userID;

                        if($result2= mysqli_query($connection, $sql))
                        {
                            while($row = mysqli_fetch_assoc($result2))
                            {
                                $total = $total + $row['price'];
                            }
                        }

                        $shipping = 5.99;

                        echo 'Items: <span style="float:right;">$'.$total.'</span><br>';
                        echo '<input type="hidden" value="number_format($shipping, 2)" name="shipping">';
                        echo 'Shipping & Handling: <span style="float:right;">$'.$shipping.'</span></br>';

                        $total += $shipping;

                        echo '<input type="hidden" value="number_format($total, 2)" name="subtotal">';
                        echo 'Subtotal: <span style="float:right;">$'.$total.'</span>';
                    ?>
                <hr>
                </br>
                Tax:
                <?php
                    $tax = $total * .1;
                    echo '<input type="hidden" value="number_format($tax, 2)" name="tax"'.'>';
                    echo '<span style="float:right;">$'.number_format($tax, 2).'</span>';
                ?>
                </br>
                Order Total:
                <?php
                    $total += $tax;
                    echo '<input type="hidden" value="number_format($total, 2)" name="order-total"'.'>';
                    echo '<span style="float:right;">$'.number_format($total, 2).'</span>';
                ?>
            </div>
            <div style='text-align:center;'>
                <button type='submit' name='confirm-button' class='buttons'>Place Order</button>
            </div>
        </form>
    </div>
</body>
</html>