<?php
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    //store connection variables
    $host = 'localhost';
    $dbname = 'database';
    $user = 'root';
    $pass = '';
    
    /* create the connection */
    $connect = mysqli_connect($host, $user, $pass, $dbname);
    
    // Check connection
    if($connect === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    

?>