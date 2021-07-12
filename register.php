<?php
    include 'includes/form.inc.php';
?>
<body style='background-color:white'>
    <div id='form-center'>
        <div>
            <div>
                <a href='index.php'><img src='images/cardbreak_logo_vertical.png' width='256px' height='256px'></a> 
            </div>
            <div class='error'>
                <?php
                    if(isset($_GET['error']))
                    {
                        if($_GET['error'] == "empty-field"){
                            echo "<span style='color:red; font-weight:bold;'>Fill in all fields!</span>";
                        }
                        else if($_GET['error'] == 'invalid-Email'){
                            echo "<span style='color:red; font-weight:bold;'>Choose a proper email!</span>";
                        }
                        else if($_GET['error'] == 'password-match')
                        {
                            echo "<span style='color:red; font-weight:bold;'>Passwords doesn't match!</span>";
                        }
                        else if($_GET['error'] == 'email-exist'){
                            echo "<span style='color:red; font-weight:bold;'>Email already exists! Please try again!</span>";
                        }
                        else if($_GET['error'] == 'invalid-password')
                        {
                            echo "<span style='color:red; font-weight:bold;'>Invalid password! Please try again!</span>";
                        }
                    }   
                ?>
            </div>
                <form action='includes/register.inc.php' name='registrationForm' onsubmit='return validateRegistration()' method='post'>
		            <div class='button-group'>
                        <div class='input-wrap'>
                            <label for='fname'>First Name <span style='color:red'>*</span></label><br>
                            <input type='text' class='input' name='reg_firstName' id='reg_firstName'>  
                        </div><br>
                        <div class='input-wrap'>
                            <label for='lname'>Last Name <span style='color:red'>*</span></label><br>
                            <input type='text' class='input' name='reg_lastName' id='reg_lastName'>
                        </div><br>
                        <div class='input-wrap'>
                            <label for='email'>Email <span style='color:red'>*</span></label><br>
                            <input type='email' class='input' name='reg_email' id='reg_email'><br>
                        </div><br><br>
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
                            <label for='reg_password'>Password <span style='color:red'>*</span></label><br>
                            <input type='password' class='input' name='reg_password' id='new_password'>
                            <i class="fas fa-eye" id='toggle-pass'></i>
                        </div><br>
                        <div class='input-wrap'>
                            <label for='verifyPass'>Verify Password <span style='color:red'>*</span></label><br>
                            <input type='password' class='input' name='verifyPass' id='verifyPass'>
                            <i class="fas fa-eye" id='toggle-pass2'></i>
                        </div>      
                    </div>
			        <button type='submit' class='buttons' name='reg_Submit'>Sign up</button> 
                </form>
            </div>
        </div>
    </div>
</body>
</html>