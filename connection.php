<!-- This file is used to establish a connection to the database. -->

<?php
    $link = mysqli_connect("localhost", "root", "", "xd");

    if(mysqli_connect_error()) {
        die("ERROR: Unable to connect:" . mysqli_connect_error());
    }
    
    
?>