<?php

    $connect = new mysqli('localhost', 'root', '', 'flashlight');

    if(mysqli_connect_errno()) {
        die("The connection to the database could not be established.");
    }

?>