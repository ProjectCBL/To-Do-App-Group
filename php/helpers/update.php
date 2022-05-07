<?php

    include_once('todo_db.php');

    $todoDB->connect();

    $tId = $_POST["tID"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $dueDate = $_POST["dueDate"];

    $query = "UPDATE Tasks SET 
        Title='{$title}',
        Description='{$description}',
        status='{$status}',
        DueDate='{$dueDate}'
    WHERE tID={$tId}";

    if($todoDB->executeQuery($query)){
        require_once("../pages/todo.php");
    }
    else{
        echo "Error!!";
    }

    $todoDB->close();

?>