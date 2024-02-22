let food_pattern = /([A-Za-z])+/g;
let nutrient_pattern = /([0-9])+/g;

$(document).ready(function () {
    $("#add-item-btn").click(function () {
        let table = document.getElementById("food-items");
        let food = document.getElementById("food-input");
        let fat = document.getElementById("fat-input");
        let carb = document.getElementById("carb-input");
        let protein = document.getElementById("protein-input");

        if (food.value == "" || fat.value == "" || carb.value == "" || protein.value == "") {
            alert("fields are incomplete")
        }
        else if (food.value.search(food_pattern) != 0) {
            alert("food field needs to be a-z")
        }
        else if (fat.value.search(nutrient_pattern) != 0 || carb.value.search(nutrient_pattern) != 0 || protein.value.search(nutrient_pattern) != 0) {
            alert("nutrient fields needs to be a number in (g)")
        }
        else {
            //add food to the database
            $.ajax({
                method: "post",
                url: "add-food-items.php",
                data: { 
                    name: food.value, 
                    fat: fat.value ,
                    carbs: carb.value,
                    protein: protein.value
                }
            }).done(function(){
                $("#load-food").load("load-food-table.php");
            })

            //reset input values
            food.value = "";
            fat.value = "";
            carb.value = "";
            protein.value = "";
        }
    })
})

$(document).ready(function () {
    $("#add-tdy-btn").click(function () {
        let table = document.getElementById("food-items");

        for (let i = 1; i < table.rows.length - 1; i++) {

            let row = table.rows[i];
            let cb = row.cells[4].childNodes[0];


            if (cb.checked) {
                cb.checked = false;
                console.log("added")
                //add to database and reload
                $.ajax({
                    method: "post",
                    url: "add-today-items.php",
                    data: { 
                        name: row.cells[0].innerHTML, 
                        fat: row.cells[1].innerHTML,
                        carbs: row.cells[2].innerHTML,
                        protein: row.cells[3].innerHTML
                    }
                }).done(function(){
                    $("#load-tdy").load("load-today-table.php");
                })
            }
        }
    })
})
