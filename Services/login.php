<?php

    include 'todo_db.php';

    $url = $_SERVER['REQUEST_URI'];

    // In the case of username and password containing unique characters
    // parsing is required to retrieve to whole string without missing 
    // characters.
    $username = substr($url, strpos($url, "?username=") + 10, strpos($url, "&password=") - (strpos($url, "?username=") + 10));
    $password = substr($url, strpos($url, "&password=") + 10);

    $todoDB->connect();

    if($todoDB->doAccountDetailsMatch($username, $password)){
        require_once('../Pages/Success.html');
    }
    else{
        require_once('../Pages/login_fail.html');
    }

    $todoDB->close();

?>