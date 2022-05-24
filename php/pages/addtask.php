<?php

    //session_start();

    require_once(__DIR__ . "/../config/lib.php");

    $_SESSION["url"] = "add";

?>

<br>
<div class="container">
    <div class="row">
        <div class="col"/>
        <div class="col">
            <div class="input-group">
                <form action="" class="form-container" method="POST">
                    <h2>Add Task</h2> <br> 
                
                    <h4 for="title">Task:</h4>
                    <input type="text" id="title" name="task" class="form-control" style="width: 100%;" required>    
                    
                    <br> <br>

                    <h4>Description:</h4> 
                    <textarea class="form-control" id="description" name="description" rows="3" style="width: 100%;"></textarea> <br> <br>

                    <h4>Status:</h4>
                    <select class="form-control" style="width: 100%;" id="status" name="status">
                        <option>Not-Started</option>
                        <option>In-Progress</option>
                        <option>Done</option>
                        <option>OverDue</option>
                    </select>

                    <br> <br>

                    <h4>Date & Time:</h4> 
                    <input id="due-date" type="date" name="dateTime" class="form-control" style="width: 100%;"> <br> <br> 

                    <button id="add" type="submit" name="submit" class="btn">Add Task</button> 
                    <button id="cancel" type="button" class="btn cancel">Cancel</button>

                </form>
            </div>
        </div>
        <div class="col"/>
    </div>
</div>
<style>
    .btn {
        background-color: #5bc15f;
        color: white;
        border: none;
        width: 100px;
        padding: 7px 10px;
        margin-bottom: 10px;
    
    }
</style>