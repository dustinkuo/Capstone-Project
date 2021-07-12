<?php

    //Store localhost and database information in variables
    $serverName='localhost';
    $dbUsername='root';
    $dbPassword='';
    $dbName='cardbreak';
    
    //Connect mysqli to website using variables
    $connection=mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    //If connecting to database fails
    if(!$connection){
        //Display error message
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
	