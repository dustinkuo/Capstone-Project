<?php
    include 'includes/header.inc.php'
?>

    <section id='content'>
    <div id='card-container'>
        </div>
        <div id='original'>
            <p id='page-nav'><a href='index.php'>Home</a> > <span class='current'>Profile</span></p>
            <div class='group'>
                <div class='options-container'>
                    <div class='options'>
                        <!--Button that directs to account details(account name and email)-->
                        <a href='account.php'><button type='button' class='buttons'>Account</button></a>
                    </div>
                    <div class='options'>
                        <!--Button that directs to settings-->
                        <a href='settings.php'><button type='button' class='buttons'>Settings</button></a>
                    </div>
                    <div class='options'>
                        <!--Button that directs to logout.inc.php that will process signing out. Session unset and destroy session,
                        then redirect user to home page-->
                        <a href='includes/logout.inc.php'><button type='button' class='buttons'>Log out</button></a>
                    </div>
                </div> 
            </div>   
    </section>
</body>
</html>