<?php

    // Make sure to install PHP and place php.ini in php directory.
    // To launch the server in vscode -> CRTL+SHFT+B -> Select the task (if not launched automatically)

	session_start();

    /*switch($_SESSION["url"]){
        case "add":
        case "update":
        case "todo":
            require_once(__DIR__ . "/php/pages/todo.php");
            break;
        default:
            require_once(__DIR__ . '/html/login.html');
            break;
    }*/

    require_once('./html/login.html');
    
?>