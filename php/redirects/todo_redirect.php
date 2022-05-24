<?php

    require_once(__DIR__ . "/../config/lib.php");

    if (empty($_SESSION["url"])){
        session_start();
    }

    $url = $_SESSION["url"];

    if($url = "add" || $url == "update"){
        $_SESSION["url"] = "all";
        include_once(__DIR__ . "/../service/retrieve_all.php"); 
    }

?>