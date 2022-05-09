<html>

<body>

<?php

            // DB information
            // replace with proper username and password
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "ToDo";

            // open connection to DB
            $conn = new mysqli($server, $username, $password, $database);

            if (!$conn) {
            die("Connection to DB failed.");
            }
            else {
            echo "Connected to DB!";
            }

            // gets submitted task and dateTime
            $task = $_POST["task"];
            $dateTime = $_POST["dateTime"];

            // inserts information into DB
            $query = "INSERT INTO Tasks(Title, EntryDate) VALUES ('" . $task . "' , '" . $dateTime . "')";

            $result = mysqli_query($conn, $query);

            // close connection to DB
            mysqli_close($conn);
        
        ?>


        </body>

        </html>