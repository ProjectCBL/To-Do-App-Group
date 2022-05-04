$(document).ready(function(){

    $("#login").click(function(){

        let username = $("#username").val();
        let password = $("#pass").val();
        
        if (username.length == 0 || password.length == 0){
            $("#invalid").html("Missing field, please correct...");
        }
        else{
            
            let dataParameters = `username=${username}&password=${password}`;

            $.ajax({
                type: "GET",
                url: "../Services/Login/login.php",
                data: dataParameters,
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
            url: "../Services/Login/signup_redirect.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

});

