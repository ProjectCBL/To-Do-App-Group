<html>

<head>

  <style>

    .column {
      float: left;
      width: 50%;
      padding: 10px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

  </style>

</head>

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

            echo "<h1 style = 'text-align:center'>TASKS</h1>";

            echo "<div class = 'row'>";

            // echos necessary rows of table
            while ($row = mysqli_fetch_assoc($result)) {

              echo "<div class = 'column'>";

                if (is_null($row["DueDate"])) {
                  echo
                    "<h2 style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . $row["Title"] . "</h2>";
                }
                else {
                  echo
                    "<h2 style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . $row["Title"] . " is due on " . $row["DueDate"] . "</h2>";
                }

              echo "</div>";

              echo "<div class = 'column'>";

                if (is_null($row["Description"]) and is_null($row["EntryDate"])) {
                  echo
                    "<p style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . $row["Status"] . " is the current status" . "</p>";
                }
                else if (is_null($row["Description"])) {
                  echo
                    "<p style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . $row["Status"] . " is the current status" . "</p>";
                  echo
                    "<p style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . "This task was created on " . $row["EntryDate"] . "</p>";
                }
                else if (is_null($row["EntryDate"])) {
                  echo
                    "<p style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . $row["Status"] . " is the current status" . "</p>";
                  echo
                    "<p style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . "To do this task: " . $row["Description"] . "</p>";
                }
                else {
                  echo
                    "<p style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . $row["Status"] . " is the current status" . "</p>";
                  echo
                    "<p style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . "This task was created on " . $row["EntryDate"] . "</p>";
                  echo
                    "<p style='border:purple; border-width:2px; border-style:solid; text-align:center'>" . "To do this task: " . $row["Description"] . "</p>";
                }

              echo "</div>";

              echo "<br/>";
              echo "<br/>";

              }

            echo "</div>";

            // close connection to DB
            mysqli_close($conn);
        
        ?>


</body>

</html>
