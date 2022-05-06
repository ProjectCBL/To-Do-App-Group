<?php

    include 'todo_db.php';

    $todoDB->connect();

    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if($todoDB->isUserInDB($username) || 
        !$todoDB->insertNewUser($username, $password, $email, $firstName, $lastName)
    ){
        echo "Account Creation Error!!";
    }
    else{
        require_once("../../html/login.html");
    }

    $todoDB->close();

?>