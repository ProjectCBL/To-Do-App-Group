<?php

    include("../helpers/todo_db.php");

    $todoDB->connect();

    require_once('../pages/ongoing.php');

    $todoDB->close();

?>