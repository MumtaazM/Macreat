<?php

// connect to the database
require_once "config.php";

//check if call was post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //access form's values when delete item button is clicked
    $name= $_POST['name'];
    $fat = $_POST['fat'];
    $carbs= $_POST['carbs'];
    $protein = $_POST['protein'];

    //store query for deleting items from the food item's database
    $query = "DELETE FROM fooditems WHERE name = '$name' AND '$fat' AND '$carbs' AND '$protein'";

    //check if successful and return appropriate message
    if($result = mysqli_query($connect, $query)){
        echo "successful";
    }
    else{
        echo "Error: ". $query . "<br>" . mysqli_error($connect);
    }

    //close the connection to the database
    mysqli_close($connect);
}

?>