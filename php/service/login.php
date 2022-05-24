<?php

    require_once(__DIR__ . "/../config/lib.php");

    $todoDB->connect();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $isValid = $todoDB->doAccountDetailsMatch($username, $password);

    if($isValid){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["url"] = "todo";
        require_once('../pages/todo.php');
    }
    else{
        echo "Login Error!!";
    }

    $todoDB->close();

?>