//displays the different views depending on which link was clicked in
//side navigation bar

$(document).ready(function () {
    //shows food list view as default view upon loading
    displayFoodList();
    //hides today view as default (sometimes pops up for some reason, should stop now)
    $("#today-content").hide(function () { })
    

})
function displayFoodList() {
    $("#today-content").hide(function () { })
    $("#food-list-content").show(function () { })
    $("#chart-content").hide(function () { })
}
function displayToday() {
    $("#today-content").show(function () { })
    $("#food-list-content").hide(function () { })
    $("#chart-content").hide(function () { })
}
function displayChart() {
    $("#today-content").hide(function () { })
    $("#food-list-content").hide(function () { })
    $("#chart-content").show(function () { })
}