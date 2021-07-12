<?php
    include 'includes/header.inc.php';
    require_once 'includes/db.inc.php';
?>
    <section id='content'>
        <div id='card-container'>
        </div>
        <div id='original'>
            <div id='product'>
                <div class='group'>
                    <h2>Featured Products</h2>
                    <div class='items'>
                        <div>
                            <form action='includes/product.inc.php' method='get'>
                                <div class='products'>
                                    <?php
                                        $query = 'select product_image from product where product_id = 4;';
                                        $result = mysqli_query($connection, $query);
                                        if($row = mysqli_fetch_assoc($result)){
                                            
                                            echo '<img src="'.$row['product_image'].'" alt="Hidden Fates Elite Trainer Box" width="200px" height="auto"><br><br>';
                                            echo 'Hidden Fates Elite Trainer Box';
                                        }
                                    ?>
                                    <div>
                                        <button class='cartButton' value='4' name='product_button'>View Item</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <form action='includes/product.inc.php' method='get'>
                            <div class='products'>
                            <?php
                                        $query = 'select product_image from product where product_id = 8;';
                                        $result = mysqli_query($connection, $query);
                                        if($row = mysqli_fetch_assoc($result)){
                                            echo '<img src="'.$row['product_image'].'" alt="Shining Fates Elite Trainer Box" width="200px" height="auto"><br><br>';
                                            echo 'Shining Fates Elite Trainer Box';
                                        }
                                    ?>
                                <div>
                                    <button class='cartButton' value='8' name='product_button'>View Item</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div>
                            <form action='includes/product.inc.php' method='get'>
                            <div class='products'>
                            <?php
                                        $query = 'select product_image from product where product_id = 21;';
                                        $result = mysqli_query($connection, $query);
                                        if($row = mysqli_fetch_assoc($result)){
                                            echo '<img src="'.$row['product_image'].'" width="216px" height="auto"><br><br>';
                                            echo 'Ghosts from the Past';
                                        }
                                    ?>
                                <div>
                                    <button class='cartButton' value='21' name='product_button'>View Item</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='group'>
                    <h2>New Releases</h2>
                    <div class='items'>
                        <form action='includes/product.inc.php' method='get'>
                        <div class='products'>
                            <?php
                                $query = 'select product_name, product_image from product where product_id = 22;';
                                $result = mysqli_query($connection, $query);
                                if($row = mysqli_fetch_assoc($result))
                                {
                                    echo '<img src="'.$row['product_image'].'" width="216px" height="auto"><br><br>';
                                    echo $row['product_name'];
                                }
                            ?>
                            <div>
                                <button class='cartButton' value='22' name='product_button'>View Item</button>
                            </div>
                        </div>
                        </form>
                        <form action='includes/product.inc.php' method='get'>
                        <div class='products'>
                            <?php
                                $query = 'select product_name, product_image from product where product_id = 42;';
                                $result = mysqli_query($connection, $query);
                                if($row = mysqli_fetch_assoc($result))
                                {
                                    echo '<img src="'.$row['product_image'].'" width="235px" height="auto"><br><br>';
                                    echo $row['product_name'];
                                }
                            ?>
                            <div>
                                <button class='cartButton' value='42' name='product_button'>View Item</button>
                            </div>
                        </div>
                        </form>
                        <form action='includes/product.inc.php' method='get'>
                        <div class='products'>
                            <?php
                                $query = 'select product_name, product_image from product where product_id = 43;';
                                $result = mysqli_query($connection, $query);
                                if($row = mysqli_fetch_assoc($result))
                                {
                                    echo '<img src="'.$row['product_image'].'" width="178px" height="auto"><br><br>';
                                    echo $row['product_name'];
                                }
                            ?>
                            <div>
                                <button class='cartButton' value='43' name='product_button'>View Item</button>
                            </div>
                        </div>
                        </form>
                        <form action='includes/product.inc.php' method='get'>
                        <div class='products'>
                            <?php
                                $query = 'select product_name, product_image from product where product_id = 38;';
                                $result = mysqli_query($connection, $query);
                                if($row = mysqli_fetch_assoc($result))
                                {
                                    echo '<img src="'.$row['product_image'].'" width="282px" height="auto"><br><br>';
                                    echo $row['product_name'];
                                }
                            ?>
                            <div>
                                <button class='cartButton' value='38' name='product_button'>View Item</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id='footer'>
        <!--Contect information-->
       <!--Add social media links, but not direct it to anywhere-->
       <!--Copyright notice, privacy policy, user agreement-->
    </footer>
</body>

</html>