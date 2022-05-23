<?php

    $todoDB->connect();

    $username = $_SESSION["username"];

    $query = $todoDB->getAllUserTasks($username);

    while($row = mysqli_fetch_assoc($query)){

        $date = ($row["DueDate"]) ? (" | Due Date: " . $row["DueDate"]) : ("");

        echo '<div class="card" style="width: 50%;">
            <div class="card-body">
                <h5 class="card-title">' . $row["Title"] . '</h5>' .
                '<p class="card-text" style="margin: 0">Description: ' . $row["Description"] . '</p>' .
                '<p class="card-text" style="margin: 0">Entry Date: ' . $row["EntryDate"] . $date . '</p>' .
                '<p class="card-text" style="margin-bottom: 10px">Status: <b ' . getStatusStyle($row["Status"]) . '> ' . $row["Status"] . '</b></p>' .
                '<a id="update-redirect' . $row["tID"] . '" class="btn btn-outline-primary">Edit</a>
            </div>
        </div>
        <br>
        ';
    }

    $todoDB->close();

?>