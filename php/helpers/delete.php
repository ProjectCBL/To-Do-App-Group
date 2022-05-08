<?php

    include_once('todo_db.php');

    $todoDB->connect();

    $tId = $_POST["tID"];

    $query = "DELETE FROM Tasks WHERE tID={$tId}";

    if($todoDB->executeQuery($query)){
        require_once("../pages/todo.php");
    }
    else{
        echo "Error!!";
    }

    $todoDB->close();

?>