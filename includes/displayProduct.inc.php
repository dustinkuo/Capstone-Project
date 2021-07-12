<?php
if($result = mysqli_query($connection,$query))
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo '<div class="products-container">';
        echo '<img src='.$row['product_image'].' class="product-image"><br>';
        echo '<p>'.$row['product_name'].' - $'.number_format($row['product_price'],2).'</p>';
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