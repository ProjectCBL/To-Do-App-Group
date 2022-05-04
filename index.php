<?php

    // Make sure to install PHP and place php.ini in php directory.
    // To launch the server in vscode -> CRTL+SHFT+B -> Select the task (if not launched automatically)

    // DB information
    // replace with proper username and password
    $server = "localhost";
    $username = "root";
    $password = "password1";
    $database = "ToDo";

    // open connection to DB
    $conn = new mysqli($server, $username, $password, $database);

    if (!$conn) {
      die("Connection to DB failed.");
    }
    else {
      echo "Connected to DB!";
    }

    // insertion into users table
    // replace with proper SQL query
    $query = "INSERT INTO Users(UserName, Password) VALUES('jupiter', ';%Zns&m3Tv')";

    $insert = mysqli_query($conn, $query);

    if (!$insert) {
      echo "Issue with inserting username and password.";
    }
    else {
      echo "Username and password inserted correctly!";
    }

    // insertion into tasks table
    // replace with proper SQL query
    $query = "INSERT INTO Tasks(Title, Description, AccountID, Status, EntryDate, DueDate) VALUES
    ('Take Out the Trash', 'Put it in the green bin.', 1, 'Not-Started', NULL, NULL)";

    $insert = mysqli_query($conn, $query);

    if (!$insert) {
      die("Issue with inserting task.");
    }
    else {
      echo "Task inserted correctly!";
    }

    // retrieve information from DB
    // replace with proper SQL query
    $query = "SELECT * FROM tasks WHERE AccountID = 1";

    // prints rows of DB
    while ($row = mysqli_fetch_assoc($query)) {
      echo $row["Title"] . " " . $row["Description"] . " " . $row["Status"] . " " . $row["EntryDate"] . " " . $row["DueDate"];
    }

    // close connection to DB
    mysqli_close($conn);
    
?>