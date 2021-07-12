<?php
    include 'includes/header.inc.php'
?>

    <section id='content'>
        <p id='page-nav'><a href='index.php'>Home</a> > <a href='profile.php'>Profile</a> > <a href='settings.php'>Settings</a> > <span class='current'>Email</span></p>
        <div class='group'>
        <h2>Change Email</h2>
            <div id='form-center'>
                <form action='includes/change-email.inc.php' name='changeEmailForm' onsubmit='return validateEmail()' method='post' >
                    <div class='input-wrap'>
                        <label for='new_email'>Email</label><br>
                        <input type='text' class='input' name='new_email' id='new_email'>  
                    </div>
                    <div>
                        <button type='submit' class='buttons' name='email_Submit'>Save Changes</button>
                        <a href='settings.php'><button type='button' class='buttons'>Back</button></a>
                    </div>
                </form>
            </div>
            <?php
                if(isset($_GET['error']))
                {
                    if($_GET['error'] == 'empty-field')
                    {
                        echo '<p>Fill in the fields!</p>';
                    }
                    else if($_GET['error'] == 'email-exists')
                    {
                        echo '<p>The email already exists, please enter again!</p>';
                    }
                    else if($_GET['error'] == 'invalid-email')
                    {
                        echo '<p>Invalid email, please enter again!</p>';
                    }
                }
            ?>
    </section>
</body>
</html>