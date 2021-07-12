<?php
    include 'includes/header.inc.php'
?>

    <section id='content'>
        <p id='page-nav'><a href='index.php'>Home</a> > <a href='profile.php'>Profile</a> > <a href='settings.php'>Settings</a> > <span class='current'>Name</span></p>
        <div class='group'>
        <h2>Change Name</h2>
            <div id='form-center'>
                <form action='includes/change-name.inc.php' name='changeNameForm' onsubmit='return validateNameChange()' method='post'>
                    <div class='input-wrap'>
                        <label for='new_fName'>First Name</label><br>
                        <input type='text' class='input' name='new_fName' id='new_fName'>
                    </div><br>
                    <div class='input-wrap'>
                        <label for='new_lName'>Last Name</label><br>
                        <input type='text' class='input' name='new_lName' id='new_lName'>
                    </div><br>
                    <div class='options'>
                        <button type='submit' class='buttons' name='name_Submit'>Save Changes</button>
                        <a href='settings.php'><button type='button' class='buttons'>Back</button></a>
                    </div>  
                </form>
            </div>
        </div>  
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 'empty-field')
                {
                    echo '<p>Fill in the fields!</p>';
                }
            }
        ?>
    </section>
</body>
</html>