$(document).ready(function(){

    $("#login").click(function(){

        const data = {
            username : $("#username").val(),
            password : $("#pass").val()
        };
        
        if (data.username.length == 0 || data.password.length == 0){
            $("#invalid").html("Missing field, please correct...");
        }
        else{

            $.ajax({
                type: "POST",
                url: "../php/helpers/login.php",
                data: data,
                cache: false,
                success: (data)=>{
                    console.log(data);
                    (data.includes("Login Error!!")) ? 
                        $("#invalid").html("Account details don't match...") : 
                        $("#body").html(data);
                }
            });

        }

    });

    $("#signup").click(function(event){

        event.preventDefault();     // Keeps the page from freshing back to home/login screen

        $.ajax({
            type: "GET",
            url: "../php/redirects/signup_redirect.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

});

