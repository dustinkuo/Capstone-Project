<?php
    include 'includes/header.inc.php';
?>
<section id='content'>
    <p id='page-nav'><a href='index.php'>Home</a> > <a href='games.php'>Toys & Games</a> > <span class='current'>Pokemon</span></p>
    <section>
        <div id='product-area'>
            <!--Get images from database and display them on HTML-->
            <div id='product-group'>
            <?php
                require_once 'includes/db.inc.php';

                $query = 'select product_id, product_name, product_image, product_price from product where product_type = "pokemon"';

                include 'includes/displayProduct.inc.php';
            ?>
            </div>
        </div>
    </section>
<footer>

</footer>
</body>
</html>