<?php
    include 'includes/header.inc.php';
?>

<section id='content'>
    <p id='page-nav'><a href='index.php'>Home</a> > <a href='profile.php'>Profile</a> > <span class='current'>Account</span></p>
    <div class='group'> 
        <div class='account'>
            <?php
                echo '<p>Account Name: '.$_SESSION["user_fname"].' '.$_SESSION["user_lname"].'</p>';
                echo '<p>Email: '.$_SESSION["emailAddress"].'</p>';
            ?>
            <a href='profile.php'><button type='button' class='buttons'>Back</button></a>
        </div>
        
    </div>
</section>
</body>
</html>