$(document).ready(function(){

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

    $("#login-redirect").click(function(event){

        event.preventDefault();     // Keeps the page from freshing back to home/login screen

        $.ajax({
            type: "GET",
            url: "../php/redirects/login_redirect.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

});