<?php

    session_start();

    if($_SESSION["url"] != "add"){

        $_SESSION["url"] = "all";

        require_once(__DIR__ . "/../config/lib.php");

        $todoDB->connect();

        $tId = $_POST["tID"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $status = $_POST["status"];
        $dueDate = $_POST["dueDate"];
        $accountId = $todoDB->getUserId($_SESSION["username"]);

        if($todoDB->insertPreppedNewTask($title, $description, $accountId, $status, date("Y-m-d"), $dueDate)){
            require_once("../redirects/todo_redirect.php");
        }
        else{
            echo "Error!!";
        }

        $todoDB->close();
        exit;

    }

?>