<?php
    include 'includes/header.inc.php';
    require_once 'includes/db.inc.php';
?>

<section id='content'>
    <div>
    <?php
        $query = 'select product_name, product_type from product where product_id = '.$_SESSION['productID'];

        if($result = mysqli_query($connection, $query))
        {
            while($row = mysqli_fetch_assoc($result))
            {
                if($row['product_type'] === 'pokemon'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="games.php">Toys & Games</a> > <a href="pokemon.php">Pokemon</a> > <span class="current">'.$row['product_name'].'</span></p>'; 
                }
                else if($row['product_type'] === 'yugioh'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="games.php">Toys & Games</a> > <a href="yugioh.php">Yu-Gi-Oh!</a> > <span class="current">'.$row['product_name'].'</span></p>';
                }
                else if($row['product_type'] === 'toploader'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="supplies.php">Supplies</a> > <a href="toploader.php">Toploaders</a> > <span class="current">'.$row['product_name'].'</span></p>';
                }
                else if($row['product_type'] === 'card sleeves'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="supplies.php">Supplies</a> > <a href="cardsleeves.php">Card Sleeves</a> > <span class="current">'.$row['product_name'].'</span></p>';
                }
                else if($row['product_type'] === 'deck box'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="supplies.php">Supplies</a> > <a href="deckbox.php">Deck Box</a> > <span class="current">'.$row['product_name'].'</span></p>';
                }
                else if($row['product_type'] === 'mtg'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="games.php">Toys & Games</a> > <a href="magic-the-gathering.php">Magic: The Gathering</a> > <span class="current">'.$row['product_name'].'</span></p>';
                }
                else if($row['product_type'] === 'bowman'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="sports.php">Sports</a> > <a href="bowman.php">Bowman</a> > <span class="current">'.$row['product_name'].'</span></p>';
                }
                else if($row['product_type'] === 'panini'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="sports.php">Sports</a> > <a href="panini.php">Panini</a> > <span class="current">'.$row['product_name'].'</span></p>';
                }
                else if($row['product_type'] === 'topps'){
                    echo '<p id="page-nav"><a href="index.php">Home</a> > <a href="sports.php">Sports</a> > <a href="topps.php">Topps</a> > <span class="current">'.$row['product_name'].'</span></p>';
                }
            }
        }
    ?>

    <!--For displaying the item, item description, item price and quantity-->
    <?php
        $query = 'select * from product where product_id = '.$_SESSION['productID'];

        if($result = mysqli_query($connection,$query))
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo '<form action="includes/addToCart.inc.php" method="post">';
                echo '<p hidden name="productID">'.$row['product_id'].'</p>';
                echo '<h2 name="productName" class="item-header">'.$row['product_name'].'</h2>';
                echo '<div class="product-container">';
                echo '<div class="product-image">';
                echo '<img src='.$row['product_image'].' name="productImage" class="product-preview">';
                echo '</div>';
                echo '<div class="product-information">';
                echo '<div class="product-description">';
                echo '<span style="font-size:16px;">'.$row['product_description'].'</span></br>';
                echo '<input type="hidden" name="productPrice" value="'.$row['product_price'].'"></br>';
                echo 'Price: $'.number_format($row['product_price'], 2).'</br>';
                echo 'Quantity: ';
                echo '<select name="quantity">';
                echo '<option value="1">1</option>';
                echo '<option value="2">2</option>';
                echo '<option value="3">3</option>';
                echo '<option value="4">4</option>';
                echo '</select></br></br>';
                echo '<span style="color:red;">Limited four per household</span>';
                echo '</br></br>';
                echo '<div style="text-align:center">';
                echo '<button type="submit" name="addToCart" class="buttons">Add to cart</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
            }
        }
        else
        {
            echo mysqli_error($connection);
        }
    ?>
    </div>
</section>
</body>
</html>