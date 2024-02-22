$(document).ready(function () {
    let dt = new Date()
    let d = new Date(Date.now())
    let date = dt.getDate() + "/" + (dt.getMonth() + 1) + "/" + dt.getFullYear()


    let minutes;
    if (dt.getMinutes().toString().length == 1) {
        minutes = "0" + dt.getMinutes();
    } else {
        minutes = dt.getMinutes()
    }

    let time;
    if (dt.getHours() > 12) {
        time = dt.getHours() - 12 + ":" + minutes + " PM";
    }
    else {
        time = dt.getHours() + ":" + minutes + " AM";
    }

    let dom = document.getElementById("time");
    dom.innerHTML = date + ", " + time
    console.log(date + ", " + time)
})