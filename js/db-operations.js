$(document).ready(function(){

    $("button[id^=update-task]").click(function(event){

        let data = {
            tID : $(this).attr("id").substring(11),
            title : $("#title").val(),
            description : $("#description").val(),
            status : $("#status").val(),
            dueDate : $("#due-date").val()
        };

        event.preventDefault(); 

        $.ajax({
            type: "POST",
            url: "../php/helpers/update.php",
            data: data,
            cache: false,
            success: (data)=>{
                console.log(data);
                (data.includes("Error!!")) ? 
                    alert("Error occurred updating record") : 
                    $("#body").html(data);
            }
        });

    });

    $("#add").click(function(event){

        let data = {
            tID : $(this).attr("id").substring(11),
            title : $("#title").val(),
            description : $("#description").val(),
            status : $("#status").val(),
            dueDate : $("#due-date").val()
        };

        event.preventDefault(); 

        $.ajax({
            type: "POST",
            url: "../php/helpers/add.php",
            data: data,
            cache: false,
            success: (data)=>{
                console.log(data);
                (data.includes("Error!!")) ? 
                    alert("Error occurred updating record") : 
                    $("#body").html(data);
            }
        });

    });
    
});