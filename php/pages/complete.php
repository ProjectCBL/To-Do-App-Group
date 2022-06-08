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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="../../js/in-app-actions.js"></script>
</head> 
<body id="body">
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-md
                    justify-content-start
                    
                    col-12">
            <a class="navbar-brand" id="home" style="cursor: pointer;">To-Do</a>
            <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="add-item">Add Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="get-ongoing">Ongoing Tasks</a> <!-- add link -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="get-complete">Completed Tasks</a> <!-- add link -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="log-out" href="#">Log Out</a> <!-- add link -->
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
        
                $query = $todoDB->getAllCompleteUserTasks($username);

                echo '<table>';

                $counter = 0;

                while($row = mysqli_fetch_assoc($query)) {

                    if ($row["Status"] == "OverDue") {

                        echo '<tr class = "overdue">';

                    }

                      else if ($row["Status"] == "Done") {
    
                        echo '<tr class = "done">';
    
                    }
    
                      else if ($row["Status"] == "Not-Started") {
    
                        echo '<tr class = "notstarted">';

                    }
    
                      else if ($row["Status"] == "In-Progress") {
    
                        echo '<tr class = "inprogress">';
    
                    }

                    echo

                        '<td>' . $row["Title"] . '</td>' .
                        '<td>Description: ' . $row["Description"] . '</td>' .

                        '<td>
                        <button class="btn btn-primary" role="button">
                        <a id="update-redirect' . $row["tID"] . '">Edit</a> 
                        </button>
                        </td>' .

                        '<td>
                          <button class="btn btn-primary" data-toggle="collapse" data-target="#c' . $counter . '" role="button">
                            Open
                          </button>
                        </td>' .

                        '<td class="collapse" id="c' . $counter . '">' .
                              '<p>Due Date: ' . $row["DueDate"] . '</p>' .
                        '</td>' .


                        '<td class="collapse" id="c' . $counter . '">' .
                          '<p>Status: ' . $row["Status"] . '</p>' .
                        '</td>' .

                      '</tr>';

                      $counter += 1;
                }

                echo '</table>';

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
        padding: 2px;
        color: black;
    }

    body {

        background: linear-gradient(90deg, #d5d1eb, #beb6f0, #d5d1eb);
    }

    table, tr, td {

        border: 4px #b2abda solid;
        background-color: #ffffff;
        padding: 6px;
    }

    tr.overdue {

        color: red;
    }


    tr.done {

        color: #2bd500;
    }



    tr.notstarted {

        color: gray;
    }



    tr.inprogress {

        color: blue;
    }


    td {

    font-size: 18px;
    text-align: center;

    }

    

    
    label {
        height: 20px;
        width: 30px;
        position: relative;
        border-bottom: 1px solid;
        padding: 4px;
        box-sizing: border-box;

    }
        

</style>
   
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script>
    $(document).on('click',function(){
    $('.collapse').collapse('hide');
    })
</script>
</body>
</html>