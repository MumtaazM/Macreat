$(document).ready(function () {
    $("#remove-tdy-btn").click(function (event) {
        deleteTdy();
    })
})


function deleteTdy() {
    let table = document.getElementById("today-table");

    for (let i = 1; i < table.rows.length - 1; i++) {
        row = table.rows[i];
        let checkbox = row.cells[4].childNodes[0];


        if (checkbox.checked) {
            //delete from database
            $.ajax({
                method: "post",
                url: "delete-today-items.php",
                data: {
                    name: row.cells[0].innerHTML,
                    fat: row.cells[1].innerHTML,
                    carbs: row.cells[2].innerHTML,
                    protein: row.cells[3].innerHTML
                },
                success: function (data) {
                    alert(data);
                }
            }).done(function(){
                $("#load-tdy").load("load-today-table.php");
            })

            row.remove();

        }
    }
} 