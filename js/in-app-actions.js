$(document).ready(function(){

    // #region Universal Buttons Actions (Buttons present anywhere in the app)

    // Logs user out of current session and returns them to login
    $("#log-out").unbind('click').click(function(event){

        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "../php/service/logout.php",
            success: (data)=>{$("#body").html(data);}
        });

    });

    // Redirects the user to the add task page
    $("#add-item").unbind('click').click(function(event){

        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "../php/redirects/add_redirect.php",
            success: (data)=>{$("#task").html(data);}
        });

    });

    // #endregion

    // #region Task List Actions

    // Redirects the user to the page to edit the selected task
    $("a[id^=update-redirect]").unbind('click').click(function(event){

        console.log("Edit");

        let data = { tID : $(this).attr("id").substring(15) };

        event.preventDefault();

        $.ajax({
            type: "GET",
            data: data,
            cache: false,
            url: "../php/pages/updatetask.php",
            success: (data)=>{$("#task").html(data);}
        });

    });

    $("#home").unbind('click').click(function(event){

        event.preventDefault(); 

        $.ajax({
            type: "GET",
            url: "../php/redirects/todo_redirect.php",
            success: (data)=>{
                $("#task").html(data);
            }
        });

    });

    $("#ongoing").unbind('click').click(function(event){

        event.preventDefault(); 

        $.ajax({
            type: "GET",
            url: "../php/service/retrieve_incomplete.php",
            success: (data)=>{
                $("#task").html(data);
            }
        });

    });

    $("#completed").unbind('click').click(function(event){

        event.preventDefault(); 

        $.ajax({
            type: "GET",
            url: "../php/service/retrieve_completed.php",
            success: (data)=>{
                $("#task").html(data);
            }
        });

    });

    // Stops the current action and redirects the user back to list
    $("#cancel").unbind('click').click(function(event){

        event.preventDefault(); 

        $.ajax({
            type: "GET",
            url: "../php/redirects/todo_redirect.php",
            success: (data)=>{
                $("#task").html(data);
            }
        });

    });

    // #endregion

    // #region Add/Update/Delete Actions

    // (UPDATE) Sends form data to server to update current task entry
    $("button[id^=update-task]").unbind('click').click(function(event){

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
            url: "../php/service/update.php",
            data: data,
            cache: false,
            success: (data)=>{
                (data.includes("Error!!")) ? 
                    alert("Error occurred updating record") : 
                    $("#task").html(data);
            }
        });

    });

    // (DELETE) Sends ID of the current task to server for deletion
    $("button[id^=delete]").unbind('click').click(function(event){

        let data = { tID : $(this).attr("id").substring(6) };

        event.preventDefault(); 

        $.ajax({
            type: "POST",
            url: "../php/service/delete.php",
            data: data,
            cache: false,
            success: (data)=>{
                (data.includes("Error!!")) ? 
                    alert("Error occurred deleting record") : 
                    $("#task").html(data);
            }
        });

    });

    // (INSERT) Sends form data to server for insertion of a new task
    $("#add").unbind('click').unbind('click').click(function(event){

        console.log("Something is being added...");

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
            url: "../php/service/add.php",
            data: data,
            cache: false,
            success: (data)=>{
                (data.includes("Error!!")) ? 
                    alert("Error occurred updating record") : 
                    $("#task").html(data);
            }
        });

    });

    // #endregion

});