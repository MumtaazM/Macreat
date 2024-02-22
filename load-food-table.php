<?php

// connect to the database
require "config.php";

//select all rows
$query = "SELECT * FROM fooditems";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

//store total from fat, carbs and protein columns
$query2 = "SELECT  SUM(fat) AS sum_fat FROM fooditems";
$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result2);
$fat = $row[0].'g';

$query3 = "SELECT  SUM(carbs) AS sum_carbs FROM fooditems";
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result3);
$carbs = $row[0].'g';

$query4 = "SELECT  SUM(protein) AS sum_protein FROM fooditems";
$result4 = mysqli_query($connect, $query4) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result4);
$protein = $row[0].'g';


//return table in proper html format
echo "<table id='food-items'>";
echo "<tr><th><img src='assets/tomatoes.png'></th><th>Fat</th><th>Carbs</th><th>Protein</th><th>Add/Delete</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row["name"]}</td><td>{$row["fat"]}g</td><td>{$row["carbs"]}g</td><td>{$row["protein"]}g</td><td><input type='checkbox'></td></tr>";
}
echo "<tr><td>Total</td><td>$fat</td><td>$carbs</td><td>$protein</td><td></td></tr>";
echo "</table>";
?>