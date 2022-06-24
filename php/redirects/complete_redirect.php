<?php

    include("../helpers/todo_db.php");

    $todoDB->connect();

    require_once('../pages/complete.php');

    $todoDB->close();

?>