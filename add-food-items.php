<?php

// connect to the database
require_once "config.php";

//check if call was post
if($_SERVER['REQUEST_METHOD'] == "POST"){

    //access form's values when attempting submission of food-items form
    $name= $_POST['name'];
    $fat = $_POST['fat'];
    $carbs= $_POST['carbs'];
    $protein = $_POST['protein'];
    
    //store query for inserting values into the food item's database
    $query = "INSERT INTO fooditems (name, fat, carbs, protein) VALUES('$name', '$fat', '$carbs', '$protein')";

    //check if successful and return appropriate message
    if($result = mysqli_query($connect, $query)){
        echo "successful";
    }
    else{
        echo "Error: ". $query . "<br>" . mysqli_error($connect);
    }
}

?>