<?php

// connect to the database
require "config.php";

//select all rows
$query = "SELECT * FROM todayitems";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

//store total from fat, carbs and protein columns
$query2 = "SELECT  SUM(fat) AS sum_fat FROM todayitems";
$result2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result2);
$fat = $row[0];

$query3 = "SELECT  SUM(carbs) AS sum_carbs FROM todayitems";
$result3 = mysqli_query($connect, $query3) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result3);
$carbs = $row[0];

$query4 = "SELECT  SUM(protein) AS sum_protein FROM todayitems";
$result4 = mysqli_query($connect, $query4) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result4);
$protein = $row[0];

//return table in proper html format
echo "<table id='today-table'>";
echo "<tr><th><img src='assets/salmon.png'></th><th>Fat</th><th>Carbs</th><th>Protein</th><th>Add/Delete</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row["name"]}</td><td>{$row["fat"]}</td><td>{$row["carbs"]}</td><td>{$row["protein"]}</td><td><input type='checkbox'></td></tr>";
}
echo "<tr><td>Total</td><td>$fat"."g</td><td>$carbs"."g</td><td>$protein"."g</td><td></td></tr>";
echo "</table>";
?>