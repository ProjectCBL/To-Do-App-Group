<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title style="cursor: pointer;">To-Do</title>
  <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
  
</head> 
<body id="body">
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-md
                    justify-content-start
                    
                    col-12">
            <a class="navbar-brand" style="cursor: pointer;" id="log-out">To-Do</a>
            <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="addtask.html" id="add-item">Add Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Ongoing Tasks</a> <!-- add link -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Completed Tasks</a> <!-- add link -->
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col"/>
        <div class="col">
            
            <br> <h2 class="justify-content-center text-center">Tasks</h2> <br> 

            <center>

            <?php

                include_once('../helpers/todo_db.php');
                include_once('../helpers/style.php');

                $todoDB->connect();

                $username = $_SESSION["username"];
        
                $query = $todoDB->getAllUserTasks($username);

                while($row = mysqli_fetch_assoc($query)){

                    $date = ($row["DueDate"]) ? (" | Due Date: " . $row["DueDate"]) : ("");

                    echo '<div class="card" style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title">' . $row["Title"] . '</h5>' .
                            '<p class="card-text" style="margin: 0">Description: ' . $row["Description"] . '</p>' .
                            '<p class="card-text" style="margin: 0">Entry Date: ' . $row["EntryDate"] . $date . '</p>' .
                            '<p class="card-text" style="margin-bottom: 10px">Status: <b ' . getStatusStyle($row["Status"]) . '> ' . $row["Status"] . '</b></p>' .
                            '<a id="update-redirect' . $row["tID"] . '" class="btn btn-outline-primary">Edit</a>
                        </div>
                    </div>
                    <br>
                    ';
                }

                $todoDB->close();

            ?>

            </center>

        </div>
        <div class="col"/>
    </div>
</div>

<style>
   
    nav {
        background-color: #e7e4f7;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    li {
        float: left;
    }

    a {
        display: block;
        padding: 8px;
        color: black;  
    }

    body {
        background: linear-gradient(90deg, #d5d1eb, #beb6f0, #d5d1eb);
    }

</style>
   
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="../../js/in-app-actions.js"></script>
</body>
</html>