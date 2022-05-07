<?php

    include_once 'todo_db.php';

    $todoDB->connect();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $isValid = $todoDB->doAccountDetailsMatch($username, $password);

    $todoDB->close();

    if($isValid){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["url"] = "todo";
        require_once('../../php/pages/todo.php');
    }
    else{
        echo "Login Error!!";
    }

?>