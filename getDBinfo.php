<html>

<body>

<?php

            // DB information
            // replace with proper username and password
            $server = "localhost";
            $username = "root";
            $password = "dasCAP1998";
            $database = "ToDo";

            // open connection to DB
            $conn = new mysqli($server, $username, $password, $database);

            if (!$conn) {
            die("Connection to DB failed.");
            }
            else {
            echo "Connected to DB!";
            }

            // gets submitted username and password
            $user = $_POST["username"];
            $pass = $_POST["password"];

            // retrieves information from DB
            $getuID = "SELECT uID FROM users WHERE users.username = '" . $user . "'";
            $result = mysqli_query($conn, $getuID);

            while ($row = mysqli_fetch_assoc($result)) {
              $uID = $row["uID"];
            }

            $query = "SELECT * FROM tasks WHERE tasks.AccountID = " . $uID . "";

            $result = mysqli_query($conn, $query);

            // echos necessary rows of table
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row["Title"] . " | " . $row["Description"] . " | " . $row["Status"] . " | " . $row["EntryDate"] . " | " . $row["DueDate"];
            }

            // close connection to DB
            mysqli_close($conn);
        
        ?>


        </body>

        </html>
