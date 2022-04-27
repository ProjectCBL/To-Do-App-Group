<?php

    include 'db_config.php';

    function connectToDB(){
        GLOBAL $server;
        GLOBAL $username;
        GLOBAL $password;
        GLOBAL $database;

        // open connection to DB
        $conn = new mysqli($server, $username, $password, $database);
        echo (!$conn) ? die("Connection to DB failed!") : "Connected to DB!";
        return $conn;
    }

    // Use this function to directly affect database.
    function executeQuery($conn, $sql){
        echo ($conn->query($sql) == TRUE) ? "SQL Query: \n" . $sql . "\nExecuted!!!" : "Error performing query: " . $conn->error; 
    }

    // Obtaining datat through SELECT statements
    function grabQueryResults($conn, $sql){
        return $conn->query($sql);
    }

?>