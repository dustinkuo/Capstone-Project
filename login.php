<?php
    include 'includes/form.inc.php';
?>

<body style='background-color:white;'>
    <div id='form-center'>
        <div>
            <div>
                <a href='index.php'><img src='images/cardbreak_logo_vertical.png' width='256px' height='256px'></a>
            </div>
            <!--Error handling-->
            <div class='error'>
            <?php
                if(isset($_GET['error']))
                {
                    if($_GET['error'] == 'empty-field')
                    {
                        echo "<span style='color:red; font-weight:bold'>Fill in all fields!</span>";
                    }
                    else if($_GET['error'] == 'invalid-login')
                    {
                        echo "<span style='color:red; font-weight:bold'>Incorrect login information!</span>";
                    }
                }
            ?>
            </div>
            <form action='includes/login.inc.php' name='loginForm' onsubmit='return validateLogin()' method='post'>
                <div class='input-wrap'>
                    <label for='email'>Email Address</label>
                    <input type='email' class='input' name='log_email' id='log_email'>
                </div><br>
                <div class='input-wrap'>
                    <label for='log_password'>Password</label>
                    <input type='password' class='input' name='log_password' id='log-password'>
                    <i class="fas fa-eye" id='toggle-pass'></i>
                </div>
                <div class='button-group'>
                    <button type='submit' class='buttons' name='log_Submit'>Sign in</button>
                </div>
            </form>
            <br>
            <div class='button-group'>
                <input type='checkbox' class='check-input'>
                <label for='checkbox'>Stay signed in</label>
                <a href=''>Forgot password?</a>
            </div><br>
            <div class='button-group'>
                <p>-OR-</p>
                <a href='register.php'><button class='buttons'>Create an Account</button></a>
            </div>
        </div>
    </div>
</body>

</html>