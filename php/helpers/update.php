<?php

    include_once('todo_db.php');

    $todoDB->connect();

    $tId = $_POST["tID"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $dueDate = $_POST["dueDate"];

    if($todoDB->updatePreppedTask($tId, $title, $description, $status, $dueDate)){
        require_once("../pages/todo.php");
    }
    else{
        echo "Error!!";
    }

    $todoDB->close();

?>