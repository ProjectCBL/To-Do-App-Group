<?php

    // Make sure to install PHP and place php.ini in php directory.
    // To launch the server in vscode -> CRTL+SHFT+B -> Select the task (if not launched automatically)

    function connectToDB($servername, $username, $password, $dbname){
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully<br>";
        return $conn;
    } 
    
    function printResults($result){
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "tID: " . $row["tID"]. " - Title: \n" . $row["Title"]."<br>";
            }
        } else {
            echo "0 results";
        }
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todo";

    $conn = connectToDB($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM TASKS";
    $result = $conn->query($sql);

    printResults($result);

    $conn->close();

    //phpinfo();
    
?>