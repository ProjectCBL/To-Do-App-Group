$(document).ready(function(){

    // Send login info to server for comparison if field isn't missing
    $("#login").unbind('click').click(function(){

        const data = {
            username : $("#username").val(),
            password : $("#pass").val()
        };
        
        if (data.username.length == 0 || data.password.length == 0){
            $("#invalid").html("Missing field, please correct...");
            return;
        }

        $.ajax({
            type: "POST",
            url: "../php/service/login.php",
            data: data,
            cache: false,
            success: (data)=>{
                console.log(data);
                (data.includes("Login Error!!")) ? 
                    $("#invalid").html("Account details don't match...") : 
                    $("#body").html(data);
            }
        });

    });

    // Redirects users to sign up page
    $("#signup").unbind('click').click(function(event){

        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "../php/redirects/signup_redirect.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

});