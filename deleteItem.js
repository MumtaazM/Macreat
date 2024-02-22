$(document).ready(function () {
    $("#delete-item-btn").click(function (event) {
        let table = document.getElementById("food-items");

        for (let i = 1; i < table.rows.length - 1; i++) {
            row = table.rows[i];
            let checkbox = row.cells[4].childNodes[0];


            if (checkbox.checked) {
                //delete from database and reload
                $.ajax({
                    method: "post",
                    url: "delete-food-items.php",
                    data: { 
                        name: row.cells[0].innerHTML, 
                        fat: row.cells[1].innerHTML,
                        carbs: row.cells[2].innerHTML,
                        protein: row.cells[3].innerHTML
                    }
                }).done(function(){
                    $("#load-food").load("load-food-table.php");
                })

                row.remove();
                
            }
        }
    })
})


