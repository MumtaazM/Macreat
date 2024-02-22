<!-- main content -->
<?php include "chart.php" ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">
        <link href="DB.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    </head>

    <body>
        <header>
            <img src="assets\macreat-logo.png">
            <p id="time"></p>
        </header>
        <hr>
        <div>
            <div id="side-bar">
                <a onclick="displayFoodList()">Food List</a>
                <a onclick="displayToday()">Today</a>
                <a onclick="displayChart()">Chart</a>
            </div>
            <main>

                <!-- food list view  1/3 views-->
                <div class="content" id="food-list-content">
                    <h2>Food Items</h2>

                    <div id="load-food">
                        <?php
                        include("load-food-table.php");
                        ?>
                    </div>
                    <!-- table results from database-->

                    <!-- items to add from user input -->
                    <div id="inputs">
                        <input type="text" id="food-input">
                        <input type="text" id="fat-input">
                        <input type="text" id="carb-input">
                        <input type="text" id="protein-input">
                    </div>

                    <!-- buttons for adding and deleting items -->
                    <div id="buttons">
                        <button id="add-tdy-btn">Add to today's list</button>
                        <button id="add-item-btn">Add Item</button>
                        <button id="delete-item-btn">Delete Item</button>
                    </div>
                </div>

                <!-- today list view  2/3 views-->
                <div class="content" id="today-content">
                    <h2>Today's Items</h2>
                    <!-- table results from database-->
                    <div id="load-tdy">
                        <?php
                        include("load-today-table.php");
                        ?>
                    </div>
                    <div>
                        <!-- button to remove items from today's list and database -->
                        <button id="remove-tdy-btn">Remove from today's list</button>
                    </div>

                </div>
                <!-- chart view  3/3 views-->

                <div class="content" id="chart-content">
                    <h2>Macronutrient Intake</h2>
                    <div><canvas id="myChart" style="width:100%;"></canvas></div>

                </div>
            </main>
        </div>
        <footer>
            <p>© All rights reserved, 2023</p>
        </footer>

        <!-- scripts -->
        <script src="time.js"></script>
        <script src="display-view.js"></script>
        <script src="addItem.js"></script>
        <script src="deleteItem.js"></script>
        <script src="delete-tdy-items.js"></script>
        <script>
            $(document).ready(function () {
                const xValues = ['Fat', 'Carbs', 'Protein'];
                const yValues = [macro[[0]], macro[1], macro[2]];
                const barColors = ['red', 'green', 'blue'];

                new Chart('myChart', {
                    type: 'pie',
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        legend: { display: false },
                        title: {
                            display: false,
                            text: 'Macronutrients'
                        }
                    }
                });
            })
        </script>
    </body>

</html>