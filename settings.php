<?php
    include 'includes/header.inc.php'
?>

    <section id='content'>
        <p id='page-nav'><a href='index.php'>Home</a> > <a href='profile.php'>Profile</a> > <span class='current'>Settings</span></p> 
        <div class='group'>
            <div class='options-container'>
                <div class='options'>
                    <!--Button that directs to Change Name page-->
                    <a href='change-name.php'><button type='button' class='buttons'>Change Name</button></a> 
                </div> 
                <div class='options'>
                    <!--Button that directs to Change Email page-->
                    <a href='change-email.php'><button type='button' class='buttons'>Change Email</button></a>
                </div>
                <div class='options'>
                    <!--Button that directs to Change Password page-->
                    <a href='change-password.php'><button type='button' class='buttons'>Change Password</button></a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
