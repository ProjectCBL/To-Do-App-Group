$(document).ready(function(){

    // Sends form data to server to insert new user if no missing field
    $("#sign-up").click(function(){

        let content = {}

        $("#sign-up-content div input").toArray().forEach(e => {
            content[e.name] = e.value;
        });

        for(let name in content) {
            if (content[name].length == 0){
                $("#invalid").html("Missing field, please correct...");
                return;
            }
        }
        
        $.ajax({
            type: "POST",
            url: "../php/helpers/signup.php",
            data: content,
            cache: false,
            success: (data)=>{
                console.log(data);
                (data.includes("Account Creation Error!!")) ? 
                    $("#invalid").html("Username already exists...") : 
                    $("#body").html(data);
            }
        });
        
    });

    // Redirects the user from the sign up page to the login page
    $("#login-redirect").click(function(event){

        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "../php/redirects/login_redirect.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

});