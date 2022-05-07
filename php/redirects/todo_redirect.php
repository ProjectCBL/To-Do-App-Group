<?php

    include("../helpers/todo_db.php");

    $todoDB->connect();

    require_once('../pages/todo.php?username=$_SESSION["username"]&url=$_SESSION["url"]');

    $todoDB->close();

?>