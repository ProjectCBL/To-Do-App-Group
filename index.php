<?php

    // Make sure to install PHP and place php.ini in php directory.
    // To launch the server in vscode -> CRTL+SHFT+B -> Select the task (if not launched automatically)

    // DB information
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "todo";

    // open connection to DB
    $conn = new mysqli($server, $username, $password, $database);

    if (!$conn) {
      die("Connection to DB failed!");
    }
    else {
      echo "Connected to DB!";
    }

    //
    // TODO: DO SOMETHING HERE!
    //

    // close connection to DB
    mysqli_close($conn);
    
?>