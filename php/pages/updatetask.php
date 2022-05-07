<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do</title>
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
                        <a class="nav-link" href="todo.html">Home</a>
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

<body>

<div class="container">
    <div class="row">
        <div class="col"/>
        <div class="col">
            <div class="input-group">
                <form action="" class="form-container" method="POST">
                    <h2>Add Task</h2> <br> 
                
                    <?php
                        
                        include_once('../helpers/todo_db.php');

                        session_start();
                        
                        $username = $_SESSION["username"];
                        $id = $_GET["tID"];

                        $todoDB->connect();

                        $row = mysqli_fetch_assoc($todoDB->getTask($id));

                        echo '<h4 for="title">Task:</h4>';
                        echo '<input type="text" id="title" name="task" class="form-control" style="width: 100%;" required>';

                        echo "<script>$('#title').attr('value', '" . $row["Title"] . "');</script>";
                        
                        echo '<br> <br>';

                        echo '<h4>Description:</h4>'; 
                        echo '<textarea class="form-control" id="description" name="description" rows="3" style="width: 100%;"></textarea> <br> <br>';

                        echo "<script>$('#description').append('" . $row["Description"] . "');</script>";

                        echo '<h4>Status:</h4>';
                        echo '<select class="form-control" style="width: 100%;" id="status" name="status">
                            <option>Not-Started</option>
                            <option>In-Progress</option>
                            <option>Done</option>
                            <option>OverDue</option>
                        </select>';

                        echo "<script>$('#status').attr('value', '" . $row["Status"] . "');</script>";

                        echo '<br> <br>';

                        echo '<h4 >Date & Time:</h4>'; 
                        echo '<input id="due-date" type="date" name="dateTime" class="form-control" style="width: 100%;"> <br> <br>';

                        echo "<script>$('#due-date').val('" . $row["DueDate"] . "');</script>";

                        $todoDB->close();

                        echo '<button id="update-task' . $id . '" type="submit" name="submit" class="btn">Update</button>';
                        echo '<button id="cancel" type="button" class="btn cancel">Cancel</button>';

                    ?>
                    

                </form>
            </div>
        </div>
        <div class="col"/>
    </div>
</div>

<style>

h2 {
    text-align: center;
    color: white;
    padding-top: 10px;
  }

h4 {
    font-size: 20px;
    color: white;
}


form {
    padding: 30px 90px 30px 90px;
    margin: auto;
    
    resize: vertical;
    background: linear-gradient(90deg, #d5d1eb, #beb6f0, #d5d1eb);
    border-radius: 4px;
}

.form-control {
    
    width: 25%;
}



.btn {
    background-color: #5bc15f;
    color: white;
    border: none;
    width: 100px;
    padding: 7px 10px;
    margin-bottom: 10px;
   
}

.form-container .cancel {
    background-color: red;
    color: white;
    border: none;
    width: 100px;
    padding: 7px 10px;
    margin-bottom: 10px;
}

</style>

</body>
   
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
<script src="../../js/db-operations.js"></script>
</body>
</html>