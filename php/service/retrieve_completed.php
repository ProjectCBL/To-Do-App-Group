<div class="container">
    <div class="row">
        <div class="col" />
        <div class="col">

            <br>
            <h2 class="justify-content-center text-center">Completed Tasks</h2> <br>

            <center>

                <?php

                    require_once(__DIR__ . "/../config/lib.php");

                    if (empty($_SESSION["username"])){
                        session_start();
                    }

                    $_SESSION["url"] = "complete";

                    $todoDB->connect();

                    $username = $_SESSION["username"];

                    $query = $todoDB->getAllCompleteUserTasks($username);

                    while ($row = mysqli_fetch_assoc($query)) {

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

            </center>

        </div>
        <div class="col" />
    </div>
</div>