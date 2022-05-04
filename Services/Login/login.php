<?php

    include('../Database/todo_db.php');

    $todoDB->connect();

    $url = $_SERVER['REQUEST_URI'];

    // In the case of username and password containing unique characters
    // parsing is required to retrieve to whole string without missing 
    // characters.
    $username = substr(
        $url, 
        strpos($url, "?username=") + 10, 
        strpos($url, "&password=") - (strpos($url, "?username=") + 10)
    );
    $password = substr(
        $url, 
        strpos($url, "&password=") + 10, 
        strlen($todoDB->getUserRow($username)["Password"])
    );

    if($todoDB->doAccountDetailsMatch($username, $password)){
        require_once('../../Pages/Success.html');
    }
    else{
        echo "Login Error!!";
    }

    $todoDB->close();

?>