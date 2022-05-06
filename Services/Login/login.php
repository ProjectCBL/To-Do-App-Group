<?php

    include('../Database/todo_db.php');

    $todoDB->connect();

    $username = $_POST["username"];
    $password = $_POST["password"];

    if($todoDB->doAccountDetailsMatch($username, $password)){
        require_once('../../Pages/todo.html');
    }
    else{
        echo "Login Error!!";
    }

    $todoDB->close();

?>