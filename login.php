<?php

// connect to the database
require_once "config.php";


//check if call was post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //access form's values when attempt to submit login form occurs
    $username = $_POST['username'];
    $password = $_POST['password'];

    //store query to select username and password from users table in db
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    //store result of query
    $result = mysqli_query($connect, $query);

    //return appropriate message 
    if(mysqli_num_rows($result) > 0){
        echo json_encode(array('success' => 1));
    }
    else{
        echo json_encode(array('success' => 0));
    }

    //close the connection to the database
    mysqli_close($connect);
}


?>