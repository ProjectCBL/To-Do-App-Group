<?php

    // Make sure to install PHP and place php.ini in php directory.
    // To launch the server in vscode -> CRTL+SHFT+B -> Select the task (if not launched automatically)

    include 'db.php';

    // DB information
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "todo";

    // open connection to DB
    $conn = connectToDB();

    // close connection to DB
    mysqli_close($conn);
    
?>