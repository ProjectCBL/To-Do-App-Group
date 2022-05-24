<?php

    require_once(__DIR__ . "/../config/lib.php");

    session_start();

    $todoDB->connect();

    $tId = $_POST["tID"];

    $query = "DELETE FROM Tasks WHERE tID={$tId}";

    if($todoDB->executeQuery($query)){
        $_SESSION["url"] = "all";
        require_once("../redirects/todo_redirect.php");
    }
    else{
        echo "Error!!";
    }

    $todoDB->close();

?>