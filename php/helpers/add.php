<?php

    include_once('todo_db.php');

    session_start();

    $todoDB->connect();

    $tId = $_POST["tID"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $dueDate = $_POST["dueDate"];
    $accountId = $todoDB->getUserId($_SESSION["username"]);

    echo '<script>console.log("' . $dueDate . '");</script>';

    if($todoDB->insertPreppedNewTask($title, $description, $accountId, $status, date("Y-m-d"), $dueDate)){
        require_once("../pages/todo.php");
    }
    else{
        echo "Error!!";
    }

    $todoDB->close();

?>