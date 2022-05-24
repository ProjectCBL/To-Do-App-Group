<?php

    require_once(__DIR__ . "/../config/lib.php");

    session_start();

    $_SESSION["url"] = "update";

    $todoDB->connect();

    $tId = $_POST["tID"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $dueDate = $_POST["dueDate"];

    if($todoDB->updatePreppedTask($tId, $title, $description, $status, $dueDate)){
        require_once("../redirects/todo_redirect.php");
    }
    else{
        echo "Error!!";
    }

    $todoDB->close();

?>