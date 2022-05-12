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

            // how HTML appears on page

            echo "<h1>TASKS</h1>";

            // echos necessary rows of table
            while ($row = mysqli_fetch_assoc($result)) {
              if (is_null($row["DueDate"])) {
                echo
                  "<h2>" . $row["Title"] . "<h2>";
              }
              else {
                echo
                  "<h2>" . $row["Title"] . " is due on " . $row["DueDate"] . "!" . "</h2>";
              }

              echo "<br/>";

              if (is_null($row["Description"]) and is_null($row["Entry Date"])) {
                echo
                  $row["Status"] . " is the current status.";
              }
              else if (is_null($row["Description"])) {
                echo
                  $row["Status"] . " is the current status.";
                echo "<br/>";
                echo
                  "This task was created on " . $row["EntryDate"] . ".";
              }
              else if (is_null($row["EntryDate"])) {
                echo
                  $row["Status"] . " is the current status.";
                echo "<br/>";
                echo
                  "To do this task: " . $row["Description"];
              }
              else {
                echo
                  $row["Status"] . " is the current status.";
                echo "<br/>";
                echo
                  "This task was created on " . $row["EntryDate"] . ".";
                echo "<br/>";
                echo
                  "To do this task: " . $row["Description"];
              }

              echo "<br/>";
              echo "<h3>----</h3>";
              echo "<br/>";

              }

            // close connection to DB
            mysqli_close($conn);
        
        ?>


</body>

</html>
