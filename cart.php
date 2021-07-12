<?php
    include 'includes/header.inc.php';
?>
    <section id='content'>
        <?php
            if(isset($_GET['error']))
            {
                if($_GET['error'] == 'empty-cart')
                {
                    echo '<br>';
                    echo '<p style="color:red; font-weight:bold; text-align:center">There are no items in the cart!</p>';
                }
            }
        ?>
        <div class='cart-items'>
            <!--Display item in content area-->
            <?php
                require_once 'includes/db.inc.php';

                $query = 'select product.product_id, product_name, product_image, product_price, quantity from cart 
                join product on product.product_id = cart.product_id
                where userID='.$_SESSION['user_ID'].';';

                if($result = mysqli_query($connection,$query))
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<div class="cart-container">';
                        echo '<img src='.$row['product_image'].' class="product-image">';
                        echo '<div>';
                        echo $row['product_name'].'</br>';
                        echo '$'.$row['product_price'] * $row['quantity'].'</br>';
                        echo 'Quantity: '.$row['quantity'];
                        echo '<br>';
                        echo '<div class="product_button">';
                        echo '<form action="includes/removeItem.inc.php" method="post">';
                        echo '<button type="submit" value="'.$row['product_id'].'" class="buttons" name="remove">Remove item</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                else
                {
                    echo mysqli_error($connection);
                }
            ?>
        </div>
        <div id='cart-total'>
            <h5>Subtotal:
            <?php
                $query = 'select sum(price) as "sum" from cart where userID='.$_SESSION['user_ID'].';';

                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                echo '$'.number_format($row['sum'], 2);
            ?>
                </h5>
            <form action='includes/cart.inc.php' method='post'>
                <button type='submit' class='buttons' name='checkout'>Go to checkout</button>
            </form>
        </div>
    </section>
</body>
</html>