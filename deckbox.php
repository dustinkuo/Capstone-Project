<?php
    include 'includes/header.inc.php';
?>
<section id='content'>
    <p id='page-nav'><a href='index.php'>Home</a> > <a href='supplies.php'>Supplies</a> > <span class='current'>Deck Box</span></p>
    <section>
        <div id='product-area'>
            <!--Get images from database and display them on HTML-->
            <div id='product-group'>
            <?php
                require_once 'includes/db.inc.php';

                $query = 'select product_id, product_name, product_image, product_price from product where product_type = "deck box"';

                if($result = mysqli_query($connection,$query))
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<div class="products-container">';
                        echo '<img src='.$row['product_image'].' class="product-image"><br>';
                        echo '<p>'.$row['product_name'].' - $'.$row['product_price'].'</p>';
                        echo '<form action="includes/product.inc.php" method="get">';
                        echo '<button type="submit" value='.$row['product_id'].' name="product_button" class="buttons">View Product</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                }
                else
                {
                    echo mysqli_error($connection);
                }
            ?>
            </div>
        </div>
    </section>