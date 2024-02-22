$(document).ready(function () {
    $("#login-form").submit(function (e) {
        e.preventDefault();

        let user =document.getElementById("username-login");
        let pw =document.getElementById("password-login");
        let error = document.getElementById("login-error");

        //verify username and password
        if (user.value == "") {
            error.innerHTML = "username field empty";
            user.style.borderColor = "red";
                        
        }
        else if (pw.value == "") {
            error.innerHTML = "password field empty";
            pw.style.borderColor = "red";
        }
        else{
            $.ajax({
                method: "POST",
                url: 'login.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
    
                    // user is logged in successfully in the back-end
                    // let's redirect
                    if (jsonData.success == "1")
                    {
                        // alert('Valid Credentials!');
                        user.style.borderColor = "green";
                        pw.style.borderColor = "green";
                        error.innerHTML = "";
                        window.location.replace("dashboard.php");
                    }
                    else
                    {
                        // alert('Invalid Credentials!');
                        user.style.borderColor = "red";
                        pw.style.borderColor = "red";
                        error.innerHTML = "incorrect username and or password";
                    }
                }
            });
        }

    });
});