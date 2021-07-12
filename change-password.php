<?php
    include 'includes/header.inc.php'
?>

    <section id='content'>
        <p id='page-nav'><a href='index.php'>Home</a> > <a href='profile.php'>Profile</a> > <a href='settings.php'>Settings</a> > <span class='current'>Password</span></p>
        <div class='group'>
        <h2>Change Password</h2>
            <div id='form-center'>
                <form action='includes/change-password.inc.php' name='changePasswordForm' onsubmit='return validatePassword()' method='post' >
                    <div class='input-wrap'>
                        <label for='current_password'>Current Password</label><br>
                        <input type='password' class='input' name='current_password' id='current_password'>
                    </div>
                    <br><br>
                        <div id='pass-required'>
                            <div class='criteria'>
                                <span id='criteria1' class='criteriaInvalid'>Minimum of 8 characters, max of 30 characters long</span><br>
                                <span id='criteria2' class='criteriaInvalid'>At least one uppercase character</span><br>
                                <span id='criteria3' class='criteriaInvalid'>At least one lowercase character</span><br>
                                <span id='criteria4' class='criteriaInvalid'>At least one number</span><br>
                                <span id='criteria5' class='criteriaInvalid'>At least one special character</span><br>
                            </div>
                        </div><br>
                        <div class='input-wrap'>
                        <label for='password'>Password</label><br>
                        <input type='password' class='input' name='new_password' id='new_password'>
                        <i class="fas fa-eye" id='toggle-pass'></i>
                        </div><br>
                        <div class='input-wrap'>
                            <label for='verifyPassword'>Verify Password</label><br>
                            <input type='password' class='input' name='newVerifyPassword' id='verifyPass'>
                            <i class="fas fa-eye" id='toggle-pass2'></i>
                        </div>
                        <div>
				            <button type='submit' class='buttons' name='newPass_Submit'>Save Changes</button>
                            <a href='settings.php'><button type='button' class='buttons'>Back</button></a>
                        </div>
                    </div>
                </form>
                <!--Error handling-->
                <?php
                    if(isset($_GET['error']))
                    {
                        if($_GET['error'] == 'empty-field')
                        {
                            echo '<p>Fill in all fields</p>';
                        }
                        else if($_GET['error'] == 'previous-match')
                        {
                            echo '<p>Your password must not contain the previous password, please enter again!</p>';
                        }
                        else if($_GET['error'] == 'invalid-password')
                        {
                            echo '<p>Invalid password, please enter again!</p>';
                        }
                        else if($_GET['error'] == 'password-match')
                        {
                            echo '<p>Password doesn\'t match, please enter again!</p>';
                        }
                    }
                ?>
            </div>
        </div>
    </section>
</body>
</html>