<?php

// connect to the database
require_once "config.php";

//check if call was post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo 'here';
    //access form's values when attempt to submit signup form occurs
    $username = $_POST['username'];
    $password = $_POST['password'];

    //store query to insert username and password where values in db are equal to input given
    $query = "INSERT INTO users (username,password) VALUES('$username', '$password')";

    //return appropriate message
    if($result = mysqli_query($connect, $query)){
        echo "registration successful";
    }
    else{
        echo "Error: ". $query . "<br>" . mysqli_error($connect);
    }

    //close the connection to the database
    mysqli_close($connect);
}

?>