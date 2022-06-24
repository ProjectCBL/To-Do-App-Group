$(document).ready(function(){

    // #region Universal Buttons Actions (Buttons present anywhere in the app)

    // Logs user out of current session and returns them to login
    $("#log-out").click(function(event){

        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "../php/core/logout.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

    // Redirects the user to the add task page
    $("#add-item").click(function(event){

        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "../php/redirects/add_redirect.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

    $("#get-ongoing").click(function(event){

        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "../php/redirects/ongoing_redirect.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

    $("#get-complete").click(function(event){

        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "../php/redirects/complete_redirect.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

    $("#home").click(function(event){

        event.preventDefault(); 

        $.ajax({
            type: "GET",
            url: "../php/pages/todo.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

    // #endregion

    // #region Task List Actions

    // Redirects the user to the page to edit the selected task
    $("a[id^=update-redirect]").click(function(event){

        let data = { tID : $(this).attr("id").substring(15) };

        event.preventDefault();

        $.ajax({
            type: "GET",
            data: data,
            cache: false,
            url: "../php/pages/updatetask.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

    // #endregion

    // #region Add/Update/Delete Actions

    // Cancels the current action and redirects the user back to list
    $("#cancel").click(function(event){

        event.preventDefault(); 

        $.ajax({
            type: "GET",
            url: "../php/pages/todo.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

    // (UPDATE) Sends form data to server to update current task entry
    $("button[id^=update-task]").click(function(event){

        let data = {
            tID : $(this).attr("id").substring(11),
            title : $("#title").val(),
            description : $("#description").val(),
            status : $("#status").val(),
            dueDate : ($("#due-date").val() != '') ? $("#due-date").val() : "null"
        };

        event.preventDefault(); 

        console.log(data.dueDate);

        $.ajax({
            type: "POST",
            url: "../php/core/update.php",
            data: data,
            cache: false,
            success: (data)=>{
                (data.includes("Error!!")) ? 
                    alert("Error occurred updating record") : 
                    $("#body").html(data);
            }
        });

    });

    // (DELETE) Sends ID of the current task to server for deletion
    $("button[id^=delete]").click(function(event){

        let data = { tID : $(this).attr("id").substring(6) };

        event.preventDefault(); 

        $.ajax({
            type: "POST",
            url: "../php/core/delete.php",
            data: data,
            cache: false,
            success: (data)=>{
                (data.includes("Error!!")) ? 
                    alert("Error occurred deleting record") : 
                    $("#body").html(data);
            }
        });

    });

    // (INSERT) Sends form data to server for insertion of a new task
    $("#add").click(function(event){

        let data = {
            tID : $(this).attr("id").substring(11),
            title : $("#title").val(),
            description : $("#description").val(),
            status : $("#status").val(),
            dueDate : ($("#due-date").val() != '') ? $("#due-date").val() : "null"
        };

        event.preventDefault(); 

        $.ajax({
            type: "POST",
            url: "../php/core/add.php",
            data: data,
            cache: false,
            success: (data)=>{
                (data.includes("Error!!")) ? 
                    alert("Error occurred updating record") : 
                    $("#body").html(data);
            }
        });

    });

    // #endregion

});