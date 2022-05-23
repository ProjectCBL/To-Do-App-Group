<?php

    // Make sure to install PHP and place php.ini in php directory.
    // To launch the server in vscode -> CRTL+SHFT+B -> Select the task (if not launched automatically)

	session_start();

    /*switch($_SESSION["url"]){
        case "add":
            require_once("../../html/addtask.html");
            break;
        case "update":
        case "todo":
            require_once("./php/pages/todo.php");
            break;
        default:
            require_once('./html/login.html');
            break;
    }*/

    require_once('./html/login.html');
    
?>