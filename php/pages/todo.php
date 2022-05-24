<?php

if (!isset($_SESSION)) session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>To-Do</title>
    <link rel="stylesheet" href="../../css/app.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../../js/in-app-actions.js"></script>
</head>

<body id="body">
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <h2 class="navbar-brand home" id="home">To-Do</h2>
            <div class="nav-right">
                <a href="#" id="add-item">Add Task</a>
                <a href="#" id="ongoing">Ongoing Task</a>
                <a href="#" id="completed">Completed Task</a>
                <a href="#" id="log-out">Log Out</a>
            </div>
        </div>
    </nav>

    <div id="task">

        <?php

        switch ($_SESSION["url"]) {
            case "add":
                include_once(__DIR__ . "/../redirects/add_redirect.php");
                break;
            case "incomplete":
                include_once(__DIR__ . "/../service/retrieve_incomplete.php");
                break;
            case "complete":
                include_once(__DIR__ . "/../service/retrieve_completed.php");
                break;
            default:
                include_once(__DIR__ . "/../service/retrieve_all.php");
                break;
        }

        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>