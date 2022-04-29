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
      die("Connection to DB failed.");
    }
    else {
      echo "Connected to DB!";
    }

    // insertion into users table
    $query = "INSERT INTO users(UserName, Password) VALUES('jupiter', ';%Zns&m3Tv')";

    $insert = mysqli_query($conn, $query);

    if (!$insert) {
      echo "Issue with inserting username and password.";
    }
    else {
      echo "Username and password inserted correctly!";
    }

    // insertion into tasks table
    $query = "INSERT INTO Tasks(Title, Description, AccountID, Status, EntryDate, DueDate) VALUES
    ('Take Out the Trash', 'Put it in the green bin.', 1, 'Not-Started', NULL, NULL)";

    $insert = mysqli_query($conn, $query);

    if (!$insert) {
      echo "Issue with inserting task.";
    }
    else {
      echo "Task inserted correctly!";
    }

    // close connection to DB
    mysqli_close($conn);
    
?>